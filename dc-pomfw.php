<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/dcurasi
 * @since             1.0.0
 * @package           Dc_Pomfw
 *
 * @wordpress-plugin
 * Plugin Name:       Prices Only Members for Woocommerce
 * Plugin URI:        https://github.com/dcurasi/dc-pomfw
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Dario Curasì
 * Author URI:        https://github.com/dcurasi
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dc-pomfw
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dc-pomfw-activator.php
 */
function activate_dc_pomfw() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dc-pomfw-activator.php';
	Dc_Pomfw_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dc-pomfw-deactivator.php
 */
function deactivate_dc_pomfw() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dc-pomfw-deactivator.php';
	Dc_Pomfw_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dc_pomfw' );
register_deactivation_hook( __FILE__, 'deactivate_dc_pomfw' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dc-pomfw.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dc_pomfw() {

	$plugin = new Dc_Pomfw();
	$plugin->run();

}
run_dc_pomfw();
