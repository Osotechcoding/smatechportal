/* --------------------------------------------------------

Template Name: Edusquad Bootstrap 4 Education Template
Version: 1.0

-----------------------------------------------------------*/

/*pre loader*/
$(window).on('load', function() {
    $('.preloader').fadeOut();
});

/*animation on scroll*/
$(document).ready(function() {
    AOS.init({
        duration: 1200,
    });
});

/*sticky menu*/
$(document).on("scroll", function() {
    if ($(document).scrollTop() > 86) {
        $("#header").addClass("sticky");
    } else {
        $("#header").removeClass("sticky");
    }
});

/*side menu*/
function openNav() {
    $('#mySidenav').css({'width':'250px'});
    $('body').css({'background-color':'rgba(0,0,0,0.4)'});
}

function closeNav() {
    $('#mySidenav').css({'width':'0'});
    $('body').css({'background-color':'white'});
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

/*top scroll*/
$(document).ready(function() {
    $('#scroll').hide();
    $(window).on('scroll',function() {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').on('click',function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1200);
        return false;
    });
});

/*marquee*/
var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
        delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};





