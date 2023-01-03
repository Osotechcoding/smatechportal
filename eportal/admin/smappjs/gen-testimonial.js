$(document).ready(function(){
    //when generate testimonial btn is clicked
    $("#StudentTestimonialForm").on("submit", function(e){
        e.preventDefault();
        const GENERATE_TESTIMONIAL = $(this).serialize();
        $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
          //send request
        $.post("../actions/actions", GENERATE_TESTIMONIAL, function (result) {
            setTimeout(() => {
                $(".__loadingBtn__").html('GENERATE TESTIMONIAL').attr("disabled", false);
                $("#server-response").html(result);
            }, 1500);
        });
    });
});