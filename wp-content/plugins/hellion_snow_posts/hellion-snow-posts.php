<?php
/*
 * Plugin Name: Hellion Snow Posts
 * Description: This plugin makes postws that have the tag "christmas" receive a snow effect
 * Version 0.1
 * Author: Daniel Yordanov
 */

// Enqueue the snow effect script for posts with the "christmas" tag
function cse_enqueue_snow_effect() {
    if (is_single() && has_tag('christmas')) {
        wp_enqueue_script('snowstorm', plugins_url('snowstorm.js', __FILE__), array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'cse_enqueue_snow_effect');

// Include the snow effect configuration in the footer
function cse_include_snow_effect_script() {
    if (is_single() && has_tag('christmas')) {
        echo '<script type="text/javascript">
            snowStorm.autoStart = true;
            snowStorm.flakesMaxActive = 96;
            snowStorm.useTwinkleEffect = true;
        </script>';
    }
}
add_action('wp_footer', 'cse_include_snow_effect_script');

// Add a Christmas tree icon to the titles of posts with the "christmas" tag
function cse_add_christmas_tree_icon($title, $id) {
    if (has_tag('christmas', $id)) {
        $icon = '<span class="christmas-tree-icon" style="color: green;">🎄</span> ';
        return $icon . $title;
    }
    return $title;
}
add_filter('the_title', 'cse_add_christmas_tree_icon', 10, 2);

// Add small elves to the content of posts with the "christmas" tag
function cse_add_elves_to_content($content) {
    if (has_tag('christmas') && is_singular('post')) {
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
add_filter('the_content', 'cse_add_elves_to_content');

?>
