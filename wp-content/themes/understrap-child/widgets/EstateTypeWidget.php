<?php
class EstateTypeWidget extends WP_Widget {


    function __construct() {
        parent::__construct(
            'estate_type_widget',
            'Типы недвижимости',
            array( 'description' => 'Выводит список типов недвижимости.' )
        );
    }


    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        echo "<h2>Список типов недвижимости</h2>";

       $terms = get_terms('estate_type');

        if ( $terms && count($terms) > 0 ){

            foreach ($terms as $term){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo get_term_link($term->term_id) ?>"><?php echo $term->name ?></a>
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