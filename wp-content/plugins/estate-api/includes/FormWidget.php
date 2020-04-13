<?php
class FormWidget extends WP_Widget {


    function __construct() {
        parent::__construct(
            'form_estate_widget',
            'Форма добавления недвижимости',
            array( 'description' => 'Выводит форму добавления недвижимости.' )
        );
    }


    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        echo "<h2>Разместить объявление</h2>";

        ?>
        <div class="alert-warning" id="form-error"></div>
        <form name="estate-form">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="title-input">Заголовок</label>
                    <div class="">
                        <input class="form-control" type="text" value="" id="title-input" name="title">
                    </div>
                </div>
                <div class="form-group  col-md-3">
                    <label for="estate-type">Тип недвижимости</label>
                    <select class="form-control" id="estate-type" name="estate_type"></select>
                </div>
                <div class="form-group  col-md-3">
                    <label for="city">Город</label>
                    <select class="form-control" id="city" name="city"></select>
                </div>
                <div class="form-group  col-md-3">
                    <label for="add-city">Если города нет в списке</label>
                    <div class="row">
                        <input class="form-control col-6" type="text" value="" id="add-city">
                        <button type="button" class="btn btn-primary offset-1 col-5" id="add-city-button">Добавить город</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="price" class="col-form-label">Цена</label>
                    <div class="">
                        <input class="form-control" type="text" value="" id="price" name="price">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="area" class="col-form-label">Площадь</label>
                    <div class="">
                        <input class="form-control" type="text" value="" id="area" name="area">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="living-area" class="col-form-label">Жилая площадь</label>
                    <div class="">
                        <input class="form-control" type="text" value="" id="living-area" name="living_area">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="floor" class="col-form-label">Этаж</label>
                    <div class="">
                        <input class="form-control" type="text" value="" id="floor" name="floor">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group  col-md-4">
                    <label for="description">Описание</label>
                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="address" class="col-form-label">Адрес</label>
                    <textarea  class="form-control" type="text"  rows="5" id="address" name="address"></textarea>
                </div>
                <div class="col-md-4">

                    <button type="button" class="btn btn-primary offset-1 col-5 mt-5 " id="publish-button">Опубликовать</button>
                </div>

            </div>

        </form>



        <?php

        echo $args['after_widget'];
    }

}
?>