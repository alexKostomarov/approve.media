<?php

add_action('init', function(){

    add_rewrite_tag('%city_id%','(\d+)'); // Регистрируем параметр city

});

require get_stylesheet_directory() . '/widgets/CitiesWidget.php';

add_action( 'widgets_init', function(){
    register_widget( 'CitiesWidget' );
} );

require get_stylesheet_directory() . '/widgets/EstateTypeWidget.php';

add_action( 'widgets_init', function(){
    register_widget( 'EstateTypeWidget' );
} );


if ( ! function_exists( 'get_extended_fields' ) ) {

    function get_extended_fields( $post_id, $includes = ['estate_type', 'city', 'price', 'area', 'living_area', 'floor'  ] )
    {
        $fields =[];//Массив дополнительныз полей

        foreach ($includes as $name ){

            $field = get_field_object($name);//$field['value'] может быть string|Post

            if(!$field) continue;

            $str = $field['label'] . ': ';

            $obj = $field['value'];


            if(is_string($obj)) $str .= $obj;

            elseif(is_object($obj) && get_class($obj) === 'WP_Post'){
                $str .= '<a href="'.$obj->guid.'">'.$obj->post_title.'</a>';
            }
            elseif(is_object($obj) && get_class($obj) === 'WP_Term'){
                $str .= ' <a href="' .get_term_link($obj->term_id) .'">' .$obj->name .'</a>';
            }

            if(isset($field['append'])) $str .= $field['append'];

            $fields[] = $str;
        }

        return $fields;
    }

}

?>
