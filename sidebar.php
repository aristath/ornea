<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Ornea
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( 0 == get_theme_mod( 'sidebar_width', 3 ) ) {
	return;
}

?>

<div id="secondary" class="widget-area <?php echo Ornea()->layout->get_sidebar_width(); ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
