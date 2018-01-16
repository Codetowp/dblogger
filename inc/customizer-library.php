<?php
/**
 * Customizer Library
 *
 * @package dblogger
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Continue if the Dblogger_Customizer_Library isn't already in use.
if ( ! class_exists( 'Dblogger_Customizer_Library' ) ) :


// Helper functions for fonts.
	require get_template_directory() . '/inc/lib/fonts.php';

	/**
	 * Class wrapper with useful methods for interacting with the theme customizer.
	 */
	class Dblogger_Customizer_Library {

		/**
		 * The one instance of Dblogger_Customizer_Library.
		 *
		 * @since 1.0.0.
		 *
		 * @var   Dblogger_Customizer_Library_Styles    The one instance for the singleton.
		 */
		private static $instance;

		/**
		 * The array for storing $options.
		 *
		 * @since 1.0.0.
		 *
		 * @var   array    Holds the options array.
		 */

		public $options = array();

		/**
		 * Instantiate or return the one Dblogger_Customizer_Library instance.
		 *
		 * @since  1.0.0.
		 *
		 * @return Dblogger_Customizer_Library
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function add_options( $options = array() ) {
			$this->options = array_merge( $options, $this->options );
		}

		public function get_options() {
			return $this->options;
		}

	}

endif;