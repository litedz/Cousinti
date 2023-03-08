<template>
    <div class="wrapper" dir="rtl">
        <section class="header d-grid gap-5">
            <div class="bg-first-color pb-1 pt-1 top-bar">
                <div class="container">
                    <div class="align-items-center d-flex justify-content-around">
                        <div class="search">
                            <div class="align-items-center d-flex gap-2 search-form">
                                <li class="fa fa-search" style="color: hsl(60deg 0% 100%);"></li>
                                <input type="text" id="search" class="border-0 form-control form-control-sm"
                                    style="border: none;" placeholder="البحث عن وصفة">
                            </div>
                        </div>
                        <div class="contact d-flex fs-4 gap-1 h-100">
                            <i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb;"></i>
                            <i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb;"></i>
                            <i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb; "></i>
                            <i class="fa fa-apple-whole fs-5 rounded-circle" style="color: #e5e7eb;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo text-center">

                <div class="title" style="font-size: 5rem;">كوزينتي</div><span class="first-color fw-bold slogan"
                    style="letter-spacing: 1px;">اشعل شغفك بالطعام معنا كل يوم</span>

            </div>
            <div class="nav-bar-home">
                <nav-bar></nav-bar>
            </div>
        </section>
    </div>
</template>

<script>
import Typewriter from "typewriter-effect/dist/core";
export default {
    inject: ["w_path"],
    mounted() {
        this.availableTypes();
        this.autoType();
        window.addEventListener("scroll", this.wheneScroll);
    },
    unmounted() {
        window.removeEventListener("scroll", this.wheneScroll);
    },
    data() {
        return {
            types_recipe: "",
            effectImg: false,
            imgBestRecipe: false,
            show: "",
            activeComponent: "",
            showSubmenu: "",
        };
    },
    methods: {
        backTop() {
            document.documentElement.scrollTop = 0;
        },
        availableTypes() {
            axios({ method: "get", url: "types_recipe" })
                .then((response) => {
                    if (response.data) {
                        this.types_recipe = response.data;
                    }
                })
                .catch((error) => { });
        },
        autoType() {
            new Typewriter("#name-regione", {
                strings: ["ماعرفتيش واش طيبي <br> !!!  ", "عدنا الحل"],
                autoStart: true,
                loop: true,
            });
        },
        EffectCategorie() {
            this.effectImg = !this.effectImg;
            if (this.effectImg) {
                $("#" + event.target.id)
                    .find("img")
                    .css({ transform: "scale(1.1)" });
                $("#" + event.target.id)
                    .find(".squar")
                    .css({ height: "100%" });
            } else {
                $("#" + event.target.id)
                    .find(".squar")
                    .css({ height: "10%" });
                $("#" + event.target.id)
                    .find("img")
                    .css({ transform: "scale(1)" });
            }
        },
        EffectBestRecipe() {
            this.imgBestRecipe = !this.imgBestRecipe;
            if (this.imgBestRecipe) {
                $(event.target).find(".opc").css("opacity", "0.7");
                $(event.target).find(".icon").css("opacity", "1");
            } else {
                $(event.target).find(".opc").css("opacity", "0");
                $(event.target).find(".icon").css("opacity", "0");
            }
        },
        scrollSlider(action, name_slider) {
            var show = document.getElementById(name_slider);
            let right = parseInt(show.style.right);
            let widthSlider = show.offsetWidth;
            if (action === "right") {
                if (right < widthSlider - 300) {
                    show.style.right = right + 300 + "px";
                } else {
                    show.style.right = "0px";
                }
            } else {
                if (right > 0) {
                    show.style.right = right - 300 + "px";
                }
            }
        },
        wheneScroll() {
            if ($(window).scrollTop() > 200) {
                $("#btn-back-to-top").fadeIn();
                $("#home-navbar").fadeIn("slow");
            } else {
                $("#btn-back-to-top").fadeOut();
                $("#home-navbar").fadeOut("fast");
            }
        },
        hoverLink(action) {
            if (action == "leave") {
                $("#" + event.target.getAttribute("data-menu")).fadeOut();
                $(".sub-menu").fadeOut();
            } else {
                $(".index-nav li a").removeClass("link-nav");
                $(event.target).addClass("link-nav");
                if ($(event.target).hasClass(".link-nav") == false) {
                    $(".sub-menu").fadeOut();
                }
                $("#" + event.target.getAttribute("data-menu")).fadeIn();
            }
        },
        toggleNav() {
            $(".nav").fadeToggle();
        },
        testEmit() {
            alert("emit send");
        },
    },
};
</script>

<style></style>