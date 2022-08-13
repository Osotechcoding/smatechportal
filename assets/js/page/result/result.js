/* --------------------------------------------------------

Template Name: Edusquad Bootstrap 4 Education Template
Version: 1.0

-----------------------------------------------------------*/

/*result showcase slider*/
$('.autoplay').not('.slick-initialized').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [{
        breakpoint: 992,
        settings: {
            arrows: false,
            centerMode: false,
            centerPadding: '40px',
            slidesToShow: 2
        }
    },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 600,
            settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: false,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});

