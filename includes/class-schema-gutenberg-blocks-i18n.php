<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       amjadbashir.ui7@gmail.com
 * @since      1.0.0
 *
 * @package    Schema_Gutenberg_Blocks
 * @subpackage Schema_Gutenberg_Blocks/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Schema_Gutenberg_Blocks
 * @subpackage Schema_Gutenberg_Blocks/includes
 * @author     Amjad Kamboh <amjadbashir.ui7@gmail.com>
 */
class Schema_Gutenberg_Blocks_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'schema-gutenberg-blocks',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' 
		);

	}



}
