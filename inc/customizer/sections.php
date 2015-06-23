<?php

/**
 * Add sections
 */
Kirki::add_section( 'header_background', array(
	'title'       => __( 'Header Background', 'ornea' ),
	'priority'    => 10,
	'panel'       => 'backgrounds',
	'description' => __( 'You can edit the header background here. You can add a background color, a background image, and edit the position of that background image as well as its size. If you don\'t add an image and only use a background color, then the "opacity" setting will be applied to the background color. If you add a background image however, that setting will also apply to the whole header when the page scrolls down.', 'ornea' ),
) );

Kirki::add_section( 'offcanvas_menu_background', array(
	'title'           => __( 'Offcanvas Menu Background', 'ornea' ),
	'priority'        => 20,
	'panel'           => 'backgrounds',
	'description'     => __( 'You can edit the background for the left, offcanvas menu here. You can add a background color, a background image, and edit the position of that background image as well as its size. This area inherits the "opacity" setting from the header background. Please note that this will only become visible once you assign a menu to the "Offcanvas - Left" menu area.', 'ornea' ),
) );

Kirki::add_section( 'offcanvas_sidebar_background', array(
	'title'           => __( 'Offcanvas Sidebar Background', 'ornea' ),
	'priority'        => 30,
	'panel'           => 'backgrounds',
	'description'     => __( 'You can edit the background for the right, offcanvas sidebar here. You can add a background color, a background image, and edit the position of that background image as well as its size.', 'ornea' ),
) );

Kirki::add_section( 'base_typography', array(
	'title'       => __( 'Base', 'ornea' ),
	'priority'    => 10,
	'panel'       => 'typography',
	'description' => __( 'The "Base" typography section will change the font for your text body. The font-size you set here will also affect the font-size af all other elements (such as post titles etc). The "Responsive Text" setting when enabled will automatically change the font-size depending on the user\'s  screen. The font-size you specify here will be used for mobiles, and larger screens will use larger font sizes so please note that when you change this setting you may have to adjust your base font-size.', 'ornea' )
) );

Kirki::add_section( 'headers_typography', array(
	'title'       => __( 'Headers', 'ornea' ),
	'priority'    => 20,
	'panel'       => 'typography',
	'description' => __( 'You can change the font-family and font-weight of all headers in this section.', 'ornea' ),
) );

Kirki::add_section( 'sitename_typography', array(
	'title'       => __( 'Site Name', 'ornea' ),
	'priority'    => 30,
	'panel'       => 'typography',
	'description' => __( 'If you don\t use a logo for your site the the sitename will be displayed on your header. You can change the font-family and font-weight that will be used here.', 'ornea' ),
) );

Kirki::add_section( 'layout', array(
	'title'    => __( 'Layout', 'ornea' ),
	'priority' => 30
) );

Kirki::add_section( 'footer', array(
	'title'    => __( 'Footer Wrapper Background', 'ornea' ),
	'panel'    => 'backgrounds',
	'priority' => 90
) );

Kirki::add_section( 'extras', array(
	'title'    => __( 'Extras', 'ornea' ),
	'priority' => 200
) );

Kirki::add_section( 'nav', array(
	'title'       => __( 'Navigation', 'ornea' ),
	'priority'    => 100,
	'description' => __( 'Select your menus below. The Offcanvas-left menu is vertical and will only show when the user clicks on the humbucker icon on the header. The Horizontal menu will always show and will be scrollable to facilitate mobile navigation. Both menus are non-hierarchical.', 'ornea' ),
) );
