<?php
function zerofour_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'zerofour_enqueue_styles');
?>
