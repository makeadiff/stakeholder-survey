function init() {


    $("#city_id").change(function() {
        if(this.value != "0") {

            var city_id = $("#city_id").val();

            //alert("True");

            $.ajax("get_names_list_city.php?city_id="+city_id, {
                "success": function(data) {
                    $("#people_list").html(data);
                },
                error: function() {
                    alert("System Error: Can't get names. Please try later");
                }


            });

        }

    });


}
$(init);