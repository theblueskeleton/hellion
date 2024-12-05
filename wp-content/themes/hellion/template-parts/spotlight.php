<section class="box spotlight">
    <h2 class="icon fa-file-alt"><?php _e('spotlight', 'hellion-theme'); ?></h2>
    <?php
    // Define the WP_Query to fetch spotlight posts
    $args = array(
        'category_name' => 'spotlight', // Make sure you have a 'spotlight' category or change as needed
        'posts_per_page' => 2 // Adjust the number of posts as needed
    );
    $spotlight_query = new WP_Query($args);

    // Loop through the posts
    if ($spotlight_query->have_posts()) :
        while ($spotlight_query->have_posts()) : $spotlight_query->the_post();
    ?>
        <article>
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="image featured"><?php the_post_thumbnail('full'); ?></a>
            <?php endif; ?>
            <header>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            </header>
            <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
            <footer>
                <a href="<?php the_permalink(); ?>" class="button alt icon solid fa-file-alt"><?php _e('Continue Reading', 'hellion-theme'); ?></a>
            </footer>
        </article>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        _e('No spotlight posts found', 'hellion-theme');
    endif;
    ?>
</section>
