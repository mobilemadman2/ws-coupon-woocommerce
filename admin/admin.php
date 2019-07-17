<?php

require_once( 'Admin_Page_Class.php' );

add_action( 'admin_menu', array( 'Ws_Coupon_Admin_Page', 'createAdminMenu' ) );
add_action( 'admin_init', array( 'Ws_Coupon_Register_Setting', 'WsRegisterSettings' ) );