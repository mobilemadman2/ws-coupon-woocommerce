<?php
require_once('Register_Settings_Class.php');
require_once('Subadmin_Page_Class.php');

class Ws_Coupon_Admin_Page {

    public static function createAdminMenu() {
        add_menu_page( 
            __( 'WS Woocommerce', 'ws-coupon-woocommerce' ),
            'WS Woocommerce',
            'manage_options',
            'ws_woocommerce',
             array('Ws_Coupon_Admin_Page', 'adminMenuCallback'),
             'dashicons-admin-plugins',
            99
        );

        Ws_Coupon_Subadmin_Page::createAdminMenu();
    }

    public static function adminMenuCallback() {  
        if( class_exists( 'WooCommerce' ) ) :
            
            include( plugin_dir_path( __FILE__ ) . '/pages/admin-page.php' );

            else : 
              
            include( plugin_dir_path( __FILE__ ) . '/pages/admin-no-woocommerce.php' );

        endif;
    }


}