<?php
require_once('Admin_Page_Class.php');

class Ws_Coupon_Subadmin_Page {

    public static function createAdminMenu() {
        add_submenu_page( 
            'ws_woocommerce_slug', 
            'My Custom Page', 
            'My Custom Page',
            'manage_options', 
            'ws_two_woocommerce_slug',
            array( 'Ws_Coupon_Subadmin_Page', 'adminSubMenuCallback')
        );
    }

    public function adminSubMenuCallback() {
        ?>
             <div class="wrap">
                <h1><?php _e( 'Admin Sub Page Test', 'ws-coupon-woocommerce' ); ?></h1>
            </div>
        <?php
    }

}