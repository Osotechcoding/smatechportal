/* --------------------------------------------------------

Template Name: Edusquad Bootstrap 4 Education Template
Version: 1.0

-----------------------------------------------------------*/

/*filter button*/
$(document).ready(function() {

    $(".filter-button").on('click',function() {
        var value = $(this).attr('data-filter');

        if (value == "all") {
            $('.filter').show('4000');
        } else {
            $(".filter").not('.' + value).hide('4000');
            $('.filter').filter('.' + value).show('4000');

        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
    $(this).addClass("active");

});
