/* ----------------------------
      whatsapp
  ------------------------------- */
$(window).on("scroll", function () {
    // header on scroll
    function fixedHeader() {
        var headerTopBar = $(".top-bar").outerHeight();
        var headerELement = $(".header .site-navigation");

        if ($(window).scrollTop() > headerTopBar) {
            $(headerELement).addClass("navbar-fixed");
            $(".header").css("margin-bottom", headerELement.outerHeight());
        } else {
            $(headerELement).removeClass("navbar-fixed");
            $(".header").css("margin-bottom", 0);
        }
    }
    fixedHeader();
});

$(document).ready(function () {
    function whatsapp() {
        $(document).on("click", "#send-it", function () {
            var a = document.getElementById("chat-input");
            if ("" != a.value) {
                var b = $("#get-number").text(),
                    c = document.getElementById("chat-input").value,
                    d = "https://web.whatsapp.com/send",
                    e = b,
                    f = "&text=" + c;
                if (
                    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                        navigator.userAgent
                    )
                )
                    var d = "whatsapp://send";
                var g = d + "?phone=" + e + f;
                window.open(g, "_blank");
            }
        });
        $(document).on("click", ".informasi", function () {
            (document.getElementById("get-number").innerHTML = $(this)
                .children(".my-number")
                .text()),
                $(".start-chat,.get-new").addClass("show").removeClass("hide"),
                $(".home-chat,.head-home").addClass("hide").removeClass("show"),
                (document.getElementById("get-nama").innerHTML = $(this)
                    .children(".info-chat")
                    .children(".chat-nama")
                    .text()),
                (document.getElementById("get-label").innerHTML = $(this)
                    .children(".info-chat")
                    .children(".chat-label")
                    .text());
        });
        $(document).on("click", ".close-chat", function () {
            $("#whatsapp-chat").addClass("hide").removeClass("show");
        });
        $(document).on("click", ".blantershow-chat", function () {
            $("#whatsapp-chat").addClass("show").removeClass("hide");
        });
    }
    whatsapp();

    // navbarDropdown
    function navbarDropdown() {
        if ($(window).width() < 992) {
            $(".site-navigation .dropdown-toggle").on("click", function () {
                $(this).siblings(".dropdown-menu").animate(
                    {
                        height: "toggle",
                    },
                    300
                );
            });

            var navbarHeight = $(".site-navigation").outerHeight();
            $(".site-navigation .navbar-collapse").css(
                "max-height",
                "calc(100vh - " + navbarHeight + "px)"
            );
        }
    }
    navbarDropdown();

    // banner-carousel
    function bannerCarousel() {
        $(".banner-carousel").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            dots: true,
            speed: 600,
            arrows: true,
            prevArrow:
                '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
            nextArrow:
                '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>',
        });
        $(".banner-carousel.banner-carousel").slickAnimation();
    }
    bannerCarousel();

    // pageSlider
    function pageSlider() {
        $(".page-slider").slick({
            fade: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            dots: false,
            speed: 600,
            arrows: true,
            prevArrow:
                '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
            nextArrow:
                '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>',
        });
    }
    pageSlider();

    // Shuffle js filter and masonry
    function programShuffle() {
        if ($(".shuffle-wrapper").length !== 0) {
            var Shuffle = window.Shuffle;
            var myShuffle = new Shuffle(
                document.querySelector(".shuffle-wrapper"),
                {
                    itemSelector: ".shuffle-item",
                    sizer: ".shuffle-sizer",
                    buffer: 1,
                }
            );
            $('input[name="shuffle-filter"]').on("change", function (evt) {
                var input = evt.currentTarget;
                if (input.checked) {
                    myShuffle.filter(input.value);
                }
            });
            $(".shuffle-btn-group label").on("click", function () {
                $(".shuffle-btn-group label").removeClass("active");
                $(this).addClass("active");
            });
        }
    }
    programShuffle();

    // testimonial carousel
    function testimonialCarousel() {
        $(".testimonial-slide").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            speed: 600,
            arrows: false,
        });
    }
    testimonialCarousel();

    // testimonial carousel
    function clientCarousel() {
        $(".client-slide").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            speed: 600,
            arrows: false,
            fade: true,
            cssEase: "linear",
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }
    clientCarousel();

    // media popup
    function mediaPopup() {
        $(".gallery-popup").colorbox({
            rel: "gallery-popup",
            transition: "slideshow",
            innerHeight: "500",
        });
        $(".popup").colorbox({
            iframe: true,
            innerWidth: 600,
            innerHeight: 400,
        });
    }
    mediaPopup();
});

$(document).ready(function () {
    // start sidebar
    $(".sidebar-dropdown-menu").slideUp("fast");
    $(
        ".sidebar-menu-item.has-dropdown > a, .sidebar-dropdown-menu-item.has-dropdown > a"
    ).click(function (e) {
        e.preventDefault();

        if (!$(this).parent().hasClass("focused")) {
            $(this)
                .parent()
                .parent()
                .find(".sidebar-dropdown-menu")
                .slideUp("fast");
            $(this)
                .parent()
                .parent()
                .find(".has-dropdown")
                .removeClass("focused");
        }
        $(this).next().slideToggle("fast");
        $(this).parent().toggleClass("focused");
    });

    $(".sidebar-toggle").click(function () {
        $(".sidebar").toggleClass("collapsed");
        $(".sidebar.collapsed").mouseleave(function () {
            $(".sidebar-dropdown-menu").slideUp("fast");
            $(
                ".sidebar-menu-item.has-dropdown, .sidebar-dropdown-menu-item.has-dropdown"
            ).removeClass("focused");
        });
    });

    $(".sidebar-overlay").click(function () {
        $(".sidebar").addClass("collapsed");
        $(".sidebar-dropdown-menu").slideUp("fast");
        $(
            ".sidebar-menu-item.has-dropdown, .sidebar-dropdown-menu-item.has-dropdown"
        ).removeClass("focused");
    });

    if (window.innerWidth < 768) {
        $(".sidebar").addClass("collapsed");
    }
    // end sidebar
});
