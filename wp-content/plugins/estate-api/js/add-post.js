jQuery("document").ready( () => {

    const sendPost = () => {
        const params = jQuery("form[name=estate-form]").serializeArray().reduce( (result, item) =>{
              return {... result, [item.name]:item.value}
        },{});

        const promise = jQuery.ajax({
            method:"POST",
            url:"/wp-json/estate_api/v1/estate",
            contentType:"application/json",
            processData:false,
            data:JSON.stringify(params),
            dataType:"json"
        });
        promise.then(json =>{
            if(json.result){
                jQuery("#form-error").text("Добавлен пост №" + json.ID + ". Перезагрузите страницу, чтобы его увидеть.");
                formReset();
            }
            else jQuery("#form-error").text(json.error);
        })
        promise.fail(resp =>{
            jQuery("#form-error").text(resp.responseJSON.message);
        });
    }

    const formReset = () =>{
        jQuery("form[name=estate-form] :input").val("");
    }

    jQuery("#publish-button").click(sendPost);

});