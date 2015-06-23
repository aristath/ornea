<?php

Kirki::add_config( 'ornea', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

Kirki::add_field( 'ornea', array(
	'type'         => 'background',
	'settings'     => 'header_background',
	'label'        => __( 'Background', 'ornea' ),
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
) );

Kirki::add_field( 'ornea', array(
	'type'         => 'background',
	'settings'     => 'offcanvas_menu_background',
	'label'        => __( 'Background', 'ornea' ),
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
) );

Kirki::add_field( 'ornea', array(
	'type'         => 'background',
	'settings'     => 'offcanvas_sidebar_background',
	'label'        => __( 'Background', 'ornea' ),
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
) );

Kirki::add_field( 'ornea', array(
	'type'         => 'background',
	'settings'     => 'footer_wrapper_background',
	'label'        => __( 'Background', 'ornea' ),
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
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'checkbox',
	'mode'     => 'switch',
	'settings' => 'responsive_text',
	'label'    => __( 'Responsive Text', 'ornea' ),
	'default'  => 0,
	'section'  => 'base_typography',
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'select',
	'settings' => 'base_typography_font_family',
	'label'    => __( 'Font Family', 'ornea' ),
	'section'  => 'base_typography',
	'default'  => 'Roboto',
	'priority' => 20,
	'choices'  => Kirki_Fonts::get_font_choices(),
	'output' => array(
		'element'  => 'body',
		'property' => 'font-family',
	),
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'multicheck',
	'settings' => 'base_typography_subsets',
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
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'slider',
	'settings' => 'base_typography_font_weight',
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
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'slider',
	'settings' => 'base_typography_font_size',
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
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'select',
	'settings' => 'headers_typography_font_family',
	'label'    => __( 'Font Family', 'ornea' ),
	'section'  => 'headers_typography',
	'default'  => 'Roboto',
	'priority' => 20,
	'choices'  => Kirki_Fonts::get_font_choices(),
	'output' => array(
		'element'  => 'h1, h2, h3, h4, h5, h6',
		'property' => 'font-family',
	),
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'slider',
	'settings' => 'headers_typography_font_weight',
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
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'select',
	'settings' => 'sitename_typography_font_family',
	'label'    => __( 'Font Family', 'ornea' ),
	'section'  => 'sitename_typography',
	'default'  => 'Roboto',
	'priority' => 20,
	'choices'  => Kirki_Fonts::get_font_choices(),
	'output' => array(
		'element'  => 'h1.site-title',
		'property' => 'font-family',
	),
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'slider',
	'settings' => 'sitename_typography_font_weight',
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
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'slider',
	'settings' => 'sidebar_width',
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
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'radio',
	'settings' => 'sidebar_position',
	'label'    => __( 'Sidebar Position', 'ornea' ),
	'section'  => 'layout',
	'default'  => 'l',
	'priority' => 20,
	'choices'  => array(
		'l'    => __( 'Left', 'ornea' ),
		'r'    => __( 'Right', 'ornea' ),
	),
) );

if ( class_exists( 'WooCommerce' ) && ! class_exists( 'WC_Colors' ) ) {
	Kirki::add_field( 'ornea', array(
		'type'        => 'custom',
		'settings'    => 'install_woocolors',
		'section'     => 'colors',
		'default'     => '<div style="background:#f2dede;padding:10px;color:#a94442;">' . __( 'You are using the WooCommerce plugin but don\'t have "<strong><a target="_blank" style="color:#c00;" href="https://wordpress.org/plugins/woocommerce-colors/">WooCommerce Colors</a></strong>" installed. Please install this plugin for additional color options.', 'ornea' ) . '</div>',
		'priority'    => 1,
	) );
}

Kirki::add_field( 'ornea', array(
	'type'        => 'color',
	'settings'    => 'accent_color',
	'label'       => __( 'Accent Color', 'ornea' ),
	'section'     => 'colors',
	'default'     => '#a46497',
	'description' => __( 'Used for search and comment form buttons.', 'ornea' ),
	'priority'    => 1,
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'text_color',
	'label'    => __( 'Text Color', 'ornea' ),
	'section'  => 'colors',
	'default'  => '#222222',
	'priority' => 1,
	'output'   => array(
		'element'  => 'body, a.page-numbers, a.page-numbers:visited',
		'property' => 'color',
	),
	'description' => __( 'Change the color of the main text on your site. Please note you should choose a color with enough contrast to your background, so that it\'s  easy to read. You should also avoid using colourful text and instead prefer using dark grey or white depending on the background color of your site.', 'ornea' ),
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'a_color',
	'label'    => __( 'Links Color', 'ornea' ),
	'section'  => 'colors',
	'default'  => '#00bcd4',
	'priority' => 1,
	'output'   => array(
		'element'  => 'a',
		'property' => 'color',
	),
	'description' => __( 'The color for your links', 'ornea' ),
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'a_hover_color',
	'label'    => __( 'Links - Hover Color', 'ornea' ),
	'section'  => 'colors',
	'default'  => '#00acc1',
	'priority' => 1,
	'output'   => array(
		'element'  => 'a:hover, a:focus, a:active, a:visited:hover, a:visited:focus, a:visited:active, .top_menu ul li.current_page_item a',
		'property' => 'color',
	),
	'description' => __( 'The color for your links when a user hovers them. Traditionally this is something close to the normal links color but a different shade, enough for contrast.', 'ornea' ),
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'color',
	'settings' => 'a_visited_color',
	'label'    => __( 'Links - Visited Color', 'ornea' ),
	'section'  => 'colors',
	'default'  => '#00bcd4',
	'priority' => 1,
	'output'   => array(
		'element'  => 'a:visited',
		'property' => 'color',
	),
	'description' => __( 'The color for your visited links. Traditionally this should be the same as the main links color, though you can choose whatever you want.', 'ornea' ),
) );

if ( class_exists( 'WooCommerce' ) ) {
	Kirki::add_field( 'ornea', array(
		'type'     => 'slider',
		'settings' => 'product_cat_image_height',
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
	) );
}

Kirki::add_field( 'ornea', array(
	'type'     => 'select',
	'settings' => 'blog_mode',
	'label'    => __( 'Blog Mode', 'ornea' ),
	'section'  => 'extras',
	'default'  => 'full',
	'priority' => 20,
	'choices'  => array(
		'excerpt' => __( 'Excerpt', 'ornea' ),
		'full'    => __( 'Full', 'ornea' ),
	),
) );

Kirki::add_field( 'ornea', array(
	'type'     => 'select',
	'settings' => 'product_mode',
	'label'    => __( 'Single-Product Display Mode', 'ornea' ),
	'section'  => 'woocommerce_colors',
	'default'  => 'default',
	'priority' => 1,
	'choices'  => array(
		'big-image' => __( 'Big Image', 'ornea' ),
		'default'   => __( 'Default', 'ornea' ),
	),
) );
