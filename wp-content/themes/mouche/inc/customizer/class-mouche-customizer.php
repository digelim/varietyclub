<?php
/**
 * mouche Customizer Class
 *
 * @package  mouche
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'mouche_Customizer' ) ) :

	/**
	 * The mouche Customizer class
	 */
	class mouche_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
		}
	}
endif;

return new mouche_Customizer();
