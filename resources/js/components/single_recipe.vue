<template>
  <div class="single-recipe d-grid gap-4" style="">
    <status ref="status"></status>
    <div class="header d-grid">
      <div class="content">
        <img src="https://picsum.photos/1900/300" alt="" class="mw-100">
        <div
          class="align-items-center bg-white-p d-flex gap-5 info-recipe justify-content-center mx-auto p-2 position-absolute rounded shadow w-50">
          <div class="time d-flex align-items-center gap-2"><span
              class="border fa fa-clock p-1 rounded-4 text-bg-success"></span>
            <li>25</li>
            <li>Min .</li>
          </div>
          <div class="number-ingrediants d-flex align-items-center gap-2"><span
              class="border fa fa-finger-up fa-list-dots first-color fs-6 p-1 rounded-4"></span>
            <li>25</li>
            <li>ingredients</li>
          </div>
          <div class="auhtoh border rounded-circle"><a href=""><img src="https://i.pravatar.cc/60" class="rounded-5"></a>
          </div>
          <div class="likes d-flex align-items-center gap-2"><span
              class="border fa fa-thumbs-up p-1 rounded-4 text-bg-primary"></span>
            <li>25</li>
            <li>Likes</li>
          </div>
        </div>
      </div>
    </div>
    <div class="ingredients mt-5">
      <div class="container">
        <div class="content">
          <div class="border-bottom fs-1 mx-auto text-center title w-25">loloazea
          </div>
          <div class="mx-auto w-50">
            <ul class="list-ingredients">
              <li>test1</li>
              <li>test1</li>
              <li>test1</li>
              <li>test1</li>
              <li>test1</li>
              <li>test1</li>
              <li>test1</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="more-images">
      <div class="container">
        <div class="heading"></div>
        <div class="row justify-content-center">
          <div class="col-3">
            <img class="w-100 rounded-4" src="https://picsum.photos/200" alt="" srcset="">
          </div>
          <div class="col-3">
            <img class="w-100 rounded-4" src="https://picsum.photos/200" alt="" srcset="">
          </div>
          <div class="col-3">
            <img class="w-100 rounded-4" src="https://picsum.photos/200" alt="" srcset="">
          </div>
        </div>
      </div>
    </div>
    <div class="comments">
      <comments :recipe_id="$attrs.recipe_id"></comments>
    </div>

    <div class="footer">
      <footer-page></footer-page>
    </div>

  </div>
</template>

<script>
import comments from "./comments.vue";

export default {
  mounted() {
    window.addEventListener("scroll", this.whenScroll);
    this.getRecipe();
    this.checkLikeRecipe();
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
      liked: '',
    };
  },
  methods: {
    checkLikeRecipe() {
      axios({
        method: "get", url: "/user/" + this.$attrs.recipe_id + "/liked/"
      })
        .then((response) => {
          if (response.data) {
            this.liked = response.data.liked;

          }
        })
        .catch((error) => { });
    },
    like() {
      axios({
        method: "post",
        url: "/recipe/like/" + this.$attrs.recipe_id,
      })
        .then((response) => {
          this.$refs.status.Display('success', response.data, '', 'check');
          this.checkLikeRecipe();
        })
        .catch((error) => {
          this.$refs.status.Display('info', error.response.data.message);
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
            this.rating = response.data.recipe.recipes_liked[0].rating;
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

@media only screen and (max-width: 796px) {
  .single-recipe .header .info-recipe{
    width: 100% !important;
    left: 0 !important;
    gap: 2% !important;
  }

}
</style>
