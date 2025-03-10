function headerMenu() {
    let e = document.querySelector(".open-header-menu"),
        t = document.querySelector(".close-header-menu"),
        a = document.querySelector(".header-menu"),
        i = document.querySelector(".menu-overlay");
    function n() {
        a.classList.toggle("open"),
            i.classList.toggle("active"),
            document.body.classList.toggle("hidden-scrolling");
    }
    function l() {
        a
            .querySelector(".menu-item-has-children.active .sub-menu")
            .removeAttribute("style"),
            a
                .querySelector(".menu-item-has-children.active")
                .classList.remove("active");
    }
    e.addEventListener("click", n),
        t.addEventListener("click", n),
        i.addEventListener("click", n),
        a.addEventListener("click", (e) => {
            if (
                e.target.hasAttribute("data-bs-toggle") &&
                window.innerWidth <= 991
            ) {
                e.preventDefault();
                let t = e.target.parentElement;
                if (t.classList.contains("active")) l();
                else {
                    a.querySelector(".menu-item-has-children.active") && l(),
                        t.classList.add("active");
                    let i = t.querySelector(".sub-menu");
                    i.style.maxHeight = i.scrollHeight + "px";
                }
            }
        }),
        window.addEventListener("resize", function () {
            this.innerWidth > 991 &&
                (a.classList.contains("open") && n(),
                a.querySelector(".menu-item-has-children.active") && l());
        });
}
function testimonialSlider() {
    let e = document.getElementById("testimonialCarousel");
    e.addEventListener("slid.bs.carousel", function () {
        let e = this.querySelector(".active");
        (document.querySelector(".testi-img img").src =
            e.getAttribute("data-img")),
            (document.querySelector(
                ".testi-img .circle"
            ).style.backgroundColor = e.getAttribute("data-color"));
    });
}
function galleryModal() {
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("gallery-item")) {
            let t = e.target.getAttribute("src");
            document.querySelector(".modal-img").src = t;
            let a = new bootstrap.Modal(
                document.getElementById("galleryModal"),
                options
            );
            a.show();
        }
    });
}
function scheduleModal() {
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("schedule-item")) {
            let t = e.target.getAttribute("src");
            document.querySelector(".modal-img").src = t;
            let a = new bootstrap.Modal(
                document.getElementById("scheduleModal"),
                options
            );
            a.show();
        }
    });
}
window.addEventListener("load", () => {
    document.querySelector(".js-page-loader").classList.add("fade-out"),
        setTimeout(() => {
            document.querySelector(".js-page-loader").style.display = "none";
        }, 600);
}),
    $(document).on("click", "#send-it", function () {
        if ("" != document.getElementById("chat-input").value) {
            var e = $("#get-number").text(),
                t = document.getElementById("chat-input").value,
                a = "https://web.whatsapp.com/send";
            if (
                /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                    navigator.userAgent
                )
            )
                var a = "whatsapp://send";
            var i = a + "?phone=" + e + "&text=" + t;
            window.open(i, "_blank");
        }
    }),
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
    }),
    $(document).on("click", ".close-chat", function () {
        $("#whatsapp-chat").addClass("hide").removeClass("show");
    }),
    $(document).on("click", ".blantershow-chat", function () {
        $("#whatsapp-chat").addClass("show").removeClass("hide");
    }),
    $(document).ready(function () {
        $(".home-slider").owlCarousel({
            loop: !0,
            autoplay: !0,
            margin: 10,
            items: 1,
            animateOut: "fadeOut",
            animateIn: "fadeIn",
            touchDrag: !1,
            mouseDrag: !1,
            autoplayHoverPause: !1,
            responsive: {
                0: { items: 1, nav: !1 },
                600: { items: 1, nav: !1 },
                1e3: { items: 1, nav: !0 },
            },
        });
    }),
    headerMenu(),
    testimonialSlider(),
    galleryModal(),
    scheduleModal();
