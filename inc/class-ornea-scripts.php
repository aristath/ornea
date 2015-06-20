<?php


if ( ! class_exists( 'Ornea_Scripts' ) ) :
class Ornea_Scripts {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ), 5 );
		add_action( 'wp_enqueue_scripts', array( $this, 'extra_styles' ), 110 );
	}

	/**
	 * Enqueue scripts.
	 */
	public function scripts() {
		// Get the theme version to use on all our assrts
		$ver = Ornea()->version;

		wp_enqueue_style( 'ornea-styles', get_stylesheet_uri() );
		wp_enqueue_style( 'dashicons' );

		// Sticky headers
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array( 'jquery' ), $ver, true );
		// Only add jquery-swiper if we have a horizontal menu
		// if ( has_nav_menu( 'horizontal' ) ) {
			wp_enqueue_script( 'jquery-swiper', get_template_directory_uri() . '/js/swiper.jquery.js', array(), $ver, true );
		// }

		// Nicescroll
		wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), $ver, true );

		// Our custom navigation script
		wp_enqueue_script( 'ornea-script', get_template_directory_uri() . '/js/script.js', array(), $ver, true );

		// Generic scripts (it's always good to have these 2)
		wp_enqueue_script( 'ornea-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $ver, true );
		wp_enqueue_script( 'respond-js', get_template_directory_uri() . '/js/min/respond-min.js', array(), $ver, true );

		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Enqueue scripts.
	 */
	public function styles() {
		// Get the theme version to use on all our assrts
		$ver = Ornea()->version;

		wp_enqueue_style( 'ornea-styles', get_stylesheet_uri(), array(), $ver );
		wp_enqueue_style( 'dashicons' );

	}

	/**
	 * Calculate some extra CSS styles and attach them to the main stylesheet
	 */
	public function extra_styles() {

		$css = '';

		$color = get_theme_mod( 'accent_color', '#a46497' );
		$color = ( false !== strpos( $color, 'rgba' ) ) ? Kirki_Color::rgba2hex( $color ) : $color;

		if ( 127 < Kirki_Color::get_brightness( $color ) ) {
			$text_color  = '#515151';
			$hover_color = Kirki_Color::adjust_brightness( $color, 10 );
		} else {
			$text_color  = '#ffffff';
			$hover_color = Kirki_Color::adjust_brightness( $color, -10 );
		}

		/**
		 * Header Styles
		 */
		$color = get_theme_mod( 'header_background_color', '#111111' );
		$color = ( false !== strpos( $color, 'rgb' ) ) ? Kirki_Color::rgba2hex( $color ) : $color;
		$header_textcolor    = ( 127 < Kirki_Color::get_brightness( $color ) ) ? '#222222' : '#ffffff';
		$header_border_color = ( 127 < Kirki_Color::get_brightness( $color ) ) ? 'rgba(0,0,0,.1)' : 'rgba(255,255,255,.08)';
		$css .= '.horizontal-menu a, .horizontal-menu a:visited, #header-wrapper .dashicons, #header-wrapper .breadcrumbs .woocommerce-breadcrumb, #header-wrapper .breadcrumbs a, #header-wrapper .breadcrumbs .woocommerce-breadbrumb a, h1.site-title a, #header-wrapper .search-wrapper input { color:' . $header_textcolor . ';}';
		$css .= ( '#ffffff' == $header_textcolor ) ? 'body .horizontal-menu a:hover{color: rgba(255,255,255,.75);}' : 'body .horizontal-menu a:hover{color: rgba(0,0,0,.75);}';
		$css .= '#header-wrapper .sidebar-button svg { fill:' . $header_textcolor . ';}';
		$css .= '.horizontal-menu{border-top-color:' . $header_border_color . ';}';

		/**
		 * Sidebar alignment
		 */
		$css .= ( 'l' == get_theme_mod( 'sidebar_position', 'l' ) ) ? '#content.site-content{flex-direction:row-reverse;}' : '';

		/**
		 * If we are not on a full-width layout, then add some extra CSS to fix grid spacing
		 * depending on the sidebar's location (left/right)
		 */
		if ( get_theme_mod( 'sidebar_width', 3 ) ) {
			$css .= ( 'l' == get_theme_mod( 'sidebar_position', 'l' ) ) ? '#primary{margin-right:0;}' : '#secondary{margin-right:0;}';
		}

		/**
		 * Product Category background image.
		 * This image is set as background on the product description area.
		 */
		if ( get_theme_mod( 'product_cat_image_height' ) ) {
			if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) == 0 ) {
			    global $wp_query;
			    $term = $wp_query->get_queried_object();
			    $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
			    $image = wp_get_attachment_url( $thumbnail_id );
			    if ( $image ) {
				    $css .= '.woocommerce .term-description.has-term-image{background-image: url(' . $image . ');}';
				}
			}
		}

		/**
		 * OffCanvas menu.
		 * Default is white color, so we'll only override this if needed.
		 */
		$color = get_theme_mod( 'offcanvas_menu_background_color', '#a46497' );
		$color = ( false !== strpos( $color, 'rgba' ) ) ? Kirki_Color::rgba2hex( $color ) : $color;
		if ( 127 < Kirki_Color::get_brightness( $color ) ) {
			$css .= '.left-offcanvas-menu ul li a, .left-offcanvas-menu .close{color:#222222;}';
		}

		/**
		 * OffCanvas sidebar
		 */
		$color = get_theme_mod( 'offcanvas_sidebar_background_color', '#a46497' );
		$color = ( false !== strpos( $color, 'rgba' ) ) ? Kirki_Color::rgba2hex( $color ) : $color;
		if ( 127 < Kirki_Color::get_brightness( $color ) ) {
			$offcanvas_sidebar_color = '#222222';
		} else {
			$offcanvas_sidebar_color = '#ffffff';
		}
		$css .= 'body .offcanvas-sidebar, body .offcanvas-sidebar a, body .offcanvas-sidebar a:visited, body .offcanvas-sidebar a:hover.offcanvas-sidebar .close{color:' . $offcanvas_sidebar_color . ';}';

		/**
		 * Button mods
		 */
		$css .= 'button, input[type="button"], input[type="reset"], input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{font-weight:' . get_theme_mod( 'font_base_weight', 700 ) . ';}';
		$css .= 'button, input[type="button"], input[type="reset"], input[type="submit"] {background-color:' . get_theme_mod( 'accent_color', '#a46497' ) . '; color:' . $text_color . '}';
		$css .= 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, button:active, input[type="button"]:active, input[type="reset"]:active, input[type="submit"]:active { background-color:' . $hover_color . ';}';

		// Attach our custom styles to the main stylesheet using wp_add_inline_style
		// See http://codex.wordpress.org/Function_Reference/wp_add_inline_style for documentation
		wp_add_inline_style( 'ornea-styles', $css );

	}

}
endif;
