<?php
/**
 * Template Name: Reviews Page
 * Description: A template to display reviews with likes, dislikes, genres, and clickable links to the full reviews.
 */

get_header(); ?>

<main id="primary" class="site-main" style="background-color: white; color: black;">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Reviews', 'textdomain'); ?></h1>
        </header><!-- .page-header -->

        <section class="most-liked-reviews">
            <h2><?php _e('Most Liked Reviews', 'textdomain'); ?></h2>
            <?php
            $most_liked_args = array(
                'post_type' => 'reviews',
                'posts_per_page' => 5, // Limit to top 5 most liked reviews
                'meta_key' => '_review_likes',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            );

            $most_liked_reviews = new WP_Query($most_liked_args);

            if ($most_liked_reviews->have_posts()) {
                echo '<div class="reviews-list">';
                while ($most_liked_reviews->have_posts()) {
                    $most_liked_reviews->the_post();
                    $likes = get_post_meta(get_the_ID(), '_review_likes', true) ?: 0;
                    $dislikes = get_post_meta(get_the_ID(), '_review_dislikes', true) ?: 0;
                    $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));
                    ?>
                    <div class="review-item">
                        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="review-meta">
                            <p><strong><?php _e('Likes:', 'textdomain'); ?></strong> <?php echo $likes; ?></p>
                            <p><strong><?php _e('Dislikes:', 'textdomain'); ?></strong> <?php echo $dislikes; ?></p>
                            <p><strong><?php _e('Genres:', 'textdomain'); ?></strong> <?php echo implode(', ', $genres); ?></p>
                        </div>
                        <div class="review-content">
                            <a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>';
            } else {
                echo '<p>' . __('No reviews found.', 'textdomain') . '</p>';
            }
            wp_reset_postdata();
            ?>
        </section>

        <section class="most-disliked-reviews">
            <h2><?php _e('Most Disliked Reviews', 'textdomain'); ?></h2>
            <?php
            $most_disliked_args = array(
                'post_type' => 'reviews',
                'posts_per_page' => 5, // Limit to top 5 most disliked reviews
                'meta_key' => '_review_dislikes',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            );

            $most_disliked_reviews = new WP_Query($most_disliked_args);

            if ($most_disliked_reviews->have_posts()) {
                echo '<div class="reviews-list">';
                while ($most_disliked_reviews->have_posts()) {
                    $most_disliked_reviews->the_post();
                    $likes = get_post_meta(get_the_ID(), '_review_likes', true) ?: 0;
                    $dislikes = get_post_meta(get_the_ID(), '_review_dislikes', true) ?: 0;
                    $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));
                    ?>
                    <div class="review-item">
                        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="review-meta">
                            <p><strong><?php _e('Likes:', 'textdomain'); ?></strong> <?php echo $likes; ?></p>
                            <p><strong><?php _e('Dislikes:', 'textdomain'); ?></strong> <?php echo $dislikes; ?></p>
                            <p><strong><?php _e('Genres:', 'textdomain'); ?></strong> <?php echo implode(', ', $genres); ?></p>
                        </div>
                        <div class="review-content">
                            <a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>';
            } else {
                echo '<p>' . __('No reviews found.', 'textdomain') . '</p>';
            }
            wp_reset_postdata();
            ?>
        </section>
    </div><!-- .container -->
</main><!-- #main -->

<?php get_footer(); ?>
