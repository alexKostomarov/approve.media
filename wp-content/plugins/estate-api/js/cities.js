jQuery("document").ready(function () {

    const getCities = () =>{
        const res = jQuery.getJSON( "/wp-json/estate_api/v1/cities");

        res.then( json =>{

                const options = json.reduce( (inc, item) => {
                    inc += "<option value=" + item.id + ">"+ item.post_title +"</option>";
                    return inc;
                },"");
            jQuery("#city").empty().append(options);
        })
    }

    const addCity = () => {

        const name = jQuery("#add-city").val();

        if (name.trim() === "") return false;

        const promise = jQuery.post( "wp-json/estate_api/v1/cities", {title:name },"json");

        promise.then( json =>{

            if(json.result) {

                getCities();
            }
            else  jQuery("#form-error").text(json.error);
        });
        promise.fail(resp =>{
            jQuery("#form-error").text(resp.responseJSON.message);
        });
    };

    getCities();

    jQuery("#add-city-button").click(addCity);

})
