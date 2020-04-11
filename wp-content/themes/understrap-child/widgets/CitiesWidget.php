<?php
class CitiesWidget extends WP_Widget {


    function __construct() {
        parent::__construct(
            'cities_widget',
            'Города с недвижимостью',
            array( 'description' => 'Выводит список городов с недвижимостью.' )
        );
    }


    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        echo "<h2>Список городов</h2>";

        $query =  new WP_Query( ['post_type' => 'cities', 'posts_per_page' => 15] );

        if ( $query->have_posts() ){

            while ( $query->have_posts() ){

                $query->the_post();

                ?>
                <div class="row">
                    <div class="col-md-12">
                        <a href="/city/?city_id=<?php the_ID() ?>"><?php  the_title() ?></a>
                    </div>

                </div>

                <?php

            }
        }

        wp_reset_postdata();

        echo $args['after_widget'];
    }

}
?>