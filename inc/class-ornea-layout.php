<?php

if ( ! class_exists( 'Ornea_Layout' ) ) :
class Ornea_Layout {

	/**
	 * Get the main area width
	 */
	public function get_main_width() {
		return 'col_' . ( 12 - get_theme_mod( 'sidebar_width', 3 ) );
	}

	/**
	 * Get the sidebar width
	 */
	public function get_sidebar_width() {
		return 'col_' . get_theme_mod( 'sidebar_width', 3 );
	}

	/**
	 * Get the footer width
	 */
	public function get_footer_area_width() {

		if ( is_active_sidebar( 'footer-4' ) ) {
			$width = 3;
		} else if ( is_active_sidebar( 'footer-3' ) ) {
			$width = 4;
		} else if ( is_active_sidebar( 'footer-2' ) ) {
			$width = 6;
		} else {
			$width = 12;
		}

		return 'col_' . $width;

	}
}
endif;
