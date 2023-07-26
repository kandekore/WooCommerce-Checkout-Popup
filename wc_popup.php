<?php
/**
 * Plugin Name: WooCommerce Checkout Popup
 * Description: A plugin that generates a popup when proceed to checkout is clicked.
 * Version: 1.0
 * Author: D.Kandekore
 */

// Check if WooCommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
    // Create the admin page
    function wc_popup_add_admin_page() {
        add_menu_page( 'WooCommerce Checkout Popup', 'WC Checkout Popup', 'manage_options', 'wc-checkout-popup', 'wc_popup_admin_page_callback', 'dashicons-warning', 90 );
    }
    add_action( 'admin_menu', 'wc_popup_add_admin_page' );

    // Admin page callback
function wc_popup_admin_page_callback() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Add or update options if form is submitted
    if (isset($_POST['wc_popup_content']) && isset($_POST['wc_popup_width']) && isset($_POST['wc_popup_height']) && isset($_POST['wc_popup_button_text'])) {
        update_option('wc_popup_content', $_POST['wc_popup_content']);
        update_option('wc_popup_width', $_POST['wc_popup_width']);
        update_option('wc_popup_height', $_POST['wc_popup_height']);
        update_option('wc_popup_button_text', $_POST['wc_popup_button_text']);
    }

    // Get option values
    $content = get_option('wc_popup_content', '');
    $width = get_option('wc_popup_width', '400');
    $height = get_option('wc_popup_height', '300');
    $button_text = get_option('wc_popup_button_text', 'Close');

    // Admin page content
    echo '<div class="wrap">';
    echo '<h1>' . __('WooCommerce Checkout Popup', 'wc-checkout-popup') . '</h1>';
    echo '<form method="post">';
    echo '<table class="form-table">';
    echo '<tr><th scope="row"><label for="wc_popup_content">' . __('Popup Content', 'wc-checkout-popup') . '</label></th>';
    echo '<td><textarea id="wc_popup_content" name="wc_popup_content" rows="10" class="regular-text">' . esc_textarea($content) . '</textarea></td></tr>';
    echo '<tr><th scope="row"><label for="wc_popup_width">' . __('Popup Width', 'wc-checkout-popup') . '</label></th>';
    echo '<td><input type="number" id="wc_popup_width" name="wc_popup_width" value="' . esc_attr($width) . '" class="regular-text" /></td></tr>';
    echo '<tr><th scope="row"><label for="wc_popup_height">' . __('Popup Height', 'wc-checkout-popup') . '</label></th>';
    echo '<td><input type="number" id="wc_popup_height" name="wc_popup_height" value="' . esc_attr($height) . '" class="regular-text" /></td></tr>';
    echo '<tr><th scope="row"><label for="wc_popup_button_text">' . __('Button Text', 'wc-checkout-popup') . '</label></th>';
    echo '<td><input type="text" id="wc_popup_button_text" name="wc_popup_button_text" value="' . esc_attr($button_text) . '" class="regular-text" /></td></tr>';
    echo '</table>';
    echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="' . __('Save Changes', 'wc-checkout-popup') . '"></p>';
    echo '</form>';
    echo '</div>';
}

    
// Enqueue frontend scripts and styles
function wc_popup_enqueue_scripts() {
    wp_enqueue_script( 'wc-popup-script', plugin_dir_url( __FILE__ ) . 'js/wc_popup.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style( 'wc-popup-styles', plugin_dir_url( __FILE__ ) . 'css/styles.css', array(), '1.0.0' );

    wp_localize_script( 'wc-popup-script', 'wc_popup_params', array(
        'popup_content' => get_option( 'wc_popup_content' ),
        'popup_width' => get_option( 'wc_popup_width' ),
        'popup_height' => get_option( 'wc_popup_height' ),
        'button_text' => get_option( 'wc_popup_button_text' ),
        'site_url' => get_option( 'siteurl' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'wc_popup_enqueue_scripts' );
}



