<?php
/**
 * Template Name: Testimonials Page
 * Author: Daniel Yordanov
 * Version: 1.0
 */

get_header(); ?>

<main id="primary" class="site-main" style="background-color: white; color: black;">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php _e( 'Testimonials', 'textdomain' ); ?></h1>
        </header><!-- .page-header -->

        <?php
        // Custom query to fetch testimonials
        $args = array(
            'post_type' => 'testimonials',
            'posts_per_page' => -1, // Fetch all testimonials
        );

        $testimonials = new WP_Query( $args );

        if ( $testimonials->have_posts() ) {
            echo '<div class="testimonials-list">';
            while ( $testimonials->have_posts() ) {
                $testimonials->the_post();
                ?>
                <div class="testimonial">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="testimonial-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="testimonial-meta">
                        <p><strong><?php echo get_post_meta( get_the_ID(), 'client-name', true ); ?></strong></p>
                        <p><?php echo get_post_meta( get_the_ID(), 'client-position', true ); ?></p>
                        <p><?php echo get_post_meta( get_the_ID(), 'client-company', true ); ?></p>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>' . __( 'No testimonials found', 'textdomain' ) . '</p>';
        }

        // Restore original post data
        wp_reset_postdata();
        ?>
    </div><!-- .container -->
</main><!-- #main -->

<?php get_footer(); ?>
