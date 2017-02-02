<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/admin
 * @author     Dario Curasì <curasi.d87@gmail.com>
 */
class Dc_Pomfw_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dc_Pomfw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dc_Pomfw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dc-pomfw-admin.css', array(), $this->version, 'all' );

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
		 * defined in Dc_Pomfw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dc_Pomfw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dc-pomfw-admin.js', array( 'jquery' ), $this->version, false );

	}

	//inizializzazione menu di amministrazione
	function add_menu_page()
	{
	    add_submenu_page('woocommerce','Prices Only Members', 'Prices Only Members', 'manage_options', 'dc-pomfw-menu-page', array( $this,'create_admin_interface' ));
	}

	/**
	 * Callback function for the admin settings page.
	 *
	 * @since    1.0.0
	 */
	public function create_admin_interface(){

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/dc-pomfw-admin-display.php';

	}

	/**
	 * Creates our settings sections with fields etc.
	 *
	 * @since    1.0.0
	 */
	public function settings_api_init(){
		register_setting('dc_pomfw_options_group', 'dc_pomfw_activate');
	    register_setting('dc_pomfw_options_group', 'dc_pomfw_message');
	    register_setting('dc_pomfw_options_group', 'dc_pomfw_position');
	    register_setting('dc_pomfw_options_group', 'dc_pomfw_login_text');
	    register_setting('dc_pomfw_options_group', 'dc_pomfw_login_link');
	    register_setting('dc_pomfw_options_group', 'dc_pomfw_register_text');
	    register_setting('dc_pomfw_options_group', 'dc_pomfw_register_link');
	}

	/**
	 * shortcode login
	 *
	 * @since    1.0.0
	 */
	public function dc_pomfw_login_link() {
		if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && function_exists('pll__') ) {
	    	return '<a href="'.get_option('dc_pomfw_login_link').'">'.pll__(get_option('dc_pomfw_login_text')).'</a>';
	    }
	    else {
	    	return '<a href="'.get_option('dc_pomfw_login_link').'">'.get_option('dc_pomfw_login_text').'</a>';
	    }
	}

	/**
	 * shortcode register
	 *
	 * @since    1.0.0
	 */
	public function dc_pomfw_register_link() {
		if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && function_exists('pll__') ) {
	    	return '<a href="'.get_option('dc_pomfw_register_link').'">'.pll__(get_option('dc_pomfw_register_text')).'</a>';
	    }
	    else {
	    	return '<a href="'.get_option('dc_pomfw_register_link').'">'.get_option('dc_pomfw_register_text').'</a>';
	    }
	}

	/**
	 * Error notice when Woocommerce is not installed.
	 *
	 * @since    1.0.0
	 */
	public function error_notice() {
		echo '<div class="notice notice-error is-dismissible">
        		<p>'.__('Prices Only Members for Woocommerce is active but does not work. You need to install WooCommerce because the plugin is working properly.', 'dc-pomfw').'</p>
    		  </div>';
	}

	/**
	 * register string in polylang
	 *
	 * @since    1.0.0
	 */
	public function dc_pomfw_register_string_polylang() {
		if (function_exists('pll_register_string')) {
			pll_register_string('Message', get_option('dc_pomfw_message'), 'dc-pomfw');
			pll_register_string('Login Text', get_option('dc_pomfw_login_text'), 'dc-pomfw');
			pll_register_string('Register Text', get_option('dc_pomfw_register_text'), 'dc-pomfw');
		}
	}

}
