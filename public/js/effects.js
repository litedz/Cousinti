// $(document).ready(function () {
//     var show = 0;
//     //Navigation Bar

//     $(window).scroll(function () {
//         // var media_xs = window.matchMedia("(max-width: 750)");
//         //   if (media.matches) { }
//         if ($("html").scrollTop() > 300) {
//             $("#navigation-bar .topbar .container")
//                 .addClass("container-fluid")
//                 .removeClass("container");
//             $("#navigation-bar .topbar").css({
//                 background: "#168272",
//                 "box-shadow": " rgb(6 135 129 / 56%) 1px 9px 8px 0px",
//                 height: "auto",
//             });
//             $("#navigation-bar ").css({ "position": "fixed", 'top': '7.5%' });
//         } else {
//             $("#navigation-bar .topbar .container-fluid")
//                 .addClass("container")
//                 .removeClass("container-fluid");
//             $("#navigation-bar .navbar").css({
//                 position: "relative",
//                 background: "#168272",
//                 "box-shadow": " none",
//                 transition: "0.5s all",
//             });
//             $("#navigation-bar .topbar").css({
//                 "box-shadow": " none",
//                 height: "auto",
//             });
//             $("#navigation-bar ").css({ "position": "relative", 'top': '0' });
//             var media = window.matchMedia("(min-width: 992px)");
//             if (media.matches) {
//                 $(".navbar").css({
//                     position: "relative",
//                     background: "none",
//                     "box-shadow": " none",
//                     transition: "0.5s all",
//                 });
//             }
//         }
//     });
//     //   END navigation bar

//     $(window).on("load", function () {
//         $(".loading-page").fadeOut("slow");
//     });

//     $(window).scroll(function () {
//         if ($("html").scrollTop() > 140) {
//             $("#btn-back-to-top").fadeIn("slow");
//             $(".topbar .display-2")
//                 .addClass("text-white", "m-2")
//                 .css("font-size", "3rem");
//             $(".header .topbar .logo .img-logo img").fadeOut();
//         } else {
//             // var media = window.matchMedia("(min-width: 992px)");
//             // if (media.matches) { $('.navbar').css({ 'position': 'relative', 'background': 'none', 'box-shadow': ' none', 'transition': '0.5s all' }); }
//             $(".topbar").css({ background: "none", height: "100%" });
//             $("#btn-back-to-top").fadeOut("slow");
//             $(".topbar .display-2")
//                 .removeClass("text-white")
//                 .css("font-size", "5rem");
//             $(".header .topbar .logo .img-logo img").fadeIn();
//         }
//     });

//     //Random Recette

//     $("#btn_solution").click(function () {
//         $(".random_recipe").fadeIn();
//     });
//     $(".random_recipe .remove").click(function () {
//         $(".random_recipe").fadeOut();
//     });
// });

// function navbar_toggle(e) {
//     console.log(e);
//     var media = window.matchMedia("(max-width: 800px)");
//     if (media.matches) {
//         $(e).find("#sub-menus .sub-menu").fadeToggle();
//     } else {
//         if ($(e).find("#sub-menus .sub-menu").hasClass("show_bar")) {
//             $(e).find("#sub-menus .show_bar").removeClass("show_bar end-0");
//         } else {
//             $("#navigation-bar .topbar nav .navbar-nav")
//                 .find("div.active")
//                 .removeClass("active");
//             $("#navigation-bar .topbar nav .navbar-nav")
//                 .find("div.end-0")
//                 .removeClass("end-0");
//             $(e).toggleClass("active");
//             $(e).find("#sub-menus .sub-menu").toggleClass("end-0");
//             $("#navigation-bar .topbar nav .navbar-nav")
//                 .find("#sub-menus .sub-menu.show_bar")
//                 .removeClass("show_bar");
//             $(e).find("#sub-menus .sub-menu").toggleClass("show_bar");
//         }
//     }
// }
