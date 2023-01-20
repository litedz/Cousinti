<template>
  <!-- <li class="item d-flex" v-for="ing in this.single_recipe.ingredient" :key="ing">{{ing.name_ingredient}}<div class="font-weight-bolder">100g</div></li> -->
  <!-- <img class="w-100 h-100" :src="this.w_path + '/storage/' + $attrs.user_id + '/' + this.single_recipe.name + '/' + img.name"> -->
  <div class="single-recipe"
       style="">
    <status ref="status"></status>
    <div class="content mt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-6 mb-5 images">
            <div class="images w-100"
                 style="height: auto">
              <div v-for="img in this.single_recipe.images_recipe"
                   :key="img"
                   class="head-image">
                <img class="w-100 m-1 p-1"
                     style="height: 500px"
                     v-if="img.cover == 'active'"
                     :src="
                       this.w_path +
                       '/storage/recipes/' +
                       img.name
                     " />
              </div>
              <div class="other-images d-flex justify-content-end">
                <div v-for="img in this.single_recipe
                .images_recipe"
                     :key="img"
                     class="w-auto">
                  <img class="m-1 p-1"
                       style="height: 250px;width:250px"
                       v-if="img.cover !== 'active'"
                       :src="
                         this.w_path +
                         '/storage/recipes/' +
                         img.name
                       " />
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 border-bottom">
            <div class="ingredients h-100"
                 dir="rtl">
              <div class="row h-100 px-5 d-flex flex-column">
                <div class="col-12 mb-5">
                  <h1 class="name_recipe">
                    {{ this.single_recipe.name }}
                  </h1>
                  <div class="type_recipe d-flex align-items-baseline">
                    <div class="font-amiri font-italic fw-semibold h6 text-black-50">
                      نوع الوصفة :
                    </div>
                    <div>
                      <a :href="
                        '/similar/' + this.type_recipe
                      "
                         class="text-first text-decoration-none">{{ this.type_recipe }}</a>
                    </div>
                  </div>
                </div>
                <div class="col-8 position-relative">
                  <img :src="Path + '/images/sep2.png'"
                       class="position-absolute start-0"
                       alt=""
                       srcset="" />
                  <div class="items">
                    <table class="table table-bordered table-hover text-center">
                      <thead>
                        <tr>
                          <th class="h4 fw-bolder">
                            #
                          </th>
                          <th class="h4 fw-bolder">
                            الاسم
                          </th>
                          <th class="h4 fw-bolder">
                            الكمية
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr class="item-ingredient"
                            v-for="(ing, index) in this
                            .single_recipe
                            .ingredient"
                            :key="ing">
                          <td class="font-weight-bolder">
                            {{ index + 1 }}
                          </td>
                          <td class="font-2">
                            {{
                                ing.name_ingredient
                            }}
                          </td>
                          <td class="font-2">
                            {{ ing.quantity }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="how_to col-12 mt-5"
                     dir="rtl">
                  <div>
                    <div class="title h1">
                      طريقة التحضير
                    </div>
                    <div class="text lh-lg mt-5 text-black-50 text-body">
                      {{ this.single_recipe.how_todo }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mt-5"
               id="how">
            <div class="row">
              <div class="video col-12 col-md-6">
                <div class="video-prepare">
                  <iframe width="100%"
                          type="text/html"
                          id="player"
                          height="315"
                          :src="
                          'https://www.youtube.com/embed/' +
                          this.single_recipe.url_video"
                          title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-12 col-md-6"
                   dir="rtl">
                <div class="d-flex flex-column p-3 justify-content-around h-100 px-5">
                  <div class="d-flex align-items-center">
                    <li class="fa fa-line-chart m-1 text-warning"></li>
                    <div class="h3 m-1">نسبة النجاح</div>

                  </div>
                  <div class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quod eum sequi nulla quae voluptatem sit officia, odio explicabo atque quos, laborum porro? Voluptas aliquid qui incidunt, adipisci sunt corrupti.</div>

                  <div class="progress w-50"
                       style="height: 30px">
                    <div class="bg-success fs-3 fw-bolder progress-bar progress-bar-striped"
                         role="progressbar"
                         :style="'width:' + this.rating + '%; height: 30px'"
                         aria-valuemin="0"
                         aria-valuemax="100">{{ this.rating }}%</div>
                  </div>
                  <div class="votes d-flex">
                    <div>

                      <li class="fa fa-2xl fa-heart m-1 pointer text-danger fa-solid"
                          v-if="liked"
                          aria-hidden="true"
                          @click="like()"></li>
                      <li class="fa fa-2xl fa-heart m-1 pointer text-danger fa-regular"
                          aria-hidden="true"
                          v-else
                          @click="like()"></li>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- comments part  -->
      <div class="comments mt-5">
        <comments :recipe_id="this.$attrs.recipe_id"></comments>
      </div>

      <similar-recipe class="mb-5"></similar-recipe>
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
.single-recipe {
  font-family: "amiri";
}

.single-recipe .content .ingredients .item div {
  margin-right: 1.5rem;
}

.single-recipe .content .ingredients .row div:last-of-type img {
  display: none;
}

.single-recipe .content .success-percentage .txt {
  z-index: 1;
  top: 45%;
  font-size: 30px;
  font-style: italic;
  color: #1b3a36;
  font-weight: 900;
}

.single-recipe .content .success-percentage .circle {
  display: none;
}

.single-recipe .content .success-percentage .shape {
  bottom: 0;
  height: 0;
  width: 100%;
  position: absolute;
  transition: 1s all;
}

@media only screen and (max-width: 796px) {


  div {
    height: auto;
  }

  .single-recipe .content .ingredients .col-4 {
    border-left: 1px solid #dee2e6;
    padding: 10px 0;
  }

  .single-recipe .content .ingredients .col-4 img {
    display: none;
  }
}
</style>
