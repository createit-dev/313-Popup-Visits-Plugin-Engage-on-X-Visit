<?php
/*
Plugin Name: Popup Visits Plugin
Description: Show content in a popup on user's X visit.
Version: 1.0
Author: createIT
Author URI: https://www.createit.com
*/

// Include other necessary files
include('admin-settings.php');

// Enqueue frontend scripts
function pvp_enqueue_scripts() {
    wp_enqueue_script('pvp-jscookie', plugins_url('assets/js/js.cookie.min.js', __FILE__), array('jquery'), '1.0.0', true);

    // Enqueue Magnific Popup CSS and JS (assuming you've placed them in a 'lib' folder in your plugin directory)
    wp_enqueue_style('magnific-popup-css', plugins_url('assets/css/magnific-popup.css', __FILE__));
    wp_enqueue_script('magnific-popup-js', plugins_url('assets/js/jquery.magnific-popup.min.js', __FILE__), array('jquery'), '1.0.0', true);

    // Enqueue our custom script
    wp_enqueue_script('pvp-script', plugins_url('assets/js/popup-script.js', __FILE__), array('jquery', 'magnific-popup-js'), '1.0.0', true);

    // Pass PHP variables to our script
    wp_localize_script('pvp-script', 'pvp_data', array(
        'trigger_count' => intval(get_option('pvp_trigger_count', 1)),
        'delay' => intval(get_option('pvp_delay', 5)),
        'cookie_lifetime' => intval(get_option('pvp_cookie_lifetime', 30))
    ));
}
add_action('wp_enqueue_scripts', 'pvp_enqueue_scripts');



// Check for the cookie and display content
function pvp_display_popup() {
    $my_content = get_option('pvp_popup_content');

    if(!empty($my_content)){
        $my_content_cleaned = stripslashes($my_content);
        echo '<div id="pvp-popup" class="white-popup mfp-hide">' . do_shortcode($my_content_cleaned) . '</div>';
    }
}
add_action('wp_footer', 'pvp_display_popup');
