<?php

// Adding support for post thumbnails
add_theme_support( 'post-thumbnails' );

// Enqueuing theme styles
function hellion_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'hellion_enqueue_styles');

// Enqueuing theme scripts
function hellion_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('dropotron', get_theme_file_uri() . '/assets/js/jquery.dropotron.min.js', array('jquery'), null, true);
    wp_enqueue_script('browser', get_theme_file_uri() . '/assets/js/browser.min.js', array('jquery'), null, true);
    wp_enqueue_script('breakpoints', get_theme_file_uri() . '/assets/js/breakpoints.min.js', array('jquery'), null, true);
    wp_enqueue_script('util', get_theme_file_uri() . '/assets/js/util.js', array('jquery'), null, true);
    wp_enqueue_script('main', get_theme_file_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'hellion_enqueue_scripts');

// Register Hellion theme menus

function hellion_register_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Hellion Main Menu', 'hellion-theme')
        )
    );
}
add_action('init', 'hellion_register_menus');


// Register sidebar widgets for the footer area

function hellion_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Sidebar 1', 'hellion-theme'),
        'id'            => 'footer-sidebar1',
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Sidebar 2', 'hellion-theme'),
        'id'            => 'footer-sidebar2',
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Sidebar 3', 'hellion-theme'),
        'id'            => 'footer-sidebar3',
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Sidebar 4', 'hellion-theme'),
        'id'            => 'footer-sidebar4',
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Sidebar 5', 'hellion-theme'),
        'id'            => 'footer-sidebar5',
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'hellion_widgets_init');

// Function to create a Custom Post Type "Testimonials"
function hellion_testimonials() {
    $labels = array(
        "name" => __( "Testimonials", "textdomain" ),
        "singular_name" => __( "Testimonial", "textdomain" ),
        "menu_name" => __( "Testimonials", "textdomain" ),
        "all_items" => __( "All Testimonials", "textdomain" ),
        "add_new" => __( "Add New", "textdomain" ),
        "add_new_item" => __( "Add New Testimonial", "textdomain" ),
        "edit_item" => __( "Edit Testimonial", "textdomain" ),
        "new_item" => __( "New Testimonial", "textdomain" ),
        "view_item" => __( "View Testimonial", "textdomain" ),
        "search_items" => __( "Search Testimonials", "textdomain" ),
        "not_found" => __( "No Testimonials found", "textdomain" ),
        "not_found_in_trash" => __( "No Testimonials found in Trash", "textdomain" ),
    );

    $args = array(
        "label" => __( "Testimonials", "textdomain" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "testimonials",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "testimonials", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 20,
        "menu_icon" => "dashicons-format-quote",
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "testimonials", $args );
}

add_action( 'init', 'hellion_testimonials' );


// Register the meta box
function hellion_testimonials_register_meta_box() {
    add_meta_box(
        'hellion_testimonials_meta_box', // Unique ID
        'Hellion Testimonial Details', // Box title
        'hellion_testimonials_display_meta_box', // Content callback, must be of type callable
        'hellion_testimonials', // Post type
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'hellion_testimonials_register_meta_box' );

// Display the meta box
function hellion_testimonials_display_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'hellion_testimonials_nonce' );
    $testimonials_stored_meta = get_post_meta( $post->ID );
    ?>
    <p>
        <label for="client-name" class="testimonials-row-title"><?php _e( 'Client Name', 'textdomain' )?></label>
        <input type="text" name="client-name" id="client-name" value="<?php if ( isset ( $testimonials_stored_meta['client-name'] ) ) echo $testimonials_stored_meta['client-name'][0]; ?>" />
    </p>
    <p>
        <label for="client-position" class="testimonials-row-title"><?php _e( 'Client Position', 'textdomain' )?></label>
        <input type="text" name="client-position" id="client-position" value="<?php if ( isset ( $testimonials_stored_meta['client-position'] ) ) echo $testimonials_stored_meta['client-position'][0]; ?>" />
    </p>
    <p>
        <label for="client-company" class="testimonials-row-title"><?php _e( 'Client Company', 'textdomain' )?></label>
        <input type="text" name="client-company" id="client-company" value="<?php if ( isset ( $testimonials_stored_meta['client-company'] ) ) echo $testimonials_stored_meta['client-company'][0]; ?>" />
    </p>
    <?php
}

// Save the meta box data
function hellion_testimonials_save_meta_box_data( $post_id ) {
    // Check if nonce is set.
    if ( ! isset( $_POST['hellion_testimonials_nonce'] ) ) {
        return $post_id;
    }
    $nonce = $_POST['hellion_testimonials_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, basename( __FILE__ ) ) ) {
        return $post_id;
    }

    // Check if this is an autosave.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // Check the user's permissions.
    if ( 'testimonials' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }

    // Update the meta field in the database.
    if ( isset( $_POST['client-name'] ) ) {
        update_post_meta( $post_id, 'client-name', sanitize_text_field( $_POST['client-name'] ) );
    }
    if ( isset( $_POST['client-position'] ) ) {
        update_post_meta( $post_id, 'client-position', sanitize_text_field( $_POST['client-position'] ) );
    }
    if ( isset( $_POST['client-company'] ) ) {
        update_post_meta( $post_id, 'client-company', sanitize_text_field( $_POST['client-company'] ) );
    }
}
add_action( 'save_post', 'hellion_testimonials_save_meta_box_data' );

function hellion_use_custom_date_archive_template($query) {
    if ($query->is_main_query() && !is_admin() && $query->is_date()) {
        $query->set('post_type', array('post'));
        locate_template('archive-date.php', true);
    }
}
add_action('pre_get_posts', 'hellion_use_custom_date_archive_template');

function hellion_modify_author_archive_query($query) {
    if ($query->is_author() && $query->is_main_query()) {
        $query->set('posts_per_page', 10); // Change the number of posts per page
    }
}
add_action('pre_get_posts', 'hellion_modify_author_archive_query');


?>
