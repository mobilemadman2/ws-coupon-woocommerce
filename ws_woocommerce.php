<?php

/*
Plugin Name: WS Coupon Woocommerce
Plugin URI: https://skrzeq.com/
Description: Show small popup about coupon on single product page.
Author: Wojciech Skrzek
Author URI: https://skrzeq.com
Version: 0.1
Text Domain: ws-coupon-woocommerce
*/

if ( ! class_exists( 'WS_Coupon_Woocommerce' ) ) {

	class WS_Coupon_Woocommerce {
		/** @var WS_Coupon_Woocommerce $instance */
		public static $instance;
		/** @var string $slug Contains plugin text domain */
		public static $slug = 'ws-coupon-woocommerce';
		/** @var string $plugin_path Path to plugin directory */
		public static $plugin_path = __DIR__;
		/** @var string $plugin_url URL address to plugin directory */
		public static $plugin_url = '';

		/**
		 * WS_Coupon_Woocommerce constructor.
		 */
		public function __construct() {
			self::$instance = $this;

			if ( empty( self::$plugin_path ) ) {
				self::$plugin_path = plugin_dir_path( __FILE__ );
			}

			if ( empty( self::$plugin_url ) ) {
				self::$plugin_url = plugin_dir_url( __FILE__ );
			}

			/* Registers */
			add_action( 'plugins_loaded', array( $this, 'init' ), 100 );

			
		}

		/**
		 * Perform an initialization
		 */
		function init() {
			/* Registers */
			add_action( 'wp_enqueue_scripts', array( $this, 'registerScripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'stylesToFrontend' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'adminRegisterScripts' ) );
			/*Language file*/
			load_plugin_textdomain( 'wpk-example', false, basename( dirname( __FILE__ ) ) . '/languages' );
			
			if(is_admin()) {
				require_once( 'admin/admin.php' );
			}
			if( class_exists( 'WooCommerce' ) ) {
				require_once( 'woocommerce/initWoo.php' );
			}
			if ( ! class_exists( 'WooCommerce' ) ) {
				add_action( 'admin_notices', array($this, 'woocommerce_ws_coupon_missing_wc_notice'));
				return;
			}
		
		}

		/**
		 * Create and return instance
		 *
		 * @return WS_Coupon_Woocommerce
		 */
		public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		
		
		function woocommerce_ws_coupon_missing_wc_notice() {
			echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Ws Coupon Woocommerce requires WooCommerce to be installed and active. You can download %s here.', 'woocommerce-gateway-stripe' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
		}


		/**
		 * Register Front End scripts and styles
		 */
		function registerScripts() {
			wp_enqueue_script( self::$slug . '-script', self::$plugin_url . 'assets/script.js', array( 'jquery' ), null, true );

			wp_localize_script(self::$slug . '-script', 'ws_script_vars', array(
				'alert'	=> get_option('ws_hide_after')
			));
		
			wp_enqueue_style( self::$slug, self::$plugin_url . 'assets/style.css', array(), null );

		}

		function adminRegisterScripts() {
			wp_enqueue_style( self::$slug . '-admin', self::$plugin_url . 'admin/assets/style.css', array(), null );
			wp_enqueue_script( self::$slug . '-admin', self::$plugin_url . 'admin/assets/script.js', array( 'jquery' ), null, true );
		}

		function stylesToFrontend() {
			wp_enqueue_style(
				self::$slug,
				get_template_directory_uri() . 'assets/style.css'
			);

			$ws_background_color = get_option( 'ws_popup_background' );
			$ws_border_color = get_option( 'ws_popup_border_color' );
			$ws_font_color = get_option( 'ws_popup_font_color' );
			$custom_css = "
			.ws_single_product-popup {
					background: {$ws_background_color};
					border-color: {$ws_border_color};
					color: {$ws_font_color};
			}";
			wp_add_inline_style( self::$slug, $custom_css );
		}

	}
}

WS_Coupon_Woocommerce::instance();

