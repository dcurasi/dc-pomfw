<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/includes
 * @author     Dario Curasì <curasi.d87@gmail.com>
 */
class Dc_Pomfw_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option('dc_pomfw_activate', 1);
	    add_option('dc_pomfw_message', __( 'Only registered users can purchase. [login] or [register].', 'dc-pomfw' ));
	    add_option('dc_pomfw_position', 'before_main_content');
	    add_option('dc_pomfw_login_text', __( 'Login', 'dc-pomfw' ));
	    add_option('dc_pomfw_login_link', '#');
	    add_option('dc_pomfw_register_text', __( 'Register', 'dc-pomfw' ));
	    add_option('dc_pomfw_register_link', '#');
	}

}
