<?php
/**
 * The template for displaying all single review posts
 *
 * @package YourTheme
 */

get_header();
?>

<main id="primary" class="site-main" style="background-color: white; color: black;">
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
                    <div class="review-rating">
                        <?php
                        $rating = get_post_meta( get_the_ID(), '_reviews_rating_key', true );
                        if ( $rating ) {
                            echo '<p>Rating: ' . esc_html( $rating ) . ' Stars</p>';
                        }
                        ?>
                    </div>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <div class="entry-meta">
                        <span class="posted-on"><?php echo get_the_date(); ?></span>
                        <span class="byline"><?php echo get_the_author(); ?></span>
                    </div><!-- .entry-meta -->
                </footer><!-- .entry-footer -->

                <?php
                // If comments are open or there are comments, load the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </article><!-- #post-<?php the_ID(); ?> -->

            <nav class="post-navigation">
                <div class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></div>
            </nav><!-- .post-navigation -->

        <?php endwhile; // End of the loop. ?>
    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
?>
