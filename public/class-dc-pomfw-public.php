<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dc_Pomfw
 * @subpackage Dc_Pomfw/public
 * @author     Dario Curasì <curasi.d87@gmail.com>
 */
class Dc_Pomfw_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dc-pomfw-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dc-pomfw-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * remove prices
	 *
	 * @since    1.0.0
	 */
	public function dc_pomfw_remove_prices() {
		if(!is_user_logged_in() ) {
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
        	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        	if(get_option('dc_pomfw_position') == 'before_main_content') {
        		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        	}
		}
	}

	/**
	 * call type notice
	 *
	 * @since    1.0.0
	 */
	public function dc_pomfw_prices_notice() {
		if(!is_user_logged_in() ) {
    		if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && function_exists('pll__') ) {
    			echo do_shortcode(pll__(get_option('dc_pomfw_message')));
    		}
    		else {
    			echo do_shortcode(get_option('dc_pomfw_message'));
    		}
		}
	}

	/**
	 * display notice
	 *
	 * @since    1.0.0
	 */
	public function dc_pomfw_content_notice() {
		if(!is_user_logged_in() ) {
			if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && function_exists('pll__') ) {
				wc_print_notice(do_shortcode(pll__(get_option('dc_pomfw_message'))), 'notice');
			}
			else {
				wc_print_notice(do_shortcode(get_option('dc_pomfw_message')), 'notice');
			}
		}
	}

}
