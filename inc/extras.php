<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Ornea
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ornea_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_theme_mod( 'responsive_text', 0 ) ) {
		$classes[] = 'flow-text';
	}

	if ( function_exists( 'is_product' ) && is_product() ) {
		$classes[] = 'product-' . get_theme_mod( 'product_mode', 'default' );
	}

	return $classes;
}
add_filter( 'body_class', 'ornea_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function ornea_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'ornea' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'ornea_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function ornea_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'ornea_render_title' );
endif;

/**
 * Overrides the default woocommerce_taxonomy_archive_description() function
 */
function woocommerce_taxonomy_archive_description() {
	if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) == 0 ) {
		global $wp_query;
		$term = $wp_query->get_queried_object();
		$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		$image_class = ( $image ) ? ' has-term-image' : null;

		$description = wc_format_content( term_description() );
		if ( $description ) {
			echo '<div class="term-description' . $image_class . '">' . $description . '</div>';
		}
	}
}
