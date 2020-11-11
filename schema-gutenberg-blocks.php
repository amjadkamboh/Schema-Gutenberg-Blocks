<?php

/**
 * The plugin bootstrap file
 *
 * A beautiful collection of schema Gutenberg blocks to help you editor with SEO Automation.
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              amjadbashir.ui7@gmail.com
 * @since             1.0.0
 * @package           Schema_Gutenberg_Blocks
 *
 * @wordpress-plugin
 * Plugin Name:       Schema Gutenberg Blocks
 * Plugin URI:        #
 * Description:       A beautiful collection of schema Gutenberg blocks to help you editor with SEO Automation.
 * Version:           1.0.0
 * Author:            Amjad Kamboh
 * Author URI:        amjadbashir.ui7@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       schema-gutenberg-blocks
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define('PLUGIN_PATH',plugin_dir_path( __FILE__ ));
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SCHEMA_GUTENBERG_BLOCKS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-schema-gutenberg-blocks-activator.php
 */
function activate_schema_gutenberg_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-schema-gutenberg-blocks-activator.php';
	Schema_Gutenberg_Blocks_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-schema-gutenberg-blocks-deactivator.php
 */
function deactivate_schema_gutenberg_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-schema-gutenberg-blocks-deactivator.php';
	Schema_Gutenberg_Blocks_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_schema_gutenberg_blocks' );
register_deactivation_hook( __FILE__, 'deactivate_schema_gutenberg_blocks' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require PLUGIN_PATH. 'includes/class-schema-gutenberg-blocks.php';

/**
 * The core plugin class that is used to define internationalization.
 */

require PLUGIN_PATH. 'admin/schema-block-page.php';




/**
 * Redirect to the Blocks Getting Started page on single plugin activation.
 */

 /**
 * Adds a redirect option during plugin activation on non-multisite installs.
 *
 * @param bool $network_wide Whether or not the plugin is being network activated.
 */
function schema_gutenberg_blocks_activate( $network_wide = false ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Only used to do a redirect. False positive.
	if ( ! $network_wide && ! isset( $_GET['activate-multi'] ) ) {
		add_option( 'schema_gutenberg_blocks_activate_redirect', true );
	}
}
register_activation_hook( __FILE__, 'schema_gutenberg_blocks_activate' );


/**
 * Redirect to the Schema Blocks Getting Started page on single plugin activation.
 */
function schema_gutenberg_blocks_activate_redirect() {
	if ( get_option( 'schema_gutenberg_blocks_activate_redirect', false ) ) {
		delete_option( 'schema_gutenberg_blocks_activate_redirect' );
		wp_safe_redirect( esc_url( admin_url( 'admin.php?page=schema_gutenberg_blocks' ) ) );
		exit;
	}
}
add_action( 'admin_init', 'schema_gutenberg_blocks_activate_redirect' );


function my_mario_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'schema-blocks',
				'title' => __( 'Schema Blocks', 'schema-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'my_mario_block_category', 10, 2);

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_schema_gutenberg_blocks() {

	$plugin = new Schema_Gutenberg_Blocks();
	$plugin->run();

}
run_schema_gutenberg_blocks();
