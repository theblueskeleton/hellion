<section class="box article-list">
    <h2 class="icon fa-file-alt"><?php _e('Recent Posts', 'hellion-theme'); ?></h2>

    <?php
    // Define the WP_Query to fetch recent posts
    $args = array(
        'posts_per_page' => 4 // Adjust the number of posts as needed
    );
    $recent_posts_query = new WP_Query($args);

    // Loop through the posts
    if ($recent_posts_query->have_posts()) :
        while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post();
    ?>
        <article class="box excerpt">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="image left"><?php the_post_thumbnail('full'); ?></a>
            <?php endif; ?>
            <div>
                <header>
                    <span class="date"><?php the_time('F j'); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </header>
                <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
            </div>
        </article>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        _e('No recent posts found', 'hellion-theme');
    endif;
    ?>
</section>
