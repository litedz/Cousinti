<template>
    <div class="random_recipe pb-5 pt-2 rounded"
         style="padding: 7%;">
         <div class="position-fixed w-100 h-100 end-0 top-0 bg-dark opacity-50 z-8888"></div>
        <div class="end-0 m-1 position-absolute remove pointer text-right text-white top-0"
             style="z-index: 9999;">
            <div class="bg-primary-color rounded-circle text-center text-white"
                 style="width: 30px;height:30px"><i class="bg-perso fa fa-remove p-1 px-2 rounded-circle"
                   aria-hidden="true" @click="$emit('CloseRecipe')"></i></div>
        </div>
        <div class="bg-black h-100 opacity-50 opt position-absolute top-0 start-0 w-100">

        </div>
        <div class="container position-relative"
             style="z-index: 9999;">
            <div class="row">
                <div class="bg-light border-bottom col-12 font-22 font-weight-bolder m-auto mb-2 p-2 text-center title rounded-pill w-100 "><a class="text-decoration-none text-first"
                       :href="'/recipes/' + random_recipe.id">{{ random_recipe.name }}</a></div>
                <div class="image_recette col-12 p-0 img-fluid mt-3 rounded text-center">
                    <img v-for="cover in random_recipe.images_recipe"
                         :key="cover.recipe"
                         :src="w_path + '/storage/recipes/' + cover.name"
                         class="w-100 rounded"
                         alt=""
                         srcset="">
                </div>
                <div class="col-12 p-0">
                    <div class="bg-light  info m-auto mt-2 rounded p-3">
                        <div class="random ">
                            <div class="row align-items-end">
                                <div class="rating col-12 col-sm-12 col-md-6 m"
                                     dir="rtl">
                                    <div class="h6 d-flex">
                                        <div class="wfont-amiri fw-bolder w-75">نسبة النجاح</div>
                                        <div class="text-muted">نسبة النجاح مبنية علي عدد اعجابات المستخديمن</div>
                                    </div>
                                    <div class="progress"
                                         style="height: 30px">
                                        <div class="bg-success fs-6 fw-bolder progress-bar progress-bar-striped"
                                             role="progressbar"
                                             :style="'width:' + this.rating + '%;'"
                                             aria-valuemin="0"
                                             aria-valuemax="100">{{ this.rating }}%</div>
                                    </div>
                                </div>
                                <div class="actions text-center col-12 col-sm-12 col-md-6">
                                    <button type="button"
                                            @click="getRandomRecipe()"
                                            dir="rtl"
                                            class="btn btn-primary btn-primary-perso p-mb-sc-0"
                                            style="background-color: #168272; border:#168272;width:40%">
                                        <span>تغيير</span>
                                        <li class="fa fa-rotate fa-2xs"></li>
                                    </button>
                                    <a :href="'/recipes/' + random_recipe.id"
                                       dir="rtl"
                                       class="btn btn-primary m-1"
                                       style="width: 40%;"
                                       @click="recette()">
                                        <span>الوصفة</span>
                                        <li class="fa fa-check fa-2xs"></li>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF COMPONENT  -->
    </div>
</template>

<script>
export default {
    inject: ["w_path"],
    mounted() {
        this.getRandomRecipe();
    },
    activated(){
        this.getRandomRecipe();
    },
    data() {
        return {
            random_recipe: "",
            rating: "",
        };
    },
    methods: {
        getRandomRecipe() {

            axios({ method: "post", url: "/recipes/random" })
                .then((response) => {
                    if (response.data.random_recipe) {
                        this.random_recipe = response.data.random_recipe;
                        this.rating = response.data.rating.rating;
                    }
                })
                .catch((error) => { });
        },
    },
};
</script>

<style scoped>
.random_recipe {
    /* display: none; */
    position: fixed;
    width: 50%;
    height: auto;
    background-image: url("https://i.pinimg.com/564x/51/1a/20/511a203da88f8738b47a66222f33352b.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    top: 10%;
    left: 25%;
    z-index: 9999;
}

@media only screen and (max-width: 768px) {
    .random_recipe {
        width: 100%;
        background-image: url("https://wc.wallpaperuse.com/wallp/93-937789_s.jpg");
        left: 0;
        top: 5.5%;
        z-index: 9999;
    }

    .random_recipe div.block:last-of-type {
        border-right: none;
    }

    .random_recipe .random .actions button {
        width: 100%;
        margin-bottom: 10px;
    }

    .random_recipe .rating {
        margin-bottom: 10px;
    }

    .btn-primary-perso {
        background: #0e8573;
    }
}

@media only screen and (min-width: 1200px) {
    .random_recipe {
        width: 50%;
        background-image: url("https://wc.wallpaperuse.com/wallp/93-937789_s.jpg");
        left: 25%;
        top: 10%;
        z-index: 9999;
    }
}
</style>
