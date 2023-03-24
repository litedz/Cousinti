<template>
  <div class="border-bottom border-top d-flex justify-content-center navbar z-8888" style="transition: all 0.5s;">
    <div class="d-flex justify-content-start w-100">
      <Button type="button" class="btn end-0 mt-1 mx-2 position-absolute top-0" id="toggleButton">
        <span class="fa fa-bars first-color fs-4" @click="toggleNav()" data-target="nav"></span>
      </Button>
    </div>
    <nav id="nav" class="">
      <!-- Top Menu  -->
      <div class="p-d-none-lg p-d-none-md  slide-icon w-100">
        <div class="d-flex justify-content-center position-relative">
          <span class="menu mt-1">Menu</span>
          <span class="end-0 fa fa-bars-staggered m-2 pointer position-absolute z-9999" data-target="nav"
            @click="toggleNav()" style="color: rgba(255, 89, 123, 0.8);"></span>
        </div>
      </div>
      <!-- Logo  website -->
      <div class="border-bottom logo-menu pb-2 text-center w-100">
        <img src="https://via.placeholder.com/150" class="rounded-circle">
      </div><!-- Search Bar  -->
      <div class="align-items-center d-flex gap-1 position-relative r search"><input type="text"
          placeholder="  البحث في الموقع" class="form-control rounded"><span class="fa fa-search position-absolute"
          style="left: 5%;color: #8F625B;"></span>
      </div>
      <!-- Links nav bar -->
      <div id="link-nav" class="hoverable">
        <li class="fs-5 pointer">
          <div class="align-items-center d-flex gap-2 justify-content-center"><a
              class="text-decoration-none text-black">مملحات</a><span
              class="fa fa-2xs fa-chevron-down first-color"></span></div>
          <div class="drowDownMenu p-3 position-absolute w-50 rounded z-8888 bg-white-p" style="left:25%;background:;">
            <div class="container">
              <div class="row g-2">
                <div class="col mx-1 rounded">
                  <div class="img-container p-1 position-relative rounded mw-100"><img class="img-recipe w-100"
                      src="https://picsum.photos/id/222/200/200" alt="">
                    <div class="bg-white bottom-0 end-0 h-100 overlay position-absolute start-0 top-0 w-100">
                      <div
                        class="align-items-center d-flex first-color flex-column h-100 justify-content-around recipe-info">
                        <a href="#" class="first-color name_recipe text-decoration-none">Lorem psiurc</a>
                        <div class="author d-flex flex-column-reverse"><a href="#"
                            class="fs-6 name-author text-decoration-none" style="color:#90625c;">Mohamed elhabib</a><img
                            class="avatar mx-auto rounded-circle w-50" src="https://i.pravatar.cc/60"></div>
                        <div class="rating d-flex flex"><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="border-top text-black-title text-center">صابلي العيد خفيف </div>
                </div>
                <div class="col mx-1 rounded">
                  <div class="img-container p-1 position-relative rounded mw-100"><img class="img-recipe w-100"
                      src="https://picsum.photos/id/100/200/200" alt="">
                    <div class="bg-white bottom-0 end-0 h-100 overlay position-absolute start-0 top-0 w-100">
                      <div
                        class="align-items-center d-flex first-color flex-column h-100 justify-content-around recipe-info">
                        <a href="#" class="first-color name_recipe text-decoration-none">Lorem psiurc</a>
                        <div class="author d-flex flex-column-reverse"><a href="#"
                            class="fs-6 name-author text-decoration-none" style="color:#90625c;">Mohamed elhabib</a><img
                            class="avatar mx-auto rounded-circle w-50" src="https://i.pravatar.cc/60"></div>
                        <div class="rating d-flex flex"><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="border-top text-black-title text-center">صابلي العيد خفيف </div>
                </div>
                <div class="col mx-1 rounded">
                  <div class="img-container p-1 position-relative rounded mw-100"><img class="img-recipe w-100"
                      src="https://picsum.photos/id/200/200/200" alt="">
                    <div class="bg-white bottom-0 end-0 h-100 overlay position-absolute start-0 top-0 w-100">
                      <div
                        class="align-items-center d-flex first-color flex-column h-100 justify-content-around recipe-info">
                        <a href="#" class="first-color name_recipe text-decoration-none">Lorem psiurc</a>
                        <div class="author d-flex flex-column-reverse"><a href="#"
                            class="fs-6 name-author text-decoration-none" style="color:#90625c;">Mohamed elhabib</a><img
                            class="avatar mx-auto rounded-circle w-50" src="https://i.pravatar.cc/60"></div>
                        <div class="rating d-flex flex"><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span><span
                            class="border border-end-0 fa fa-heart-circle-bolt fs-6 p-2 rounded-5"></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="border-top text-black-title text-center">صابلي العيد خفيف </div>
                </div>
                <div class="more col-12"><a href="#" class="border btn btn-block btn-lg fs-5 rounded-5"
                    style="color: #E47C8D;">راية المزيد</a></div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div id="link-nav" class="hoverable">
        <li class="fs-5 pointer">
          <div class="align-items-center d-flex gap-2 justify-content-center"><a
              class="text-decoration-none text-black">اكل صحي</a></div>
        </li>
      </div>
      <div id="link-nav" class="hoverable">
        <li class="fs-5 pointer">
          <div class="align-items-center d-flex gap-2 justify-content-center"><a
              class="text-decoration-none text-black">معجنات</a><span
              class="fa fa-2xs fa-chevron-down first-color"></span></div>
        </li>
      </div>
      <div id="link-nav" class="hoverable">
        <li class="fs-5 pointer">
          <div class="align-items-center d-flex gap-2 justify-content-center"><a
              class="text-decoration-none text-black">اكل خفيف</a><span
              class="fa fa-2xs fa-chevron-down first-color"></span></div>
        </li>
      </div>
      <div id="link-nav" class="hoverable">
        <li class="fs-5 pointer">
          <div class="align-items-center d-flex gap-2 justify-content-center"><a
              class="text-decoration-none text-black">الضيوف</a><span
              class="fa fa-2xs fa-chevron-down first-color"></span></div>
        </li>
      </div>
      <div
        class="social-media border-left border-right border-top bottom-0 contact d-flex gap-2 justify-content-center p-2 position-absolute rounded w-100"
        style="background:#fbfbfb;">
        <li class="fa fa-hand-holding-heart"></li>
        <li class="fa fa-hand-holding-heart"></li>
        <li class="fa fa-hand-holding-heart"></li>
        <li class="fa fa-hand-holding-heart"></li>
      </div>
    </nav>
  </div>
</template>

<script scoped>
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
      show: "",
      rightBarShow: false,
    };
  },
  methods: {
    toggleNav() {
      $("#" + event.target.getAttribute("data-target")).toggleClass("show_navbar");
      $("#toggleButton").fadeToggle();
      $('.navbar').toggleClass('border-bottom border-top')
    },

    SlideRightBar() {
      this.rightBarShow = !this.rightBarShow;
      $(".Right-navbar").css("right", "0");
      if (this.rightBarShow) {
        $(".Right-navbar").css("right", "0");
      } else {
        $(".Right-navbar").css("right", "-100%");
      }
    },
    slideSubMenu() {
      $("#" + event.target.getAttribute("data-toggle"))
        .find(".sub-menu")
        .fadeToggle();
      $("#" + event.target.getAttribute("data-toggle"))
        .find(".fa-slide")
        .toggleClass("fa-chevron-left fa-chevron-down");
    },
    wheneScroll() {

      if ($(window).scrollTop() > 300) {
        $(".navbar").css({
          position: "fixed",
          width: "100%",
          top: "0",
          background: 'rgb(255, 255, 255)',
          'box-shadow': '1px 1px 14px #ef6f82',
        });
      } else {
        $(".navbar").css({
          position: "relative",
          top: "0",
          'box-shadow': 'none',
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
#nav {
  display: flex;
  gap: 1rem;
}



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


.drowDownMenu .overlay {
  opacity: 0;
  background-color: rgba(0, 0, 0, 0.5);
  transition: opacity 1s;

}

.drowDownMenu .img-container:hover .overlay {
  opacity: 0.85;
  transition: opacity 1s;
}



nav.navbar {
  background: hsl(170, 81%, 29%);
}

#nav .hoverable {}

#nav .drowDownMenu {
  display: none;
  transition: all 1s;
}

#nav .hoverable:hover .drowDownMenu {
  display: block;
  animation: fadeInMenu 1s;
  transition: all 1s;

}

@keyframes fadeInMenu {
  0% {
    opacity: 0;
    display: none;
  }

  100% {
    opacity: 1;
  }
}

/* small Screen */
@media only screen and (max-width: 768px) {


  .show_navbar {
    gap: 21px !important;
    width: 50% !important;
    height: 100% !important;
    border-left: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
    background: hsl(60deg 20% 99%) !important;
    flex-direction: column !important;
    align-items: center !important;
    position: fixed !important;
    top: 0 !important;
    right: 0 !important;
    transition: all 1s !important;
    z-index: 9999;
  }

  #nav {
    position: fixed;
    flex-direction: column;
    right: -100%;
    height: 100%;
    transition: all 1s;
    display: flex;
    gap: 1rem;
    top: 0;
  }

  #nav #link-nav {
    /* display: flex !important; */
    flex-direction: column !important;
    /* justify-content: center !important;
    align-items: center !important; */
  }



  #nav .drowDownMenu {
    display: none !important;
    left: 0 !important;
    background: #3b3959;
    width: 100% !important;
    position: relative !important;
    overflow: auto;
    height: 500px;
  }





  #navigation-bar .Right-navbar {
    width: 50%;
  }

  #toggleButton {
    position: relative !important;
  }
}


/*       Mediam screen  */
@media only screen and (min-width: 768px) and (max-width: 992px) {
  nav.navbar {
    background: hsl(170, 81%, 29%);
  }

  #toggleButton {
    display: none !important;
  }

  .show_navbar {
    display: none !important;
  }

  .show_navbar .logo-menu,
  .social-media {
    display: none !important;
  }

  #nav {
    display: flex !important;
    gap: 1rem !important;
  }

  #nav .search {
    display: none !important;
  }

}

/*       Large  screen  */
@media only screen and (min-width: 992px) {
  nav.navbar {
    background: hsl(170, 81%, 29%);
  }

  #toggleButton {
    display: none !important;
  }

  .show_navbar {
    display: none !important;
  }

  #nav .logo-menu,
  .social-media {
    display: none !important;
  }

  #nav {
    display: flex !important;
    gap: 1rem !important;
  }

  #nav .search {
    display: none !important;
  }

}
</style>
