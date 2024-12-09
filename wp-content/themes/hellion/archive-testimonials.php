<?php
/**
 * The template for displaying testimonial archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourTheme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
        </header><!-- .page-header -->

        <?php if ( have_posts() ) : ?>

            <div class="testimonials-archive">
                <?php
                // Start the Loop
                while ( have_posts() ) : the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('medium');
                            }
                            ?>
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="entry-meta">
                                <span class="posted-on"><?php echo get_the_date(); ?></span>
                            </div><!-- .entry-meta -->
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->
                <?php
                endwhile;

                // Pagination
                the_posts_pagination();
                ?>
            </div><!-- .testimonials-archive -->

        <?php else : ?>

            <p><?php _e( 'No testimonials found', 'textdomain' ); ?></p>

        <?php endif; ?>
    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
?>
