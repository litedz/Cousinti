<template>
  <div class="all_recettes">
    <div class="wrapper">
      <div class="content mt-5 h-auto mb-5" dir="rtl">
        <div class="container">
          <div class="row">
            <div class="col-12 mt-5 mb-5 font-amiri">
              <div class="align-items-center d-flex justify-content-between bg-gradient px-3 rounded bg-second-color">
                <div class="fs-4 fw-semibold text-white">
                  الوصفات
                </div>
                <div class="align-items-center d-flex">
                  <p class="fs-5 mx-3 pt-3 fw-semibold text-white">
                    تصنيف حسب
                  </p>
                  <li class=" fa fa-filter p-2 pointer rounded-circle bg-first-color text-white"
                    @click="show_filter = !show_filter"></li>
                </div>
              </div>
              <!-- Filter recipe  -->
              <transition name="fade">
                <div class="filter" v-show="show_filter">
                  <div class="d-flex flex-wrap w-100">
                    <button href="#" @click="getRecipes()"
                      class="fs-5 recipes-link text-black-50 m-3 p-2 rounded-pill pointer border fw-semibold text-decoration-none">All
                      Recipes</button>
                    <button @click="filterType(AvailableType.type)"
                      class="type-link fs-5 text-black-50 m-3 p-2 rounded-pill pointer border fw-semibold text-decoration-none"
                      v-for='AvailableType in types_recipe' :key="AvailableType.recipe">
                      {{ AvailableType.type }}
                    </button>
                  </div>
                </div>
              </transition>
            </div>

            <transition name="fade" v-if="recipes == 0">
              <div class="alert alert-light-secondary not_found text-center">
                <div class="h5 text-black-50">
                  لا يوجد وصفات
                </div>
              </div>
            </transition>

            <TransitionGroup name="fade" v-if="recipes !== 0">
              <div class="col-6 col-md-6 col-lg-3 mt-3 position-relative" id="test" v-for="recipe in recipes"
                :key="recipe.singleMe">
                <div class="single_recipe" v-show="recipe">
                  <div class="image position-relative">
                    <div class="position-absolute text-center w-100" style="z-index: 9;color: #0e8572;top: 40%;">
                      <button type="button" class="bg-transparent border-0 btn rounded-circle">
                        <i class="text-first bg-light fa-circle-plus fa-solid rounded-circle fa-2x"></i>
                      </button>
                    </div>
                    <div class="effect-image h-100 position-absolute w-100">
                    </div>
                    <!-- Cover of recipe  -->
                    <img class="w-100 rounded" style="height: 300px" v-for="cover in recipe.images_recipe"
                      :src="w_path + '/storage/recipes/' + cover.name" alt="" :key="cover.recipe" />
                  </div>
                  <div class="title h5 mt-1">
                    <a :href="'/recipes/' + recipe.id" class="text-dark text-decoration-none">{{
                      recipe.name }}</a>
                  </div>
                  <div class="author">
                    <a :href="'/profile/' + recipe.author.id
                      " class="text-decoration-none text-black-50 font-14">{{ recipe.author.username }}</a>
                  </div>
                  <div class="rating">
                    <ul class="list-unstyled mt-2" style="padding: 0">
                      <li class="fa fa-star fa-2xs text-warning">
                      </li>
                      <li class="fa fa-star fa-2xs text-warning">
                      </li>
                      <li class="fa fa-star fa-2xs text-warning">
                      </li>
                      <li class="fa fa-star fa-2xs text-warning">
                      </li>
                    </ul>
                  </div>
                  <div class="type">
                    <a :href="'/similar/' + recipe.type_recipe.type"
                      class="bg-third-color font-14 fw-bold pb-1 pt-1 px-2 rounded-pill text-decoration-none text-success text-white">{{
                        recipe.type_recipe.type }}</a>
                  </div>
                </div>
              </div>
            </TransitionGroup>
          </div>
        </div>
      </div>
    </div>
    <footer-page></footer-page>
  </div>
</template>

<script >
export default {
  inject: ["w_path"],
  mounted() {
    this.getRecipes();
    this.getAvailableTypesRecipes();
    // window.addEventListener("load", this.OnLoad);
  },
  data() {
    return {
      Path: window.location.host,
      recipes: "",
      types_recipe: "",
      show_filter: false,
    };
  },
  methods: {
    getRecipes() {
      $("body").find(".active-filter").removeClass("active-filter");
      $(".recipes-link").addClass("active-filter");
      axios({ method: "get", url: "/guest/recipe" })
        .then((response) => {
          if (response.data.recipes) {
            this.recipes = response.data.recipes;
          }
        })
        .catch((error) => { });
    },
    getAvailableTypesRecipes() {
      axios({ method: "get", url: "types_recipe" })
        .then((response) => {
          if (response.data) {
            this.types_recipe = response.data;
          }
        })
        .catch((error) => { });
    },

    filterType(key) {
      $("body").find(".active-filter").removeClass("active-filter");
      $(event.target).addClass("active-filter");
      let data = new FormData();
      data.append("SearchBy", key);
      axios({
        method: "get",
        url: "/guest/filter/" + key,
        data: data,
      })
        .then((response) => {
          if (response.data) {
            this.recipes = response.data;
          }
        })
        .catch((error) => { });
    },
  },
};

$(document).ready(function () {
  // Single Recette
  $(".single_recipe .image").mouseenter(function () {
    $(this).find(".effect-image").fadeIn();
    $(this).find("button").fadeIn();
  });
  $(".single_recipe .image").mouseleave(function () {
    $(this).find(".effect-image").fadeOut();
    $(this).find("button").fadeOut();
  });
});
</script>

<style scoped>
.content {
  /* background: #c0c2c4; */
  width: 100%;
  height: 900px;
}

#test {
  transition: all 1s display;
}

.content .single_recipe .image .effect-image {
  display: none;
  background: #ffffff54;
}

.content .single_recipe .image button {
  display: none;
}

.content .single_recipe .type a::after {
  content: ",";
}

.content .single_recipe .type a:last-of-type::after {
  content: "";
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}

.active-filter {
  background: #05312a1f;
}

@media only screen and (max-width: 768px) {
  .header .logo-text {
    font-size: 1.5rem;
  }

  .header .navbar {
    top: 0;
  }

  .content {
    display: flex;
    flex-direction: column-reverse;
    justify-items: center;
  }

  .content .type {
    display: flex;
    justify-items: center;
  }

  .content .type a {
    font-size: 12px;
  }
}

@media only screen and (min-width: 768px) {
  .header .navbar {
    top: 0;
  }
}
</style>
