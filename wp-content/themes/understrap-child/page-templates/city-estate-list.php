<?php
/**
 * Template Name: Cities Estate List Template
 *
 * Template for displaying a list of estate in the city.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $wp_query;



$query =  new WP_Query( [
    'post_type' => 'estate',
    'posts_per_page' => 10,
    'meta_query' =>[
            'relation' => 'AND',
            [
                'key'   => 'city',
                'value' => $wp_query->query_vars['city_id']
            ]
    ]
]);
get_header();

?>

<body>


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
            <!-- The pagination component -->



            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #index-wrapper -->


	<?php wp_footer(); ?>
</body>

