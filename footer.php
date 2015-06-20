<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ornea
 */
?>

	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>
		<div class="offcanvas-sidebar">
			<div class="close-button-wrapper sidebar"><span class="close dashicons dashicons-no"></span></div>
			<?php dynamic_sidebar( 'offcanvas' ); ?>
		</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="footer-1 <?php echo Ornea()->layout->get_footer_area_width(); ?>">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="footer-2 <?php echo Ornea()->layout->get_footer_area_width(); ?>">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="footer-3 <?php echo Ornea()->layout->get_footer_area_width(); ?>">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="footer-4 <?php echo Ornea()->layout->get_footer_area_width(); ?>">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
