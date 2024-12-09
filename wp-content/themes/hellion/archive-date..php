<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourTheme
 */

get_header();
?>

<main id="primary" class="site-main" style="background-color: white; color: black;">
    <div class="container">

    <!-- Post Search Box -->
    <div class="post-search">
    <?php get_search_form(); ?>
    </div>

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

            <?php
            // Get the current year and month
            $current_year = '';
            $current_month = '';

            /* Start the Loop */
            while ( have_posts() ) : the_post();

                $year  = get_the_date( 'Y' );
                $month = get_the_date( 'F' );

                // Check if the year has changed
                if ( $current_year !== $year ) {
                    if ( $current_year !== '' ) {
                        echo '</ul>';
                    }
                    $current_year = $year;
                    echo '<h2>' . $current_year . '</h2>';
                    echo '<ul>';
                }

                // Check if the month has changed
                if ( $current_month !== $month ) {
                    if ( $current_month !== '' ) {
                        echo '</ul>';
                    }
                    $current_month = $month;
                    echo '<h3>' . $current_month . '</h3>';
                    echo '<ul>';
                }
                ?>

                <li>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_post_thumbnail(); ?>
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->
                </li>

            <?php endwhile; ?>

            <?php echo '</ul>'; // Close the last ul ?>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/spotlight', 'none' ); ?>

        <?php endif; ?>
    </div>
</main><!-- #main -->

<?php get_footer(); ?>
