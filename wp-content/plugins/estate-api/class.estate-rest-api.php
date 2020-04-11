<?php

class EstateRestApi{

    /**
     *Регистрирует маршруты для  API
     * estate_api/v1 - namespace
     * GET cities - получение списка городов
     * POST cities - создание города
     * GET estate_types - получение списка типов недвижимости
     * POST estate - создание поста типа estate
     */
    public static function init(){

        register_rest_route("estate_api/v1", "cities",[
            [
                'methods' => WP_REST_Server::READABLE,
				'callback' => ['EstateRestApi', 'getCitiesList' ],
            ],
            [
                'methods' => WP_REST_Server::CREATABLE,
                //'permission_callback' => function () {
                //    return is_user_logged_in();
               // },
                'callback' => ['EstateRestApi', 'createCity' ],

            ],

        ]);

        register_rest_route("estate_api/v1", "estate_types",[
            [
                'methods' => WP_REST_Server::READABLE,
                'callback' => ['EstateRestApi', 'getEstateTypes' ],
            ]

        ]);

        register_rest_route("estate_api/v1", "estate",[
            [
                'methods' => WP_REST_Server::CREATABLE,
                //'permission_callback' => function () {
                //    return is_user_logged_in();
                //},
                'callback' => ['EstateRestApi', 'createEstate' ],
            ]

        ]);
    }



    /**
     * возвращает списое городов
     * @return mixed|WP_REST_Response
     */
    public static function getCitiesList(){

        $query =  new WP_Query( ['post_type' => 'cities', 'posts_per_page' => -1] );

        if( !$query->have_posts()) return rest_ensure_response([]);

        $posts = $query->get_posts();

        $ret = [];

        foreach( $posts as $p) $ret[] = ['id' => $p->ID, 'post_title' => $p->post_title];

        return rest_ensure_response($ret);
    }

    /**
     * Возвращает список типов недвижимости
     * @return mixed|WP_REST_Response
     */
    public static function getEstateTypes(){

        $terms = get_terms('estate_type');

        if ( !$terms || count($terms) === 0 ) return rest_ensure_response([]);

        $ret = [];

        foreach( $terms as $term) $ret[] = ['term_id' => $term->term_id, 'name' => $term->name];

        return rest_ensure_response($ret);
    }


    /**
     * Создает запсиь с городом
     * @param WP_REST_Request $request - должен содержать массив data
     * @return mixed|WP_REST_Response
     */
    public static function createCity(WP_REST_Request $request){

        if(!is_user_logged_in()) return rest_ensure_response([
            'result' => false,
            'error' => 'Нужна аутентификация.'
        ]);

        $params = $request->get_body_params();

        if(!isset($params['title'])) return rest_ensure_response(['result' => false, 'error' => 'Должно быть указано название города ']);

        $res = wp_insert_post([
            'ID' => 0,
            'post_type' => 'cities',
            'post_status' => 'Publish',
            'post_title' => $params['title']
        ]);

        if($res) return rest_ensure_response(['result' => true, 'ID' => $res]);

        return rest_ensure_response(['result' => false, 'error' => 'Ошибка добавления поста']);
    }


    /**
     * Создает запись с объектом недвижимости
     * @param WP_REST_Request $request - должен содержать массив data
     * @return mixed|WP_REST_Response
     */
    public static function createEstate(WP_REST_Request $request){

        if(!is_user_logged_in()) return rest_ensure_response([
            'result' => false,
            'error' => 'Нужна аутентификация.'
        ]);

        $params = $request->get_json_params();

        if(!isset($params['title']) || trim($params['title']) === '') return rest_ensure_response(['result' => false, 'error' => 'Не указан заголовок']);

        if(!isset($params['price']) || trim($params['price']) === '') return rest_ensure_response(['result' => false, 'error' => 'Не указана цена']);

        if(!isset($params['area']) || trim($params['area']) === '') return rest_ensure_response(['result' => false, 'error' => 'Не указана площадь']);

        if(!isset($params['address']) || trim($params['address']) === '') return rest_ensure_response(['result' => false, 'error' => 'Не указан адрес']);

        if(!isset($params['city'])  || trim($params['city']) === '') return rest_ensure_response(['result' => false, 'error' => 'Не указан город']);

        if(!isset($params['estate_type'])  || trim($params['estate_type']) === '') return rest_ensure_response(['result' => false, 'error' => 'Не указан тип недвижимости']);

        $meta = [
            'price' =>  $params['price'],
            'area' =>  $params['area'],
            'address' =>  $params['address'],
            'city' =>  $params['city'],
            'estate_type' =>  $params['estate_type']
        ];

        if(isset($params['living_area'])) $meta[] = $params['living_area'];
        if(isset($params['floor'])) $meta[] = $params['floor'];

        $res = wp_insert_post([
            'ID' => 0,
            'post_type' => 'estate',
            'post_status' => 'Publish',
            'post_title' => $params['title'],
            'post_content' => isset($params['description']) ? $params['description'] : "",
            //'meta_input' => $meta,
            'tax_input' => [

            ]
        ]);


        if(!$res) return rest_ensure_response(['result' => false, 'error' => 'Ошибка добавления поста']);

        foreach($meta as $selector => $value) update_field($selector, $value,  $res);

        return rest_ensure_response(['result' => true, 'ID' => $res]);
    }
}

?>