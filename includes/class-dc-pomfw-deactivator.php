<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/includes
 * @author     Dario Curasì <curasi.d87@gmail.com>
 */
class Dc_Pomfw_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option('dc_pomfw_activate');
	    delete_option('dc_pomfw_message');
	    delete_option('dc_pomfw_position');
	    delete_option('dc_pomfw_login_text');
	    delete_option('dc_pomfw_login_link');
	    delete_option('dc_pomfw_register_text');
	    delete_option('dc_pomfw_register_link');
	}

}
