<template>
  <div id="navigation-bar"
       class="navigation-bar position-relative z-9999">
    <loading-page></loading-page>
    <!-- v-if="this.$attrs.show_navbar == true" -->
    <div class="top-bar w-100 d-flex"
         id="navSlide">

      <div class="align-items-center d-flex flex-row-reverse search w-25 px-2">
        <search></search>
        <div class="form d-flex font-amiri">
          <a href="/login"
             class="bg-white border btn fw-bold mx-1 text-decoration-none text-dark px-4">دخول</a>
          <a href="/register"
             class="bg-white border btn fw-bold mx-1 text-decoration-none text-dark px-4">تسجيل</a>
        </div>
      </div>
      <div class="logo start-0 w-50 text-center">
        <img :src="w_path + '/images/logo2.png'"
             style="height: auto;width: 80px;"
             alt="">
      </div>
      <div class="toggleBar end-0 w-25 text-right">
        <li class=" fa fa-bars-staggered fs-3 h-100 p-2  px-3 rounded text-white pointer"
            @click="SlideRightBar()"></li>
      </div>



      <!-- <nav class="end-0 navbar navbar-expand-lg navbar-light position-relative w-100 justify-content-end"
           style="z-index: 9998;">
        <button class="navbar-toggler m-3"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="fa fa-bars text-white"></span>
        </button>
        <div class="collapse navbar-collapse text-center "
             id="navbarNav">
          <div class="container">
            <ul class="navbar-nav justify-content-center"
                dir="rtl">
              <li class="nav-item">
                <a class="nav-link font-amiri fs-5 fw-normal m-2 mx-3 text-decoration-none text-white"
                   href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-amiri fs-5 fw-normal m-2 mx-3 text-decoration-none text-white"
                   href="/sweat">حلويات</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> -->
    </div>

    <div class="Right-navbar rounded border-top d-flex flex-column">
      <div class="border-bottom close-nav p-2 text-right w-100">
        <li class="bg-light fa fa-remove p-1 px-2 rounded-circle text-muted pointer"
            @click="SlideRightBar()"></li>
      </div>
      <div id="item1"
           class="item font-amiri p-2 start-0 text-center  w-100 border-bottom position-relative">
        <div class="d-flex justify-content-center align-items-center">
          <li class="fa fa-slide fa-chevron-left text-dark w-25"></li>
          <a class="fs-5 fw-bold link-right-bar text-decoration-none text-white title w-50"
             data-toggle="item1"
             href="#"
             @click="slideSubMenu()">حلويات</a>
          <li class="fa fa-home fs-5 text-dark mx-3"></li>
        </div>
        <div class="bg-light p-2 position-absolute rounded-start sub-menu w-100 z-8888"
             style="display: none;">
          <li class="border-bottom p-2"><a href="#"
               class="text-decoration-none text-info fs-6 ">azezaeazeazeaz</a></li>
        </div>
      </div>
      <div id="item2"
           class="item font-amiri p-2 start-0 text-center  w-100 border-bottom position-relative">
        <div class="d-flex justify-content-center align-items-center">
          <li class="fa fa-slide fa-chevron-left text-dark w-25"></li>
          <a class="fs-5 fw-bold link-right-bar text-decoration-none text-white title w-50"
             data-toggle="item2"
             href="#"
             @click="slideSubMenu()">home</a>
          <li class="fa fa-home fs-5 text-dark mx-3"></li>
        </div>
        <div class="bg-light p-2 position-absolute rounded-start sub-menu w-100 z-8888"
             style="display: none;">
          <li class="border-bottom p-2"><a href="#"
               class="text-decoration-none text-info fs-6 ">xxxxxxxxxx</a></li>
        </div>
      </div>

    </div>
  </div>
</template>

<script>

export default {

  mounted() {
    window.addEventListener("scroll", this.wheneScroll);
  },
  unmounted() {
    window.removeEventListener("scroll", this.wheneScroll);
  },
  inject: ["w_path"],
  data() {
    return {
      show: '',
      rightBarShow: false,
    };
  },
  methods: {
    toggleNav() {
      $("#" + event.target.getAttribute("data-target")).toggleClass('test');
      $("#" + event.target.getAttribute("data-target")).slideToggle();
    },

    SlideRightBar() {
      this.rightBarShow = !this.rightBarShow;
      $('.Right-navbar').css('right', '0');
      if (this.rightBarShow) {
        $('.Right-navbar').css('right', '0');
      } else {
        $('.Right-navbar').css('right', '-100%');
      }


    },
    slideSubMenu() {
      $('#' + event.target.getAttribute('data-toggle')).find('.sub-menu').fadeToggle();
      $('#' + event.target.getAttribute('data-toggle')).find('.fa-slide').toggleClass('fa-chevron-left fa-chevron-down');
    },
    wheneScroll() {
      if ($(window).scrollTop() > 300) {
        $(".top-bar").css({
          position: "fixed",
          // top: "auto",
        });
      } else {
        $(".top-bar").css({
          position: "relative",
          top: "0",
        });
      }
    },
    toggleSubMenu() {
      // $("a.active").removeClass("active");
      // $("#navigation-bar #sub-menus").fadeOut();
      // $(event.target).toggleClass("active");
      // $(event.target).find("#sub-menus").fadeIn();
      // $("#navigation-bar").mouseleave(function () {
      //   $("#navigation-bar #sub-menus").fadeOut();
      //   $("#navigation-bar").find("a.active").removeClass("active");
      // });
    },
  },
};
</script>
<style scoped>
#navigation-bar .top-bar {
  z-index: 9998;
  position: relative;
  top: 34%;
  background: #229191;
  height: 50px;

}

#navigation-bar .top-bar .logo {
  width: 80px;
  height: 80px;
}

#navigation-bar .Right-navbar {
  width: 15%;
  right: -100%;
  bottom: 0;
  position: fixed;
  height: 95%;
  background: linear-gradient(0deg, #00ffb8ba, #229191 55%);
  z-index: 9999;
  transition: right 1s;
}

#navigation-bar .Right-navbar .sub-menu {
  top: 0;
  right: 100%;
}





/* #navigation-bar .toggleBar{
  display: none;
} */

nav.navbar {
  background: hsl(170, 81%, 29%);

}



@media only screen and (max-width: 768px) {

  #navigation-bar .Right-navbar {
    width: 50%;
  }




}

@media only screen and (min-width: 768px) and (max-width:992px) {
  nav.navbar {
    background: hsl(170, 81%, 29%);
  }
}

@media only screen and (min-width: 992px) {
  nav.navbar {
    background: hsl(170, 81%, 29%);
  }
}
</style>
