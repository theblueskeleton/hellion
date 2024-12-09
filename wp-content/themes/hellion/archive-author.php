<?php
/**
 * The template for displaying author archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourTheme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header author-header">
            <?php
            // Display author information
            $author = get_queried_object();
            ?>
            <h1 class="author-title"><?php echo esc_html($author->display_name); ?></h1>
            <?php if (function_exists('get_avatar')) {
                echo get_avatar($author->ID, 96);
            } ?>
            <div class="author-bio">
                <p><?php echo wp_kses_post($author->description); ?></p>
            </div>
        </header><!-- .page-header -->

        <?php if ( have_posts() ) : ?>

            <div class="author-posts-archive">
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
            </div><!-- .author-posts-archive -->

        <?php else : ?>

            <p><?php _e( 'No posts found', 'textdomain' ); ?></p>

        <?php endif; ?>
    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
?>
