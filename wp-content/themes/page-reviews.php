<?php
/**
 * Template Name: Reviews Page
 * Author: Daniel Yordanov
 * Version: 1.0
 */

get_header(); ?>

<main id="primary" class="site-main" style="background-color: white; color: black;">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php _e( 'Reviews', 'textdomain' ); ?></h1>
        </header><!-- .page-header -->

        <?php
        // Custom query to fetch reviews
        $args = array(
            'post_type' => 'reviews',
            'posts_per_page' => -1, // Fetch all reviews
        );

        $reviews = new WP_Query( $args );

        if ( $reviews->have_posts() ) {
            echo '<div class="reviews-list">';
            while ( $reviews->have_posts() ) {
                $reviews->the_post();
                ?>
                <div class="review">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="review-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="review-meta">
                        <p><strong><?php echo get_post_meta( get_the_ID(), '_reviews_rating', true ); ?></strong> stars</p>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>' . __( 'No reviews found', 'textdomain' ) . '</p>';
        }

        // Restore original post data
        wp_reset_postdata();
        ?>
    </div><!-- .container -->
</main><!-- #main -->

<?php get_footer(); ?>
