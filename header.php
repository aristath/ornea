<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Ornea
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ornea' ); ?></a>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div id="header-wrapper">
			<div class="header-row">
				<div class="header-row left">

					<?php if ( has_nav_menu( 'offcanvas' ) ) : ?>
						<div class="menu-trigger"><span class="dashicons dashicons-menu"></span></div>
					<?php endif; ?>

					<div class="site-branding">
						<?php if ( function_exists( 'jetpack_the_site_logo' ) && jetpack_the_site_logo() ) : ?>
							<?php jetpack_the_site_logo(); ?>
						<?php else : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
					</div>

				</div>
				<div class="header-row right">
					<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>
						<div class="sidebar-button">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="768" height="768" viewBox="0 0 768 768">
								<path d="M192 320c-35.36 0-64 28.64-64 64s28.64 64 64 64 64-28.64 64-64-28.64-64-64-64zM576 320c-35.36 0-64 28.64-64 64s28.64 64 64 64 64-28.64 64-64-28.64-64-64-64zM384 320c-35.36 0-64 28.64-64 64s28.64 64 64 64 64-28.64 64-64-28.64-64-64-64z"></path>
							</svg>
						</div>
					<?php endif; ?>
					<div class="search-button">
						<span class="dashicons dashicons-search"></span>
						<div class="close-button-wrapper search"><span class="close dashicons dashicons-no"></span></div>
					</div>
					<div class="breadcrumbs">
						<?php do_action( 'ornea_breadcrumbs' ); ?>
					</div>
				</div>
			</div>
			<div class="header-search-wrapper">
				<div class="search-wrapper">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php if ( has_nav_menu( 'horizontal' ) ) : ?>
				<div class="swiper-container horizontal-menu-container">
					<div class="swiper-wrapper">
					<?php
						if ( ( $locations = get_nav_menu_locations() ) && isset( $locations['horizontal'] ) ) {
							$menu = wp_get_nav_menu_object( $locations['horizontal'] );
							if ( ! empty( $menu ) ) { ?>
								<div class="swiper-container horizontal-menu">
									<div class="swiper-wrapper">
										<?php
											$menu_items = wp_get_nav_menu_items( $menu->term_id );
											$menu_list = '';
											foreach ( (array) $menu_items as $key => $menu_item ) {
												$title = $menu_item->title;
												$url = $menu_item->url;
												$menu_list .= '<div class="swiper-slide"><a href="' . $url . '">' . $title . '</a></div>';
											}
											echo $menu_list;
										?>
									</div>
								</div>
								<?php
							}
						} ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="left-offcanvas-menu">
			<span class="close dashicons dashicons-no"></span>
			<?php wp_nav_menu( array( 'theme_location' => 'offcanvas' ) ); ?>
		</div>
	</header>
	<?php do_action( 'ornea_header' ); ?>

	<div id="content" class="site-content row">
