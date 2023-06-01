<template>
  <status ref="status"></status>
  <div class="single-recipe d-grid gap-4" style="">
    <div class="header d-grid">
      <div class="content d-grid gap-4">
        <div v-for="img in this.single_recipe.images_recipe" :key="img">
          <img v-if="img.cover == 'active'" :src="this.w_path + '/storage/recipes/' + img.name" class="mw-100"
            style="width: 100%;height: 300px;">
        </div>
        <div
          class="align-items-center bg-white-p d-flex gap-5 info-recipe justify-content-center mx-auto p-2 position-absolute rounded shadow w-50">
          <div class="time d-flex align-items-center gap-2"><span
              class="border fa fa-clock p-1 rounded-4 text-bg-success"></span>
            <li>25</li>
            <li>Min .</li>
          </div>
          <div class="number-ingrediants d-flex align-items-center gap-2"><span
              class="border fa fa-finger-up fa-list-dots first-color fs-6 p-1 rounded-4"></span>
            <li>{{ this.ingredients.length }}</li>
            <li>ingredients</li>
          </div>
          <div class="author border rounded-circle"><a :href="'/profile/' + this.single_recipe.user_id"><img
                src="https://i.pravatar.cc/60" class="rounded-5"></a>
          </div>
          <div class="likes d-flex align-items-center gap-2">
            <span class="border fa fa-thumbs-up p-1 rounded-4 text-bg-primary pointer " @click="like_recipe()"></span>
            <!-- <li class="fs-6 text-primary">You and </li> -->
            <li>{{ this.single_recipe.like }}</li>
            <li>Likes</li>
          </div>
          <div class="wishliste">
            <btn-wishlist :recipe_id="this.$attrs.recipe_id" :user_id="this.$attrs.user_id"></btn-wishlist>
          </div>
        </div>
      </div>
    </div>
    <div class="ingredients mt-5">
      <div class="container">
        <div class="content">
          <div class="border-bottom fs-1 mx-auto text-center title w-50">
            {{ this.single_recipe.name }}
          </div>
          <div class="mx-auto w-50">
            <ul class="list-ingredients d-grid gap-3 ">
              <li class="fs-6 fw-bolder text-black-title" v-for="(ing,index) in this.single_recipe.ingredient" :key="ing">
                {{ ing.name_ingredient }}</li>

            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="more-images" v-if="this.single_recipe.images_recipe && this.single_recipe.images_recipe.length > 2">
      <div class="container">
        <div class="fs-3 heading mb-4 position-relative px-2 text-right " style="border-right: 4px solid #f6a5af;">More
          photos</div>
        <div class="row justify-content-center">
          <div class="col-3" v-for="img in this.single_recipe.images_recipe" :key="img">
            <img class="w-100 rounded-4" v-if="img.cover !== 'active'" :src="this.w_path + '/storage/recipes/' + img.name"
              alt="" srcset="">
          </div>
        </div>
      </div>
    </div>

    <div class="comments mt-5">
      <comments :recipe_id="this.$attrs.recipe_id"></comments>
    </div>
    <div class="footer">
      <footer-page></footer-page>
    </div>

  </div>
</template>

<script>

export default {
  mounted() {
    window.addEventListener("scroll", this.whenScroll);
    this.getRecipe();

  },
  unmounted() {
    window.removeEventListener("scroll", this.whenScroll);
  },
  inject: ["w_path"],
  data() {
    return {
      Path: window.location.protocol + "//" + window.location.host,
      single_recipe: "",
      type_recipe: '',
      rating: '',
      ingredients: '',
    };
  },
  methods: {
    checkLikeRecipe() {
      let data = new FormData();
      data.append('user_id', this.$attrs.user_id)
      axios.get("/recipe/likes", data)
        .then((response) => {
          if (response.data) {
            this.likes = response.data.liked;

          }
        })
        .catch((error) => { });
    },
    like_recipe() {
      let data = new FormData();
      data.append('recipe_id',this.$attrs.recipe_id);
      axios.post("/recipe/like/" + this.$attrs.recipe_id,data)
        .then((response) => {
          this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
          this.checkLikeRecipe();
        })
        .catch((error) => {
          this.$refs.status.Display('danger', error.response.data.message, 'خطا', 'exclamation-circle', 2000);
        });
    },
    whenScroll() {
      if ($(window).scrollTop() > 700) {

      }
    },
    getRecipe() {
      axios({ method: "get", url: "/guest/recipe/" + this.$attrs.recipe_id })
        .then((response) => {
          if (response.data) {
            this.single_recipe = response.data.recipe;

            this.type_recipe = response.data.recipe.type_recipe.type;
            this.rating = response.data.recipe.rating;
            this.ingredients = response.data.recipe.ingredient;
          }
        })
        .catch((error) => { });
    },
  },
};
</script>

<style scoped>
.single-recipe .header .content {
  width: 100%;
  height: 300px;
  background: indianred;
  position: relative;

}

.single-recipe .header .info-recipe {
  bottom: -5%;
  left: 25%;
}

.single-recipe .ingredients .content .list-ingredients li {
  list-style: '- ' !important;
}

/* .single-recipe .more-images .heading::before {
  content: '';
  width: 4px;
  height: 100%;
  background: #ef6f82;
  position: absolute;
  right: 0;
}
*/
/* .single-recipe .more-images .heading::after {
  content: '';
  width: 85%;
  height: 1px;
  background: #e3e3e3;
  position: absolute;
  left: 0;
  top: 45%;
}  */


@media only screen and (max-width: 796px) {
  .single-recipe .header .info-recipe {
    width: 100% !important;
    left: 0 !important;
    gap: 2% !important;
  }

}
</style>
