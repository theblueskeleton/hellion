<?php
function zerofour_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'zerofour_enqueue_styles');

function zerofour_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('dropotron', get_theme_file_uri() . '/assets/js/jquery.dropotron.min.js', array('jquery'), null, true);
    wp_enqueue_script('browser', get_theme_file_uri() . '/assets/js/browser.min.js', array('jquery'), null, true);
    wp_enqueue_script('breakpoints', get_theme_file_uri() . '/assets/js/breakpoints.min.js', array('jquery'), null, true);
    wp_enqueue_script('util', get_theme_file_uri() . '/assets/js/util.js', array('jquery'), null, true);
    wp_enqueue_script('main', get_theme_file_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'zerofour_enqueue_scripts');

?>
