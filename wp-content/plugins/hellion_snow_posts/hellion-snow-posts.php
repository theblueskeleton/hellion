<?php
/*
 * Plugin Name: Hellion Snow Posts
 * Description: This plugin makes posts that have the tag "christmas" receive a snow effect.
 * Version: 0.1
 * Author: Daniel Yordanov
 */

// Enqueue the snow effect script for posts with the "christmas" tag
function hellion_enqueue_snow_effect() {
    if (get_option('hellion_enable_plugin', 1) && is_single() && has_tag('christmas')) {
        wp_enqueue_script('snowstorm', plugins_url('snowstorm.js', __FILE__), array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'hellion_enqueue_snow_effect');

// Include the snow effect configuration in the footer
function hellion_include_snow_effect_script() {
    if (get_option('hellion_enable_plugin', 1) && is_single() && has_tag('christmas')) {
        echo '<script type="text/javascript">
            snowStorm.autoStart = true;
            snowStorm.flakesMaxActive = 96;
            snowStorm.useTwinkleEffect = true;
        </script>';
    }
}
add_action('wp_footer', 'hellion_include_snow_effect_script');

// Add a Christmas tree icon to the titles of posts with the "christmas" tag
function hellion_add_christmas_tree_icon($title, $id) {
    if (get_option('hellion_enable_plugin', 1) && has_tag('christmas', $id)) {
        $icon = '<span class="christmas-tree-icon" style="color: green;">🎄</span> ';
        return $icon . $title;
    }
    return $title;
}
add_filter('the_title', 'hellion_add_christmas_tree_icon', 10, 2);

// Add small bearded elves to the content of posts with the "christmas" tag
function hellion_add_elves_to_content($content) {
    if (get_option('hellion_enable_plugin', 1) && has_tag('christmas') && is_singular('post')) {
        $elf_icon = '<span class="elf-icon" style="color: green;">🎅</span>';
        $paragraphs = explode('</p>', $content);
        foreach ($paragraphs as &$paragraph) {
            if (trim($paragraph)) {
                $words = explode(' ', $paragraph);
                $random_index = rand(0, count($words) - 1);
                $words[$random_index] .= ' ' . $elf_icon;
                $paragraph = implode(' ', $words);
            }
        }
        $content = implode('</p>', $paragraphs);
    }
    return $content;
}
add_filter('the_content', 'hellion_add_elves_to_content');

// Register options page
function hellion_register_options_page() {
    add_options_page(
        'Christmas Effects',  // Page title
        'Christmas Effects',  // Menu title
        'manage_options',         // Capability
        'christmas-snow-effect',  // Menu slug
        'hellion_options_page_html'   // Callback function
    );
}
add_action('admin_menu', 'hellion_register_options_page');

// Options page HTML
function hellion_options_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Save settings
    if (isset($_POST['hellion_settings_submit'])) {
        check_admin_referer('hellion_settings_nonce');
        update_option('hellion_enable_plugin', isset($_POST['hellion_enable_plugin']) ? 1 : 0);
        echo '<div class="updated"><p>Settings saved</p></div>';
    }

    // Get current settings
    $hellion_enable_plugin = get_option('hellion_enable_plugin', 1);
    ?>
    <div class="wrap">
        <h1>Christmas Effect Settings</h1>
        <form method="post" action="">
            <?php wp_nonce_field('hellion_settings_nonce'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Enable all Plugin Christmas effects</th>
                    <td>
                        <input type="checkbox" name="hellion_enable_plugin" value="1" <?php checked(1, $hellion_enable_plugin, true); ?> />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="hellion_settings_submit" value="1" />
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

?>
