jQuery("document").ready(function () {

    const res = jQuery.getJSON( "/wp-json/estate_api/v1/estate_types");

    res.then( json =>{

        const options = json.reduce( (opts, item) => {
            opts += "<option value=" + item.term_id + ">"+ item.name +"</option>";
            return opts;
        }, "");

        jQuery("#estate-type").append(options);

    })
})
