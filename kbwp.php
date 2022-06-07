<?php

/**
 * @link              ragudev.com
 * @since             1.0.0
 * @package           Kbwp
 *
 * @wordpress-plugin
 * Plugin Name:       Knowledge Base WP
 * Plugin URI:        ragudev.com
 * Description:       Install this plugin to get the Knowledge Base CPT
 * Version:           1.0.0
 * Author:            ragu
 * Author URI:        ragudev.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kbwp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'FDWP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kbwp-activator.php
 */
function activate_kbwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kbwp-activator.php';
	Kbwp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kbwp-deactivator.php
 */
function deactivate_kbwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kbwp-deactivator.php';
	Kbwp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kbwp' );
register_deactivation_hook( __FILE__, 'deactivate_kbwp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-kbwp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kbwp() {

	$plugin = new Kbwp();
	$plugin->run();

}
run_kbwp();
