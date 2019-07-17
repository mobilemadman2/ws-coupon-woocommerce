<?php

    require_once('Ws_Woo_Class.php');

	/* Actions */;
	add_action( 'wp_footer', array( 'Ws_Coupon_Woo', 'showPopUp' ) ); 