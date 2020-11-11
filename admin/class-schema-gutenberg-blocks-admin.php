<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       amjadbashir.ui7@gmail.com
 * @since      1.0.0
 *
 * @package    Schema_Gutenberg_Blocks
 * @subpackage Schema_Gutenberg_Blocks/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Schema_Gutenberg_Blocks
 * @subpackage Schema_Gutenberg_Blocks/admin
 * @author     Amjad Kamboh <amjadbashir.ui7@gmail.com>
 */

class Schema_Gutenberg_Blocks_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the Blocks for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * Enqueue script for accordion block function.
		*/
		wp_enqueue_script(
			'schema_gutenberg-block-accordion',
			plugin_dir_url( __FILE__ ) . 'block/accordion_sc.js',
			array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor' )
		);
		/**
		 * Enqueue script for testimonial block function.
		*/
		wp_enqueue_script(
			'schema_gutenberg-block-testimonial',
			plugin_dir_url( __FILE__ ) . 'block/testimonial_sc.js',
			array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor' )
		);

	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function block_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Schema_Gutenberg_Blocks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Schema_Gutenberg_Blocks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 
			$this->plugin_name, 
			plugin_dir_url( __FILE__ ) . 'css/schema-gutenberg-blocks-admin.css', 
			array(), 
			$this->version, 
			'all' 
		);

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Schema_Gutenberg_Blocks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Schema_Gutenberg_Blocks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 
			$this->plugin_name, 
			plugin_dir_url( __FILE__ ) . 'js/schema-gutenberg-blocks-admin.js', 
			array( 'jquery' ), 
			$this->version, 
			false );

	}
	

}
