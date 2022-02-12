<?php
/**
 * Plugin Name:      	Absolute Swiper
 * Plugin URI:        	
 * Description:       	This is Absolue Swiper slider plugin
 * Version:           	1.0.1
 * Requires at least: 	5.3
 * Requires PHP:      	7.3
 * Author:            	Nazmul hasan
 * Author URI:         	
 * Text Domain:       	absolute-swiper
 * License:           	GPLv2 or later
 * License URI:       	
 * GitHub Plugin URI: 	
 */
/*

*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( !class_exists( 'Absolute_Swiper' ) ) {
	class Absolute_Swiper
	{
		public $plugin;
		function __construct() {
			$this->plugin = plugin_basename( __FILE__ );

			include_once( plugin_dir_path( __FILE__ ) . 'inc/meta-box-options.php' );
			include_once( plugin_dir_path( __FILE__ ) . 'shortcode/slide-js-shortcode.php' );
			include_once( plugin_dir_path( __FILE__ ) . 'inc/front-columns.php' );
			$this->absolute_register();
		}

		function absolute_register() {
			add_action( 'admin_enqueue_scripts', array( $this, 'absolute_admin_enqueue' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'absolute_front_enqueue' ) );
			add_action( 'init', array( $this, 'absolute_custom_post_type' ) );
		}

		function absolute_admin_enqueue() {
			wp_enqueue_media();
			wp_enqueue_style( 'absolute-admin-css', plugins_url( '/admin/css/admin.css', __FILE__ ) );
			wp_enqueue_script( 'absolute-admin-js', plugins_url( '/admin/js/func-admin.js', __FILE__ ), array('jquery'), '1.0.0', true );
		}

		function absolute_front_enqueue() {
			wp_enqueue_style( 'absolute-swiper-bundle-css', plugins_url( '/public/css/swiper-bundle.min.css', __FILE__ ) );
			wp_enqueue_style( 'absolute-swiper-main-css', plugins_url( '/public/css/main.css', __FILE__ ) );
			wp_enqueue_script( 'absolute-swiper-bundle-js', plugins_url( '/public/js/swiper-bundle.min.js', __FILE__ ), array('jquery'), '8.0.4', true );
			wp_enqueue_script( 'absolute-swiper-main-js', plugins_url( '/public/js/main.js', __FILE__ ), array('jquery'), '1.0.0', true );
		}

		function absolute_custom_post_type() {
			include_once( plugin_dir_path( __FILE__ ) . 'inc/post-types.php' );
		}

		function activate() {
			flush_rewrite_rules();
		}

		function deactivate() {
			flush_rewrite_rules();
		}
	}
}

$Absolute_Swiper = new Absolute_Swiper();

register_activation_hook( __FILE__, array( $Absolute_Swiper, 'activate' ) );
register_deactivation_hook( __FILE__, array( $Absolute_Swiper, 'deactivate' ));