<?php
/**
 * Ornea functions and definitions
 *
 * @package Ornea
 */

if ( ! class_exists( 'Ornea' ) ) :
class Ornea {

	private static $instance;

	public $version = '1.0';
	public $setup;
	public $scripts;
	public $layout;
	public $wc;

	protected function __construct() {

		$this->include_required_files();
		// add_action( 'tgmpa_register', array( $this, 'require_plugins' ) );

		$this->setup   = new Ornea_Setup();
		$this->scripts = new Ornea_Scripts();
		$this->layout  = new Ornea_Layout();
		if ( class_exists( 'WooCommerce' ) ) {
			$this->wc  = new Ornea_WC();
		}

		if ( ! get_theme_mod( 'ornea_version', false ) ) {
			set_theme_mod( 'ornea_version', $this->version );
		}

	}

	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	private function include_required_files() {

		/**
		 * If Kirki is not already installed, use the included version
		 */
		if ( ! class_exists( 'Kirki' ) ) {
			require get_template_directory() . '/inc/kirki/kirki.php';
		}

		/**
		 * Customizer additions.
		 */
		require get_template_directory() . '/inc/customizer.php';

		/**
		 * Include additional theme classes
		 */
		require get_template_directory() . '/inc/class-ornea-layout.php';
		require get_template_directory() . '/inc/class-ornea-scripts.php';
		require get_template_directory() . '/inc/class-ornea-setup.php';
		require get_template_directory() . '/inc/class-ornea-wc.php';

		/**
		 * Custom template tags for this theme.
		 */
		require get_template_directory() . '/inc/template-tags.php';

		/**
		 * Custom functions that act independently of the theme templates.
		 */
		require get_template_directory() . '/inc/extras.php';

		/**
		 * Load Jetpack compatibility file.
		 */
		require get_template_directory() . '/inc/jetpack.php';

		/**
		 * If jetpack is not installed then we need to include its site-logo module
		 */
		if ( ! function_exists( 'site_logo_init' ) ) {
			require get_template_directory() . '/inc/site-logo.php';
		}

	}

}
endif;


if ( ! function_exists( 'Ornea' ) ) :
function Ornea() {
	return Ornea::get_instance();
}
endif;
// Global for backwards compatibility.
$GLOBALS['ornea'] = Ornea();
global $ornea;
