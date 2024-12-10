<?php
/**
 * Plugin Name: Hellion Reviews
 * Description: A plugin that creates a Reviews Custom Post Type with Genres taxonomy, AJAX filtering, likes/dislikes, and more.
 * Version: 1.0
 * Author: Your Name
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register Reviews Custom Post Type
function hellion_create_reviews_cpt() {
    $args = array(
        'label' => __('Reviews', 'textdomain'),
        'description' => __('Custom Post Type for Reviews', 'textdomain'),
        'public' => true,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'has_archive' => true,
        'show_in_rest' => true,
    );
    register_post_type('reviews', $args);
}
add_action('init', 'hellion_create_reviews_cpt');

// Register Genre Taxonomy
function hellion_create_genre_taxonomy() {
    $args = array(
        'labels' => array(
            'name' => __('Genres', 'textdomain'),
            'singular_name' => __('Genre', 'textdomain')
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('genre', 'reviews', $args);
}
add_action('init', 'hellion_create_genre_taxonomy');

// Enqueue Scripts and Styles
function hellion_reviews_enqueue_scripts() {
    wp_enqueue_script(
        'hellion-reviews-script',
        plugins_url('js/hellion-reviews.js', __FILE__),
        array('jquery'),
        '1.0',
        true
    );

    wp_localize_script('hellion-reviews-script', 'hellion_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'hellion_reviews_enqueue_scripts');

// AJAX Handler for Genre Filtering
function hellion_filter_reviews() {
    $genre = isset($_POST['genre']) ? sanitize_text_field($_POST['genre']) : '';

    $args = array(
        'post_type' => 'reviews',
        'posts_per_page' => -1,
    );

    if ($genre) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'genre',
                'field' => 'slug',
                'terms' => $genre,
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="review-item">';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<div>' . get_the_excerpt() . '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No reviews found.</p>';
    }

    wp_die();
}
add_action('wp_ajax_filter_reviews', 'hellion_filter_reviews');
add_action('wp_ajax_nopriv_filter_reviews', 'hellion_filter_reviews');

// Add Like and Dislike Buttons
function hellion_add_like_dislike_buttons($content) {
    if (is_singular('reviews')) {
        $post_id = get_the_ID();
        $likes = get_post_meta($post_id, '_review_likes', true) ?: 0;
        $dislikes = get_post_meta($post_id, '_review_dislikes', true) ?: 0;

        $buttons = '<div class="review-voting">
            <button class="like-button" data-post-id="' . $post_id . '">Like (' . $likes . ')</button>
            <button class="dislike-button" data-post-id="' . $post_id . '">Dislike (' . $dislikes . ')</button>
        </div>';

        $content .= $buttons;
    }
    return $content;
}
add_filter('the_content', 'hellion_add_like_dislike_buttons');

// AJAX Handlers for Like and Dislike Buttons
function hellion_handle_like_dislike() {
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
    $type = isset($_POST['type']) ? sanitize_text_field($_POST['type']) : '';

    if ($post_id && in_array($type, ['like', 'dislike'])) {
        $meta_key = $type === 'like' ? '_review_likes' : '_review_dislikes';
        $current_count = get_post_meta($post_id, $meta_key, true) ?: 0;
        $new_count = $current_count + 1;
        update_post_meta($post_id, $meta_key, $new_count);

        wp_send_json_success(array('new_count' => $new_count));
    } else {
        wp_send_json_error('Invalid request');
    }
}
add_action('wp_ajax_like_dislike', 'hellion_handle_like_dislike');
add_action('wp_ajax_nopriv_like_dislike', 'hellion_handle_like_dislike');
?>