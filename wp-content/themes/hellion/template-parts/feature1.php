<section class="container box feature1">
    <div class="row">
        <div class="col-12">
            <header class="first major">
                <h2><?php _e('This is where the Index of the Hellion theme begins', 'hellion-theme'); ?></h2>
                <p><?php _e('The HELLION theme turned out to be <strong>pretty awesome</strong> ...', 'hellion-theme'); ?></p>
            </header>
        </div>

        <?php
        // Define the WP_Query to fetch posts for the feature section
        $args = array(
            'category_name' => 'feature', // Make sure you have a 'feature' category or change as needed
            'posts_per_page' => 3 // Number of posts to display
        );
        $feature_query = new WP_Query($args);

        // Loop through the posts
        if ($feature_query->have_posts()) :
            while ($feature_query->have_posts()) : $feature_query->the_post();
        ?>
        <div class="col-4 col-12-medium">
            <section>
                <a href="<?php the_permalink(); ?>" class="image featured">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                    <?php endif; ?>
                </a>
                <header class="second icon solid fa-user">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 4, '...'); ?></p>
                </header>

            </section>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            _e('No feature posts found', 'hellion-theme');
        endif;
        ?>

    </div>
</section>
