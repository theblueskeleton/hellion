<?php
/**
 * The template for displaying all single testimonial posts
 *
 */

get_header();
?>

<main id="primary" class="site-main"  style="background-color: white; color: black;">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_post_thumbnail('large'); ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <div class="testimonial-meta">
                        <p><strong><?php echo get_post_meta( get_the_ID(), 'client-name', true ); ?></strong></p>
                        <p><?php echo get_post_meta( get_the_ID(), 'client-position', true ); ?></p>
                        <p><?php echo get_post_meta( get_the_ID(), 'client-company', true ); ?></p>
                    </div>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
?>
