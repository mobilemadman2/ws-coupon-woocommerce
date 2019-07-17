<?php

class Ws_Coupon_Woo {

    public static function showPopUp() {
        if( get_option( 'ws_show_popup' ) == 1 ) {
            $coupon = new WC_Coupon( get_option( 'ws_popup_coupon' ) );
            ob_start(); ?>
                <div class="ws_single_product-popup ws-slide-in">
                        <h3><?= get_option( 'ws_popup_title' )  ?></h3>
                        <span><?= __('Use this code: ', 'ws-coupon-woocommerce') . $coupon->get_code() ?></span>
                </div>
            <?php
            ob_end_flush();
        } else {
            return;
        }
    }

}
		