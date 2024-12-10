<?php
/**
 * Template Name: Reviews Page
 */

get_header(); ?>

<main id="primary" class="site-main" style="background-color: white; color: black;">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php _e('All Reviews', 'textdomain'); ?></h1>
        </header>

        <?php
        // Fetch all reviews
        $all_reviews_args = array(
            'post_type' => 'reviews',
            'posts_per_page' => -1, // Fetch all reviews
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $all_reviews_query = new WP_Query($all_reviews_args);

        if ($all_reviews_query->have_posts()) {
            echo '<div class="reviews-list">';
            while ($all_reviews_query->have_posts()) {
                $all_reviews_query->the_post();
                $likes = get_post_meta(get_the_ID(), '_review_likes', true) ?: 0;
                $dislikes = get_post_meta(get_the_ID(), '_review_dislikes', true) ?: 0;
                $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));
                ?>
                <div class="review-item">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="review-meta">
                        <p><strong><?php _e('Likes:', 'textdomain'); ?></strong> <?php echo $likes; ?></p>
                        <p><strong><?php _e('Dislikes:', 'textdomain'); ?></strong> <?php echo $dislikes; ?></p>
                        <p><strong><?php _e('Genres:', 'textdomain'); ?></strong> <?php echo implode(', ', $genres); ?></p>
                    </div>
                    <div class="review-content">
                        <?php the_excerpt(); ?>
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

        <header class="page-header">
            <h1 class="page-title"><?php _e('Most Liked Reviews', 'textdomain'); ?></h1>
        </header>

        <?php
        // Fetch most liked reviews
        $most_liked_args = array(
            'post_type' => 'reviews',
            'posts_per_page' => 5, // Limit to 5 most liked reviews
            'meta_key' => '_review_likes',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        );
        $most_liked_query = new WP_Query($most_liked_args);

        if ($most_liked_query->have_posts()) {
            echo '<div class="most-liked-reviews">';
            while ($most_liked_query->have_posts()) {
                $most_liked_query->the_post();
                $likes = get_post_meta(get_the_ID(), '_review_likes', true) ?: 0;
                $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));
                ?>
                <div class="review-item">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="review-meta">
                        <p><strong><?php _e('Likes:', 'textdomain'); ?></strong> <?php echo $likes; ?></p>
                        <p><strong><?php _e('Genres:', 'textdomain'); ?></strong> <?php echo implode(', ', $genres); ?></p>
                    </div>
                    <div class="review-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>' . __('No liked reviews found.', 'textdomain') . '</p>';
        }

        wp_reset_postdata();
        ?>

        <header class="page-header">
            <h1 class="page-title"><?php _e('Most Disliked Reviews', 'textdomain'); ?></h1>
        </header>

        <?php
        // Fetch most disliked reviews
        $most_disliked_args = array(
            'post_type' => 'reviews',
            'posts_per_page' => 5, // Limit to 5 most disliked reviews
            'meta_key' => '_review_dislikes',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        );
        $most_disliked_query = new WP_Query($most_disliked_args);

        if ($most_disliked_query->have_posts()) {
            echo '<div class="most-disliked-reviews">';
            while ($most_disliked_query->have_posts()) {
                $most_disliked_query->the_post();
                $dislikes = get_post_meta(get_the_ID(), '_review_dislikes', true) ?: 0;
                $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));
                ?>
                <div class="review-item">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="review-meta">
                        <p><strong><?php _e('Dislikes:', 'textdomain'); ?></strong> <?php echo $dislikes; ?></p>
                        <p><strong><?php _e('Genres:', 'textdomain'); ?></strong> <?php echo implode(', ', $genres); ?></p>
                    </div>
                    <div class="review-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>' . __('No disliked reviews found.', 'textdomain') . '</p>';
        }

        wp_reset_postdata();
        ?>
    </div>
</main>

<?php get_footer(); ?>
