<?php
get_header();


/*
 * дополнительные полей поста
 */
$fields =get_extended_fields(get_the_ID());//Массив дополнительныз полей

?>
<div class="container">
    <h2 class="text-md-center"><?php the_title();?></h2>


    <div class="row">
        <?php foreach( $fields as $field) { ?>
            <div class="offset-md-1 col-md-11">
                <?php echo $field ?>
            </div>
            <?php
        }?>
    </div>
    <div class="row mt-md-1 mb-md-1">
        <div class="offset-md-1 col-md-10"><?php echo $post->post_content ?></div>

    </div>

</div>


