<?php
/*
 * Plugin Name:       Floating Social Share Bar ( Lizard )
 * Plugin URI:        https://github.com/shshanker/floating-social-share-bar-lizard
 * Description:       Floating social share bar for WordPress, has ability to change the main icon backgroud-color-bar based on active share options.
 * Version:           1.0.0
 * Author:            shivashankerbhatta, RiteshShakya
 * Author URI:        https://github.com/shshanker
 * Text Domain:       floating-social-share-bar-lizard
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );  // prevent direct access

if ( ! class_exists( 'Floating_Social_Share_Lizard' ) ) :
	
	class Floating_Social_Share_Lizard {


		/**
		 * Plugin version.
		 *
		 * @var string
		 */
		const VERSION = '2.0.1';

		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;


		/**
		 * Initialize the plugin.
		 */
		public function __construct(){

				
				/**
				 * Check if WooCommerce is active
				 **/
				
		   		include_once 'includes/awfss-frontend.php';
		   		include_once 'includes/awfss-backend.php';
					
					

			} // end of contructor

		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}


		



	}// end of the class

add_action( 'plugins_loaded', array( 'Floating_Social_Share_Lizard', 'get_instance' ), 0 );

endif;