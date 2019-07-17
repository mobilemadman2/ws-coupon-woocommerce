<div class="wrap ws-admin-page">
    <h1><?php _e( 'WS Woocommerce', 'ws-coupon-woocommerce' ); ?></h1>
    <form action="options.php" method="post">
        <?php settings_fields( 'ws-settings-group' ); ?>
        
        <div class="ws_width_100">
            <label>
                <?php _e('Display notification', 'ws-coupon-woocommerce'); ?>
                <input type="checkbox" name="ws_show_popup" class="ws_show_popup" value="1" <?= ( get_option( 'ws_show_popup' ) == "1" ) ? 'checked ' : '';  ?>>
            </label>
        </div>
        <div class="ws_width_100">
            <label class="ws_popup_title">
                <?php _e('Title of notification', 'ws-coupon-woocommerce'); ?>
                <input type="text" name="ws_popup_title" value="<?= get_option( 'ws_popup_title' ); ?>">
            </label>
        </div>
        <div class="ws_width_100">
            <label class="ws_hide_after">
                <?php _e('After Time', 'ws-coupon-woocommerce'); ?>
                <input type="text" name="ws_hide_after" value="<?= get_option( 'ws_hide_after' ); ?>">
                <?php _e('in seconds'); ?>
            </label>
        </div>
        <div class="ws_width_100">
            <?php 
                $args = array(
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'asc',
                    'post_type'      => 'shop_coupon',
                    'post_status'    => 'publish',
                );
                $coupons       = get_posts( $args );
                $option_coupon = get_option( 'ws_popup_coupon' );
            ?>
            <label>
                <?php _e('Select Coupon', 'ws-coupon-woocommerce'); ?>
                <select name="ws_popup_coupon" class="ws-woocommerce-admin-coupons">
                    <option value="" <?php selected( $option_coupon, '' ); ?>>
                        <?php _e( 'Blank', 'ws-coupon-woocommerce' ); ?>
                    </option>
                    <?php foreach ( $coupons as $coupon ) : ?>
                        <option value="<?= $coupon->post_title ?>" <?php selected( $option_coupon, $coupon->post_title, true ); ?>>
                            <?= $coupon->post_title; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="ws_width_100">
            <label class="ws_popup_border_color">
                <?php _e('Border Color', 'ws-coupon-woocommerce'); ?>
                <input type="text" name="ws_popup_border_color" value="<?= get_option( 'ws_popup_border_color' ); ?>">
                <?php _e('hex color'); ?>
            </label>
        </div>
        <div class="ws_width_100">
            <label class="ws_popup_background">
                <?php _e('Background Color', 'ws-coupon-woocommerce'); ?>
                <input type="text" name="ws_popup_background" value="<?= get_option( 'ws_popup_background' ); ?>">
                <?php _e('hex color'); ?>
            </label>
        </div>
        <div class="ws_width_100">
            <label class="ws_popup_font_color">
                <?php _e('Text Color', 'ws-coupon-woocommerce'); ?>
                <input type="text" name="ws_popup_font_color" value="<?= get_option( 'ws_popup_font_color' ); ?>">
                <?php _e('hex color'); ?>
            </label>
        </div>


        <?php submit_button( 'Save' ); ?>
    </form>
</div>