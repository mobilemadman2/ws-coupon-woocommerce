<?php

class Ws_Coupon_Register_Setting {

    public static function WsRegisterSettings() { 
        register_setting( 'ws-settings-group', 'ws_show_popup' );
        register_setting( 'ws-settings-group', 'ws_popup_title' );
        register_setting( 'ws-settings-group', 'ws_hide_after' );
        register_setting( 'ws-settings-group', 'ws_popup_coupon' );
        register_setting( 'ws-settings-group', 'ws_popup_background' );
        register_setting( 'ws-settings-group', 'ws_popup_border_color' );
        register_setting( 'ws-settings-group', 'ws_popup_font_color' );
    }

}