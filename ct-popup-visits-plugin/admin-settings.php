<?php

// Add menu to WordPress Dashboard

function pvp_add_menu() {
    add_options_page('Popup Visits Settings', 'Popup Visits', 'manage_options', 'pvp-settings', 'pvp_display_settings');
}
add_action('admin_menu', 'pvp_add_menu');

// Display settings page
function pvp_display_settings() {
    if (isset($_POST['pvp_save_settings'])) {
        update_option('pvp_trigger_count', intval($_POST['pvp_trigger_count']));
        update_option('pvp_cookie_lifetime', intval($_POST['pvp_cookie_lifetime']));
        update_option('pvp_delay', intval($_POST['pvp_delay']));
        update_option('pvp_popup_content', wp_kses_post(stripslashes($_POST['pvp_popup_content'])));
    }
    ?>
    <div class="wrap">
        <h2>Popup Visits Settings</h2>
        <form method="post">
            <table class="form-table">
                <tr>
                    <th>Trigger on Page View #</th>
                    <td><input type="number" name="pvp_trigger_count" value="<?php echo get_option('pvp_trigger_count', 1); ?>" />
                        <p class="description">The popup will attempt to display after this number of page views and will keep trying until successfully shown once.</p>
                    </td>
                </tr>
                <tr>
                    <th>Cookie Lifetime (days)</th>
                    <td><input type="number" name="pvp_cookie_lifetime" value="<?php echo get_option('pvp_cookie_lifetime', 30); ?>" />
                        <p class="description">Determine the number of days before the page view counter resets. Min value: 1</p>
                    </td>
                </tr>
                <tr>
                    <th>Popup show delay (seconds)</th>
                    <td><input type="number" name="pvp_delay" value="<?php echo get_option('pvp_delay', 5); ?>" /></td>
                </tr>
                <tr>
                    <th>Popup Content</th>
                    <td><textarea name="pvp_popup_content" rows="5" cols="50"><?php echo esc_textarea(get_option('pvp_popup_content')); ?></textarea>
                    <p class="description">Shortcode, HTML or text</p>
                    </td>
                </tr>
            </table>
            <input type="submit" name="pvp_save_settings" value="Save Settings" class="button button-primary" />
        </form>
    </div>
    <?php
}
