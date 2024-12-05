<section class="container box feature2">
    <div class="row">
        <?php
        // Define the WP_Query to fetch featured posts
        $args = array(
            'category_name' => 'featured', // Make sure you have a 'featured' category or change as needed
            'posts_per_page' => 2 // Number of featured posts to display
        );
        $featured_query = new WP_Query($args);

        // Loop through the posts
        if ($featured_query->have_posts()) :
            while ($featured_query->have_posts()) : $featured_query->the_post();
        ?>
        <div class="col-6 col-12-medium">
            <section>
                <header class="major">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                </header>
                <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
                <footer>
                    <a href="<?php the_permalink(); ?>" class="button medium icon solid fa-arrow-circle-right"><?php _e('Continue Reading', 'hellion-theme'); ?></a>
                </footer>
            </section>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            _e('No featured posts found', 'hellion-theme');
        endif;
        ?>
    </div>
</section>
