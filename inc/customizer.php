<?php
/**
 * Ornea Theme Customizer
 *
 * @package Ornea
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ornea_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'ornea_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ornea_customize_preview_js() {
	wp_enqueue_script( 'ornea_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ornea_customize_preview_js' );

/**
 * Create the customizer panels and sections
 */
function ornea_customizer_sections( $wp_customize ) {

	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'backgrounds', array(
		'priority'    => 10,
		'title'       => __( 'Backgrounds', 'ornea' ),
		'description' => __( 'Set background options for site areas', 'ornea' ),
	) );

	$wp_customize->add_panel( 'typography', array(
		'priority'    => 10,
		'title'       => __( 'Typography', 'ornea' ),
		'description' => __( 'Typography Options', 'ornea' ),
	) );

	/**
	 * Add sections
	 */
	$wp_customize->add_section( 'header_background', array(
		'title'       => __( 'Header Background', 'ornea' ),
		'priority'    => 10,
		'panel'       => 'backgrounds',
		'description' => __( 'You can edit the header background here. You can add a background color, a background image, and edit the position of that background image as well as its size. If you don\'t add an image and only use a background color, then the "opacity" setting will be applied to the background color. If you add a background image however, that setting will also apply to the whole header when the page scrolls down.', 'ornea' ),
	) );

	$wp_customize->add_section( 'offcanvas_menu_background', array(
		'title'       => __( 'Offcanvas Menu Background', 'ornea' ),
		'priority'    => 20,
		'panel'       => 'backgrounds',
		'description' => __( 'You can edit the background for the left, offcanvas menu here. You can add a background color, a background image, and edit the position of that background image as well as its size. This area inherits the "opacity" setting from the header background. Please note that this will only become visible once you assign a menu to the "Offcanvas - Left" menu area.
			', 'ornea' ),
	) );

	$wp_customize->add_section( 'offcanvas_sidebar_background', array(
		'title'       => __( 'Offcanvas Sidebar Background', 'ornea' ),
		'priority'    => 30,
		'panel'       => 'backgrounds',
		'description' => __( 'You can edit the background for the right, offcanvas sidebar here. You can add a background color, a background image, and edit the position of that background image as well as its size.', 'ornea' ),
	) );

	$wp_customize->add_section( 'base_typography', array(
		'title'       => __( 'Base', 'ornea' ),
		'priority'    => 10,
		'panel'       => 'typography',
		'description' => __( 'The "Base" typography section will change the font for your text body. The font-size you set here will also affect the font-size af all other elements (such as post titles etc). The "Responsive Text" setting when enabled will automatically change the font-size depending on the user\'s  screen. The font-size you specify here will be used for mobiles, and larger screens will use larger font sizes so please note that when you change this setting you may have to adjust your base font-size.', 'ornea' )

	) );

	$wp_customize->add_section( 'headers_typography', array(
		'title'       => __( 'Headers', 'ornea' ),
		'priority'    => 20,
		'panel'       => 'typography',
		'description' => __( 'You can change the font-family and font-weight of all headers in this section.', 'ornea' ),
	) );

	$wp_customize->add_section( 'sitename_typography', array(
		'title'       => __( 'Site Name', 'ornea' ),
		'priority'    => 30,
		'panel'       => 'typography',
		'description' => __( 'If you don\t use a logo for your site the the sitename will be displayed on your header. You can change the font-family and font-weight that will be used here.', 'ornea' ),
	) );

	$wp_customize->add_section( 'layout', array(
		'title'    => __( 'Layout', 'ornea' ),
		'priority' => 30
	) );

	$wp_customize->add_section( 'footer', array(
		'title'    => __( 'Footer Wrapper Background', 'ornea' ),
		'panel'    => 'backgrounds',
		'priority' => 90
	) );

	$wp_customize->add_section( 'extras', array(
		'title'    => __( 'Extras', 'ornea' ),
		'priority' => 200
	) );

	$wp_customize->remove_section( 'nav' );
	$wp_customize->add_section( 'nav', array(
		'title'       => __( 'Navigation', 'ornea' ),
		'priority'    => 100,
		'description' => __( 'Select your menus below. The Offcanvas-left menu is vertical and will only show when the user clicks on the humbucker icon on the header. The Horizontal menu will always show and will be scrollable to facilitate mobile navigation. Both menus are non-hierarchical.', 'ornea' ),
	) );

}
add_action( 'customize_register', 'ornea_customizer_sections' );

/**
 * Create the settings
 */
function ornea_customizer_settings( $controls ) {

	$controls[] = array(
		'type'         => 'background',
		'setting'      => 'header_background',
		'label'        => __( 'Background', 'textdomain' ),
		'section'      => 'header_background',
		'default'      => array(
			'color'    => '#a46497',
			'image'    => '',
			'repeat'   => 'repeat',
			'size'     => 'inherit',
			'position' => 'center-center',
			'opacity'  => 100,
		),
		'priority'     => 3,
		'output'       => '#masthead #header-wrapper',
	);

	$controls[] = array(
		'type'         => 'background',
		'setting'      => 'offcanvas_menu_background',
		'label'        => __( 'Background', 'textdomain' ),
		'section'      => 'offcanvas_menu_background',
		'default'      => array(
			'color'    => '#a46497',
			'image'    => '',
			'repeat'   => 'repeat',
			'size'     => 'inherit',
			'position' => 'left-top',
		),
		'priority'     => 3,
		'output'       => '#masthead .left-offcanvas-menu',
	);

	$controls[] = array(
		'type'         => 'background',
		'setting'      => 'offcanvas_sidebar_background',
		'label'        => __( 'Background', 'textdomain' ),
		'section'      => 'offcanvas_sidebar_background',
		'default'      => array(
			'color'    => '#a46497',
			'image'    => '',
			'repeat'   => 'repeat',
			'size'     => 'inherit',
			'position' => 'left-top',
		),
		'priority'     => 3,
		'output'       => 'body .offcanvas-sidebar',
	);

	$controls[] = array(
		'type'         => 'background',
		'setting'      => 'footer_wrapper_background',
		'label'        => __( 'Background', 'textdomain' ),
		'section'      => 'footer',
		'default'      => array(
			'color'    => '#ededed',
			'image'    => '',
			'repeat'   => 'repeat',
			'size'     => 'inherit',
			'attach'   => 'inherit',
			'position' => 'left-top',
			'opacity'  => 100,
		),
		'priority'     => 3,
		'output'       => '#colophon',
	);

	$controls[] = array(
		'type'     => 'checkbox',
		'mode'     => 'switch',
		'setting'  => 'responsive_text',
		'label'    => __( 'Responsive Text', 'ornea' ),
		'default'  => 0,
		'section'  => 'base_typography',
	);

	$controls[] = array(
		'type'     => 'select',
		'setting'  => 'base_typography_font_family',
		'label'    => __( 'Font Family', 'ornea' ),
		'section'  => 'base_typography',
		'default'  => 'Roboto',
		'priority' => 20,
		'choices'  => Kirki_Fonts::get_font_choices(),
		'output' => array(
			'element'  => 'body',
			'property' => 'font-family',
		),
	);

	$controls[] = array(
		'type'     => 'multicheck',
		'setting'  => 'base_typography_subsets',
		'label'    => __( 'Google-Font subsets', 'ornea' ),
		'description' => __( 'The subsets used from Google\'s API.', 'ornea' ),
		'section'  => 'base_typography',
		'default'  => 'all',
		'priority' => 22,
		'choices'  => Kirki_Fonts::get_google_font_subsets(),
		'output' => array(
			'element'  => 'body',
			'property' => 'font-subset',
		),
	);

	$controls[] = array(
		'type'     => 'slider',
		'setting'  => 'base_typography_font_weight',
		'label'    => __( 'Font Weight', 'ornea' ),
		'section'  => 'base_typography',
		'default'  => 300,
		'priority' => 24,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
		'output' => array(
			'element'  => 'body',
			'property' => 'font-weight',
		),
	);

	$controls[] = array(
		'type'     => 'slider',
		'setting'  => 'base_typography_font_size',
		'label'    => __( 'Font Size', 'ornea' ),
		'section'  => 'base_typography',
		'default'  => 14,
		'priority' => 25,
		'choices'  => array(
			'min'  => 7,
			'max'  => 48,
			'step' => 1,
		),
		'output' => array(
			'element'  => 'html',
			'property' => 'font-size',
			'units'    => 'px',
		),
	);

	$controls[] = array(
		'type'     => 'select',
		'setting'  => 'headers_typography_font_family',
		'label'    => __( 'Font Family', 'ornea' ),
		'section'  => 'headers_typography',
		'default'  => 'Roboto',
		'priority' => 20,
		'choices'  => Kirki_Fonts::get_font_choices(),
		'output' => array(
			'element'  => 'h1, h2, h3, h4, h5, h6',
			'property' => 'font-family',
		),
	);

	$controls[] = array(
		'type'     => 'slider',
		'setting'  => 'headers_typography_font_weight',
		'label'    => __( 'Font Weight', 'ornea' ),
		'section'  => 'headers_typography',
		'default'  => 700,
		'priority' => 24,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
		'output' => array(
			'element'  => 'h1, h2, h3, h4, h5, h6',
			'property' => 'font-weight',
		),
	);

	$controls[] = array(
		'type'     => 'select',
		'setting'  => 'sitename_typography_font_family',
		'label'    => __( 'Font Family', 'ornea' ),
		'section'  => 'sitename_typography',
		'default'  => 'Roboto',
		'priority' => 20,
		'choices'  => Kirki_Fonts::get_font_choices(),
		'output' => array(
			'element'  => 'h1.site-title',
			'property' => 'font-family',
		),
	);

	$controls[] = array(
		'type'     => 'slider',
		'setting'  => 'sitename_typography_font_weight',
		'label'    => __( 'Font Weight', 'ornea' ),
		'section'  => 'sitename_typography',
		'default'  => 700,
		'priority' => 24,
		'choices'  => array(
			'min'  => 100,
			'max'  => 900,
			'step' => 100,
		),
		'output' => array(
			'element'  => 'h1.site-title',
			'property' => 'font-weight',
		),
	);

	$controls[] = array(
		'type'     => 'slider',
		'setting'  => 'sidebar_width',
		'label'    => __( 'Sidebar Width', 'ornea' ),
		'subtitle' => __( 'number of columns on a 12-column grid. <strong>Set to 0 to disable the sidebar</strong>', 'ornea' ),
		'section'  => 'layout',
		'default'  => 3,
		'priority' => 24,
		'choices'  => array(
			'min'  => 0,
			'max'  => 6,
			'step' => 1,
		),
	);

	$controls[] = array(
		'type'     => 'radio',
		'setting'  => 'sidebar_position',
		'label'    => __( 'Sidebar Position', 'ornea' ),
		'section'  => 'layout',
		'default'  => 'l',
		'priority' => 20,
		'choices'  => array(
			'l'    => __( 'Left', 'ornea' ),
			'r'    => __( 'Right', 'ornea' ),
		),
	);

	if ( class_exists( 'WooCommerce' ) && ! class_exists( 'WC_Colors' ) ) {
		$controls[] = array(
			'type'        => 'custom',
			'setting'     => 'install_woocolors',
			'section'     => 'colors',
			'default'     => '<div style="background:#f2dede;padding:10px;color:#a94442;">' . __( 'You are using the WooCommerce plugin but don\'t have "<strong><a target="_blank" style="color:#c00;" href="https://wordpress.org/plugins/woocommerce-colors/">WooCommerce Colors</a></strong>" installed. Please install this plugin for additional color options.', 'ornea' ) . '</div>',
			'priority'    => 1,
		);
	}

	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'accent_color',
		'label'       => __( 'Accent Color', 'ornea' ),
		'section'     => 'colors',
		'default'     => '#a46497',
		'description' => __( 'Used for search and comment form buttons.', 'ornea' ),
		'priority'    => 1,
	);

	$controls[] = array(
		'type'     => 'color',
		'setting'  => 'text_color',
		'label'    => __( 'Text Color', 'ornea' ),
		'section'  => 'colors',
		'default'  => '#222222',
		'priority' => 1,
		'output'   => array(
			'element'  => 'body, a.page-numbers, a.page-numbers:visited',
			'property' => 'color',
		),
		'description' => __( 'Change the color of the main text on your site. Please note you should choose a color with enough contrast to your background, so that it\'s  easy to read. You should also avoid using colourful text and instead prefer using dark grey or white depending on the background color of your site.', 'ornea' ),
	);

	$controls[] = array(
		'type'     => 'color',
		'setting'  => 'a_color',
		'label'    => __( 'Links Color', 'ornea' ),
		'section'  => 'colors',
		'default'  => '#00bcd4',
		'priority' => 1,
		'output'   => array(
			'element'  => 'a',
			'property' => 'color',
		),
		'description' => __( 'The color for your links', 'ornea' ),
	);

	$controls[] = array(
		'type'     => 'color',
		'setting'  => 'a_hover_color',
		'label'    => __( 'Links - Hover Color', 'ornea' ),
		'section'  => 'colors',
		'default'  => '#00acc1',
		'priority' => 1,
		'output'   => array(
			'element'  => 'a:hover, a:focus, a:active, a:visited:hover, a:visited:focus, a:visited:active, .top_menu ul li.current_page_item a',
			'property' => 'color',
		),
		'description' => __( 'The color for your links when a user hovers them. Traditionally this is something close to the normal links color but a different shade, enough for contrast.', 'ornea' ),
	);

	$controls[] = array(
		'type'     => 'color',
		'setting'  => 'a_visited_color',
		'label'    => __( 'Links - Visited Color', 'ornea' ),
		'section'  => 'colors',
		'default'  => '#00bcd4',
		'priority' => 1,
		'output'   => array(
			'element'  => 'a:visited',
			'property' => 'color',
		),
		'description' => __( 'The color for your visited links. Traditionally this should be the same as the main links color, though you can choose whatever you want.', 'ornea' ),
	);

	if ( class_exists( 'WooCommerce' ) ) {
		$controls[] = array(
			'type'     => 'slider',
			'setting'  => 'product_cat_image_height',
			'label'    => __( 'Product Category Image Height', 'ornea' ),
			'subtitle' => __( 'Specify the minimum height of the category image. (percentage of screen height). Set to 0 to disable.', 'ornea' ),
			'section'  => 'extras',
			'default'  => 30,
			'priority' => 24,
			'choices'  => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
			'output' => array(
				'element'  => '.term-description.has-term-image',
				'property' => 'min-height',
				'units'    => 'vh',
			),
		);
	}

	$controls[] = array(
		'type'     => 'select',
		'setting'  => 'blog_mode',
		'label'    => __( 'Blog Mode', 'ornea' ),
		'section'  => 'extras',
		'default'  => 'full',
		'priority' => 20,
		'choices'  => array(
			'excerpt' => __( 'Excerpt', 'ornea' ),
			'full'    => __( 'Full', 'ornea' ),
		),
	);

	$controls[] = array(
		'type'     => 'select',
		'setting'  => 'product_mode',
		'label'    => __( 'Single-Product Display Mode', 'ornea' ),
		'section'  => 'woocommerce_colors',
		'default'  => 'default',
		'priority' => 1,
		'choices'  => array(
			'big-image' => __( 'Big Image', 'ornea' ),
			'default'   => __( 'Default', 'ornea' ),
		),
	);

	return $controls;

}
add_filter( 'kirki/controls', 'ornea_customizer_settings' );

/**
 * The configuration options for Kirki.
 * Change the assets URL for kirki so the customizer styles & scripts are properly loaded.
 */
function ornea_customizer_config( $args ) {

	$args['url_path'] = get_template_directory_uri() . '/inc/kirki/';
	return $args;

}
add_filter( 'kirki/config', 'ornea_customizer_config' );

function ornea_kirki_i18n( $config ) {

    $strings = array(
        'background-color'      => __( 'Background Color', 'ornea' ),
        'background-image'      => __( 'Background Image', 'ornea' ),
        'no-repeat'             => __( 'No Repeat', 'ornea' ),
        'repeat-all'            => __( 'Repeat All', 'ornea' ),
        'repeat-x'              => __( 'Repeat Horizontally', 'ornea' ),
        'repeat-y'              => __( 'Repeat Vertically', 'ornea' ),
        'inherit'               => __( 'Inherit', 'ornea' ),
        'background-repeat'     => __( 'Background Repeat', 'ornea' ),
        'cover'                 => __( 'Cover', 'ornea' ),
        'contain'               => __( 'Contain', 'ornea' ),
        'background-size'       => __( 'Background Size', 'ornea' ),
        'fixed'                 => __( 'Fixed', 'ornea' ),
        'scroll'                => __( 'Scroll', 'ornea' ),
        'background-attachment' => __( 'Background Attachment', 'ornea' ),
        'left-top'              => __( 'Left Top', 'ornea' ),
        'left-center'           => __( 'Left Center', 'ornea' ),
        'left-bottom'           => __( 'Left Bottom', 'ornea' ),
        'right-top'             => __( 'Right Top', 'ornea' ),
        'right-center'          => __( 'Right Center', 'ornea' ),
        'right-bottom'          => __( 'Right Bottom', 'ornea' ),
        'center-top'            => __( 'Center Top', 'ornea' ),
        'center-center'         => __( 'Center Center', 'ornea' ),
        'center-bottom'         => __( 'Center Bottom', 'ornea' ),
        'background-position'   => __( 'Background Position', 'ornea' ),
        'background-opacity'    => __( 'Background Opacity', 'ornea' ),
        'ON'                    => __( 'ON', 'ornea' ),
        'OFF'                   => __( 'OFF', 'ornea' ),
        'all'                   => __( 'All', 'ornea' ),
        'cyrillic'              => __( 'Cyrillic', 'ornea' ),
        'cyrillic-ext'          => __( 'Cyrillic Extended', 'ornea' ),
        'devanagari'            => __( 'Devanagari', 'ornea' ),
        'greek'                 => __( 'Greek', 'ornea' ),
        'greek-ext'             => __( 'Greek Extended', 'ornea' ),
        'khmer'                 => __( 'Khmer', 'ornea' ),
        'latin'                 => __( 'Latin', 'ornea' ),
        'latin-ext'             => __( 'Latin Extended', 'ornea' ),
        'vietnamese'            => __( 'Vietnamese', 'ornea' ),
        'serif'                 => _x( 'Serif', 'font style', 'ornea' ),
        'sans-serif'            => _x( 'Sans Serif', 'font style', 'ornea' ),
        'monospace'             => _x( 'Monospace', 'font style', 'ornea' ),
    );

    $config['i18n'] = $strings;

    return $config;

}
add_filter( 'kirki/config', 'ornea_kirki_i18n' );
