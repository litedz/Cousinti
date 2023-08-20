<template>
  <div class="align-items-center d-flex h-auto justify-content-center navbar mw-100 z-8888 border-bottom border-top"
    style="transition: all 0.5s;" dir="rtl">

    <div class="d-flex justify-content-start w-100">
      <Button type="button" class="btn end-0 mt-1 mx-2 position-absolute top-0" id="toggleButton" name="toggleButton"
        aria-label="ToggleMenu" role="presentation">

        <span class="fa fa-bars first-color fs-4" @click="toggleNav()" data-target="nav"></span>
      </Button>
    </div>

    <nav id="nav" class="d-flex justify-content-start mw-100" style="height: 50px;">
      <!-- Top Menu  -->
      <div class="p-d-none-lg p-d-none-md  slide-icon w-100">
        <div class="d-flex justify-content-center position-relative">
          <span class="menu mt-1">Menu</span>
          <span class="end-0 fa fa-bars-staggered m-2 pointer position-absolute z-9999" data-target="nav"
            @click="toggleNav()" style="color: rgba(255, 89, 123, 0.8);"></span>
        </div>
      </div>
      <!-- Logo  website -->
      <div class="border-bottom logo-menu pb-2 text-center w-100 position-relative">
        <img :src="w_path + '/images/logo.png'" class="rounded-circle">
      </div>
      <!-- Search Bar  -->
      <div class="align-items-center d-flex gap-1 position-relative r search">
        <input type="text" placeholder="  البحث في الموقع" class="form-control rounded"><span
          class="fa fa-search position-absolute" style="left: 5%;color: #8F625B;"></span>
      </div>
      <!-- Links nav bar -->


      <div class="nav-links">

        <div id="link-nav" class="hoverable p-2 " @mouseenter="hoverLink()" @mouseleave="hoverLink()">

          <li class="fs-5 pointer">
            <div class="align-items-center d-flex gap-2 justify-content-center">
              <a href="/" class="text-decoration-none text-black position-relative active-link"
                aria-label="go home">الرئيسة</a>
            </div>
          </li>
        </div>
        <div v-for="recipeType in types" :key="recipeType.name" id="link-nav" class="hoverable p-2"
          @mouseenter="hoverLink()" @mouseleave="hoverLink()">
          <li class="fs-5 pointer">
            <div class="align-items-center d-flex gap-2 justify-content-center">
              <a :href="'/similar/' + recipeType.type" class="text-decoration-none text-black position-relative">{{
                recipeType.type }}</a>
            </div>
          </li>
        </div>
        <div id="link-nav" class="hoverable p-2 Dropable" @mouseenter="hoverLink()" @mouseleave="hoverLink()">
          <li class="fs-5 pointer">
            <div class="align-items-center d-flex gap-2 justify-content-center">
              <a href="/recipes" class="text-decoration-none text-black position-relative">الوصفات</a>
            </div>


          </li>
        </div>

      </div>

      <!-- Auth area  -->
      <div class="auth-area px-2" v-if="this.$attrs.auth_status && this.$attrs.auth_status == true">
        <KeepAlive>
          <component :is="activeComponent" @close-wishlist="activeComponent = ''" :user_id="this.$attrs.user_id">
          </component>
        </KeepAlive>


        <div class="info align-items-center d-flex flex-row-reverse ">
          <div class="" v-if="this.$attrs.auth_status == true && this.$attrs.checkmediauser == true">
            <img :src="this.$attrs.avatar" style="width: 50px;height: 50px;" alt="avatar" class="rounded-circle m-2" />
          </div>
          <!-- authentication  with Laravel App -->
          <div class="" v-if="this.$attrs.auth_status == true && this.$attrs.checkmediauser == false">
            <a :href="w_path + '/profile/' + this.$attrs.user_id">
              <img :src="w_path + '/storage/' + this.$attrs.avatar" style="width: 50px;height: 50px;" alt="avatar"
                class="rounded-circle m-2" /></a>
          </div>
          <div class="dashboard position-relative text-right w-auto">
            <div class="">
              <div class="name text-truncate">
                <a :href="'/profile/' + this.$attrs.user_id"
                  class="text-decoration-none fs-6 fst-italic fw-bolder text-black-50"><span>Hi , </span>{{
                    this.$attrs.user }}</a>
              </div>
            </div>
            <!-- Quick Menu  -->

            <a class="fa fa-bars-staggered fs-4 first-color pointer text-decoration-none" @click="toggleMenu()"
              data-link="quick-menu" data-toggle="navSlide"></a>
            <div class="bg-white end-0 quick-menu p-3 position-absolute text-center rounded shadow" id="quick-menu">
              <li class="head fw-bolder">Quick Menu</li>
              <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                <a href="/dashboard" class="text-decoration-none first-color">لوحة التحكم</a><span
                  class="fa fa-dashboard fs-6 m-2 first-color"></span>
              </li>
              <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                <a href="/recipes" class="text-decoration-none first-color">الوصفات</a><span
                  class="fs-6 m-2 fa fa-list first-color"></span>
              </li>
              <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                <a href="#" class="text-decoration-none first-color"
                  @click="activeComponent = 'wishlist'">المفضلة</a><span
                  class="fs-6 m-2 fa fa-heartbeat first-color"></span>
              </li>
              <li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded">
                <a href="/logout" class="text-decoration-none first-color">الخروج</a><span
                  class="fa fa-door-open fs-6 m-2 first-color"></span>
              </li>
            </div>
          </div>

        </div>
      </div>


      <!-- Media  -->
      <div
        class="social-media border-left border-right border-top bottom-0 contact d-flex gap-2 justify-content-center p-2 position-absolute rounded w-100"
        style="background:#fbfbfb;">
        <a href="/" class="">
          <li data-feather="facebook"></li>
        </a>
        <a href="/" class="text-danger">
          <li data-feather="youtube"></li>
        </a>
        <a href="/" class="text-muted">
          <li data-feather="instagram"></li>
        </a>
        <a href="/" class="text-info">
          <li data-feather="twitter"></li>
        </a>
      </div>
    </nav>
    <div class="align-items-center d-flex fw-bolder gap-2 login mx-2 position-absolute rounded start-0  form"
      v-if="showLoginForm && this.$attrs.auth_status !== 1">
      <a href="/login" class="btn p-2 px-4 rounded text-decoration-none text-white"
        style="background: rgb(65, 60, 88);">Login</a>
      <a href="/register" class="btn p-2 px-4 rounded text-decoration-none text-white"
        style="background: hsl(251 19% 43% / 1);">Register</a>
    </div>
  </div>
</template>

<script scoped>
export default {
  mounted() {
    window.addEventListener("scroll", this.wheneScroll);
    this.getTypes();
  },
  unmounted() {
    window.removeEventListener("scroll", this.wheneScroll);
  },
  inject: ["w_path"],
  data() {
    return {
      show: "",
      rightBarShow: false,
      types: '',
      showLoginForm: false,
      showWishList: false,
      activeComponent: '',
    };
  },
  methods: {
    toggleNav() {

      $("#" + event.target.getAttribute("data-target")).toggleClass("show_navbar");

      $("#toggleButton").fadeToggle();

      $(".logo-menu img").fadeToggle();
      $('.navbar').toggleClass('border-bottom border-top');


      // if ($('#nav').hasClass('show_navbar')) {
      //   $('#nav .logo-menu img').css('50%')
      // }
    },

    SlideRightBar() {
      this.rightBarShow = !this.rightBarShow;
      $(".Right-navbar").css("right", "0");
      if (this.rightBarShow) {
        $(".Right-navbar").css("right", "0");
        this.showLoginForm = false;
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

        // $('.login').addClass('d-flex');
        this.showLoginForm = true;

      } else {
        $(".navbar").css({
          position: "relative",
          top: "0",
          'box-shadow': 'none',
        });

        this.showLoginForm = false;
      }
    },

    hoverLink() {

      $('#app').find('.active-link').removeClass('active-link');
      $(event.target).find('a').toggleClass('text-black first-color active-link');
    },
    getTypes() {

      axios({ method: "get", url: "/types_recipe" })
        .then((response) => {
          if (response.data) {

            this.types = response.data;
          }
        })
        .catch((error) => { });
    },
    toggleMenu() {
      $("#" + event.target.getAttribute("data-link")).fadeToggle("slow");
    },
    getMedia() {
      axios.get().then((response) => {
        this.media = response.data;
      })
    }
  },
};
</script>
<style scoped>
#nav {
  display: flex;
  gap: 1rem;
}

/* #nav .active-link {
  background: #EF6F82;
  color: white !important;
  padding-right: 1.5rem !important;
  padding-left: 1.5rem !important;
  padding-top: .5rem !important;
  padding-bottom: .5rem !important;
  border-radius: .25rem !important;
  transition: all 1s;
} */
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

/* #nav .hoverable {} */

#nav .drowDownMenu {
  display: none;
  transition: all 1s;
}

#nav .hoverable:hover .drowDownMenu {
  display: block;
  animation: fadeInMenu 1s;
  transition: all 1s;

}

#nav #link-nav a.active-link {
  color: #EF6F82 !important;
}

#nav #link-nav a.active-link::after {

  content: '\276F';
  position: absolute;
  transform: rotate(90deg);
  left: 45%;
  top: 80%;
  transition: all 1s;
  color: #EF6F82;
}

#nav .nav-links {
  display: flex;
}

#nav .auth-area {
  right: 5%;
  position: absolute;
}

#nav .auth-area #quick-menu {
  width: 400px;
  z-index: 9998;
  display: none;
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

  .logo-menu img {
    display: none;
    width: 100%;
  }

  .show_navbar {
    gap: 0px !important;
    width: 60% !important;
    height: 100% !important;
    border-left: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
    background: hsl(60deg 20% 99%) !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: space-between !important;
    position: fixed !important;
    top: 0 !important;
    right: 0 !important;
    transition: all 1s !important;
    z-index: 9999;
  }

  .show_navbar .logo-menu img {
    width: 100% !important;
    transition: all 0.5s;
  }

  #nav .auth-area {
    position: relative !important;
    display: flex;
    justify-content: center;
    right: 0;
    width: 100%;
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
    width: 50%;
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

  #nav .auth-area #quick-menu {
    bottom: 100% !important;
  }



  #nav #link-nav a.active-link::after {
    position: relative !important;
    right: 50%;
  }

  #nav .nav-links {
    display: block;
  }


  #nav .social-media {
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

  .logo-menu img {
    display: none;
    width: 100%;
  }

  #nav {
    display: flex !important;
    align-items: center;
    gap: 1rem !important;
  }

  #nav .search {
    display: none !important;
  }

  #nav .auth-area {
    position: relative !important;
    background: #e9e9e9;
    display: flex;
    width: 100%;
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
