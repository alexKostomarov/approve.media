<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$query =  new WP_Query( ['post_type' => 'estate', 'posts_per_page' => get_option('posts_per_page')] );



?>

<?php if ( is_front_page() && is_home() ) : ?>
    <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check and opens the primary div -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

            <main class="site-main" id="main">

                <div class="row">
                    <div class="col-md-12 border">
                        <h2>Объекты недвижимости</h2>
                        <?php if ( $query->have_posts() ) : ?>

                            <?php /* Start the Loop */?>

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                                    <header class="entry-header">

                                        <a href="<?php the_permalink(); ?>"><?php  the_title() ?></a>

                                    </header><!-- .entry-header -->

                                    <?php
                                    $fields = get_extended_fields($post->ID);

                                    foreach ($fields as $field) {?>
                                        <div class="offset-md-1 col-md-11">
                                            <?php echo $field ?>
                                        </div>

                                        <?php
                                    }?>


                                    <footer class="entry-footer">

                                        <?php understrap_entry_footer(); ?>

                                    </footer><!-- .entry-footer -->

                                </article><!-- #post-## -->

                            <?php endwhile; ?>

                        <?php else : ?>
                            <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                        <?php endif; ?>
                    </div>

                </div><!-- .row -->

            </main><!-- #main -->


            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
