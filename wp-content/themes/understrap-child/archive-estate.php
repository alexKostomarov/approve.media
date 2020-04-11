<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

                        <header class="page-header">
                            <h2 class="page-title">Недвижимость</h2>
                        </header><!-- .page-header -->

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                            <header class="entry-header">

                                <a href="/city/?city_id=<?php the_ID() ?>"><?php  the_title() ?></a>

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

  					<?php endwhile ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
