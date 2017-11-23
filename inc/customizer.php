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
 * Remove the 'nav' default section
 */
function ornea_customizer_sections( $wp_customize ) {
	$wp_customize->remove_section( 'nav' );
}
add_action( 'customize_register', 'ornea_customizer_sections' );

Ornea_Kirki::add_config( 'ornea' );

/**
 * Add the Theme Options section.
 */
Ornea_Kirki::add_section( 'theme_options', array(
	'title'    => esc_attr__( 'Theme Options', 'ornea' ),
) );

/**
 * Header Background.
 */
Ornea_Kirki::add_field( 'ornea', array(
	'type'      => 'background',
	'settings'  => 'header_background',
	'label'     => esc_attr__( 'Header Background', 'ornea' ),
	'section'   => 'theme_options',
	'transport' => 'auto',
	'default'   => array(
		'background-color'    => '#a46497',
		'background-image'    => '',
		'background-repeat'   => 'repeat',
		'background-size'     => 'inherit',
		'background-position' => 'center center',
	),
	'output' => array( array(
		'element' => '#masthead #header-wrapper',
	) ),
) );

// Separator.
Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'custom',
	'settings' => 'header_background_sep',
	'section'  => 'theme_options',
	'default'  => '<hr>',
) );

/**
 * Offcanvas menu background.
 */
Ornea_Kirki::add_field( 'ornea', array(
	'type'      => 'background',
	'settings'  => 'offcanvas_menu_background',
	'label'     => __( 'Off-Canvas Menu Background', 'ornea' ),
	'section'   => 'theme_options',
	'transport' => 'auto',
	'default'   => array(
		'background-color'    => '#a46497',
		'background-image'    => '',
		'background-repeat'   => 'repeat',
		'background-size'     => 'inherit',
		'background-position' => 'left top',
	),
	'output' => array(
		array(
			'element' => '#masthead .left-offcanvas-menu',
		),
	),
	'active_callback' => function() {
		return has_nav_menu( 'offcanvas' );
	},
) );

// Separator.
Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'custom',
	'settings' => 'offcanvas_menu_background_sep',
	'section'  => 'theme_options',
	'default'  => '<hr>',
	'active_callback' => function() {
		return has_nav_menu( 'offcanvas' );
	},
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'         => 'background',
	'settings'     => 'offcanvas_sidebar_background',
	'label'        => __( 'Off-Canvas Sidebar Background', 'ornea' ),
	'section'      => 'theme_options',
	'transport'    => 'auto',
	'output'       => array( array(
		'element' => 'body .offcanvas-sidebar',
	) ),
	'default'      => array(
		'background-color'    => '#a46497',
		'background-image'    => '',
		'background-repeat'   => 'repeat',
		'background-size'     => 'inherit',
		'background-position' => 'left top',
	),
	'active_callback' => function() {
		return is_active_sidebar( 'offcanvas' );
	},
) );

// Separator.
Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'custom',
	'settings' => 'offcanvas_sidebar_background_sep',
	'section'  => 'theme_options',
	'default'  => '<hr>',
	'active_callback' => function() {
		return is_active_sidebar( 'offcanvas' );
	},
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'         => 'background',
	'settings'     => 'footer_wrapper_background',
	'label'        => __( 'Footer Background', 'ornea' ),
	'section'      => 'theme_options',
	'default'      => array(
		'background-color'    => '#ededed',
		'background-image'    => '',
		'background-repeat'   => 'repeat',
		'background-size'     => 'inherit',
		'background-attach'   => 'inherit',
		'background-position' => 'left-top',
	),
	'transport'    => 'auto',
	'output'       => array(
		array(
			'element' => '#colophon',
		),
	),
	'active_callback' => function() {
		return is_active_sidebar( 'footer-1' ) && is_active_sidebar( 'footer-2' ) && is_active_sidebar( 'footer-3' ) && is_active_sidebar( 'footer-4' );
	},
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'typography',
	'settings' => 'base_typography',
	'label'    => __( 'Body Typography', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => array(
		'font-family' => 'Roboto',
		'font-weight' => 300,
		'font-size'   => '1.1rem',
	),
	'transport'    => 'auto',
	'output' => array(
		array(
			'element'  => 'body',
		),
	),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'typography',
	'settings' => 'headers_typography',
	'label'    => __( 'Headers Typography', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => array(
		'font-family' => 'Roboto',
		'font-weight' => 700,
		'font-size'   => '1.1rem',
	),
	'transport'    => 'auto',
	'output' => array(
		array(
			'element'  => 'h1, h2, h3, h4, h5, h6',
		),
	),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'typography',
	'settings' => 'sitename_typography',
	'label'    => __( 'Sitename Typography', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => array(
		'font-family' => 'Roboto',
		'font-weight' => 700,
	),
	'transport'    => 'auto',
	'output' => array(
		array(
			'element'  => 'h1.site-title',
		),
	),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'slider',
	'settings' => 'sidebar_width',
	'label'    => __( 'Sidebar Width', 'ornea' ),
	'subtitle' => __( 'number of columns on a 12-column grid. <strong>Set to 0 to disable the sidebar</strong>', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => 3,
	'choices'  => array(
		'min'  => 0,
		'max'  => 6,
		'step' => 1,
	),
	'active_callback' => function() {
		return is_active_sidebar( 'sidebar-1' );
	}
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'radio',
	'settings' => 'sidebar_position',
	'label'    => __( 'Sidebar Position', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => 'l',
	'choices'  => array(
		'l'    => __( 'Left', 'ornea' ),
		'r'    => __( 'Right', 'ornea' ),
	),
) );

if ( class_exists( 'WooCommerce' ) && ! class_exists( 'WC_Colors' ) ) {
	Ornea_Kirki::add_field( 'ornea', array(
		'type'        => 'custom',
		'settings'    => 'install_woocolors',
		'section'     => 'theme_options',
		'default'     => '<div style="background:#f2dede;padding:10px;color:#a94442;">' . __( 'You are using the WooCommerce plugin but don\'t have "<strong><a target="_blank" style="color:#c00;" href="https://wordpress.org/plugins/woocommerce-colors/">WooCommerce Colors</a></strong>" installed. Please install this plugin for additional color options.', 'ornea' ) . '</div>',
	) );
}

Ornea_Kirki::add_field( 'ornea', array(
	'type'        => 'color',
	'settings'    => 'accent_color',
	'label'       => __( 'Accent Color', 'ornea' ),
	'section'     => 'theme_options',
	'default'     => '#a46497',
	'description' => __( 'Used for search and comment form buttons.', 'ornea' ),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'text_color',
	'label'    => __( 'Text Color', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => '#222222',
	'transport'    => 'auto',
	'output'   => array(
		array(
			'element'  => 'body, a.page-numbers, a.page-numbers:visited',
			'property' => 'color',
		),
	),
	'description' => __( 'Change the color of the main text on your site. Please note you should choose a color with enough contrast to your background, so that it\'s  easy to read. You should also avoid using colourful text and instead prefer using dark grey or white depending on the background color of your site.', 'ornea' ),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'a_color',
	'label'    => __( 'Links Color', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => '#00bcd4',
	'transport'    => 'auto',
	'output'   => array(
		array(
			'element'  => 'a',
			'property' => 'color',
		),
	),
	'description' => __( 'The color for your links', 'ornea' ),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'a_hover_color',
	'label'    => __( 'Links - Hover Color', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => '#00acc1',
	'transport'    => 'auto',
	'output'   => array(
		array(
			'element'  => 'a:hover, a:focus, a:active, a:visited:hover, a:visited:focus, a:visited:active, .top_menu ul li.current_page_item a',
			'property' => 'color',
		),
	),
	'description' => __( 'The color for your links when a user hovers them. Traditionally this is something close to the normal links color but a different shade, enough for contrast.', 'ornea' ),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'a_visited_color',
	'label'    => __( 'Links - Visited Color', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => '#00bcd4',
	'transport'    => 'auto',
	'output'   => array(
		array(
			'element'  => 'a:visited',
			'property' => 'color',
		),
	),
	'description' => __( 'The color for your visited links. Traditionally this should be the same as the main links color, though you can choose whatever you want.', 'ornea' ),
) );

if ( class_exists( 'WooCommerce' ) ) {
	Ornea_Kirki::add_field( 'ornea', array(
		'type'     => 'slider',
		'settings' => 'product_cat_image_height',
		'label'    => __( 'Product Category Image Height', 'ornea' ),
		'subtitle' => __( 'Specify the minimum height of the category image. (percentage of screen height). Set to 0 to disable.', 'ornea' ),
		'section'  => 'theme_options',
		'default'  => 30,
		'choices'  => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'output' => array(
			array(
				'element'  => '.term-description.has-term-image',
				'property' => 'min-height',
				'units'    => 'vh',
			),
		),
		'transport' => 'auto',
	) );
}

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'select',
	'settings' => 'blog_mode',
	'label'    => __( 'Blog Mode', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => 'full',
	'choices'  => array(
		'excerpt' => __( 'Excerpt', 'ornea' ),
		'full'    => __( 'Full', 'ornea' ),
	),
) );

Ornea_Kirki::add_field( 'ornea', array(
	'type'     => 'select',
	'settings' => 'product_mode',
	'label'    => __( 'Single-Product Display Mode', 'ornea' ),
	'section'  => 'theme_options',
	'default'  => 'default',
	'choices'  => array(
		'big-image' => __( 'Big Image', 'ornea' ),
		'default'   => __( 'Default', 'ornea' ),
	),
) );
