<?php
/*
Plugin Name: Estate API
Description: Предоставляет эндпойнты и их обработку для API недвижимости.
Version:  1.0
Author: Alex
Author URI: http://w-online.ru
*/

require_once( plugin_dir_path( __FILE__ ) . 'class.estate-rest-api.php');

add_action( 'rest_api_init', ['EstateRestApi', 'init'] );

require_once (  plugin_dir_path( __FILE__ ) . '/includes/FormWidget.php');

add_action( 'widgets_init', function(){
    register_widget( 'FormWidget' );
} );
add_action( 'wp_enqueue_scripts', function (){

    wp_register_script( 'cities', plugins_url( '/js/cities.js', __FILE__ ), array( 'jquery' ) );

    wp_enqueue_script( 'cities' );

    wp_register_script( 'get-estate-types', plugins_url( '/js/get-estate-types.js', __FILE__ ), array( 'jquery' ) );

    wp_enqueue_script( 'get-estate-types' );

    wp_register_script( 'add-post', plugins_url( '/js/add-post.js', __FILE__ ), array( 'jquery' ) );

    wp_enqueue_script( 'add-post' );
});

?>


