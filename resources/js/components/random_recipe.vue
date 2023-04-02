<template>
    <div class="random_recipe pb-5 pt-2 rounded" style="padding: 7%;">
        <div class="position-fixed w-100 h-100 end-0 top-0 bg-dark opacity-50 z-8888"></div>
        <div class="container position-relative bg-light" style="z-index: 9999;">

            <div class="end-0 m-1 position-absolute remove pointer text-right text-white top-0" style="z-index: 9999;">
                <div class="bg-primary-color rounded-circle text-center text-white" style="width: 30px; height: 30px;">
                    <i class="bg-dark bg-gradient fa fa-remove p-1 px-2 rounded-circle" aria-hidden="true"
                        @click="$emit('CloseRecipe')"></i>
                </div>
            </div>
            <div class="row">
                <div class="border-bottom col-12 font-22 font-weight-bolder p-2 text-center title w-100 first-color ">
                    <a class="text-decoration-none" :href="'/recipes/' + random_recipe.id">{{ random_recipe.name
                    }}</a>
                </div>
                <div class="img-recipe-container col-12 p-0 img-fluid mt-3 rounded text-center position-relative">
                    <img v-for="cover in random_recipe.images_recipe" :key="cover.recipe"
                        :src="w_path + '/storage/recipes/' + cover.name" class="w-100 rounded" alt="" srcset="">
                    <div class="overlay w-100 h-100 bg-first-color position-absolute top-0"></div>
                    <div
                        class="info-recipe align-items-center d-flex gap-4 justify-content-center position-absolute top-50 w-100">
                        <div class="time d-flex align-items-center gap-2 text-white">
                            <span>23 min</span>
                            <span class="fa fa-clock"></span>
                        </div>
                        <div class="like d-flex align-items-center gap-2 text-white">
                            <span>25</span>
                            <span class="fa fa-heart"></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="bg-light  info m-auto mt-2 rounded p-3">
                        <div class="random ">
                            <div class="row align-items-end">
                                <div class="rating col-12 col-sm-12 col-md-6 m" dir="rtl">
                                    <div class="d-flex flex-column gap-2 h6 justify-content-between">
                                        <div class="fs-3 fw-bolder text-black-title font-amiri">نسبة النجاح</div>
                                        <div class="text-muted">نسبة النجاح مبنية علي عدد اعجابات المستخديمن</div>
                                    </div>
                                    <div class="progress" style="height: 20px">
                                        <div class="bg-success fs-6 fw-bolder progress-bar progress-bar-striped"
                                            role="progressbar" :style="'width:' + this.rating + '%;'" aria-valuemin="0"
                                            aria-valuemax="100">{{ this.rating }}%</div>
                                    </div>
                                </div>
                                <div class="actions d-flex text-center col-12 col-sm-12 col-md-6">
                                    <a @click="getRandomRecipe()" dir="rtl"
                                        class="align-items-center bg-second-color btn btn-primary d-flex fw-bold gap-2 justify-content-center m-1 p-mb-sc-0 text-white w-50"
                                        style="background-color: #168272; border:#168272;width:40%">
                                        <span>تغيير</span>
                                        <li class="fa fa-rotate fa-2xs"></li>
                                    </a>
                                    <a :href="'/recipes/' + random_recipe.id" dir="rtl"
                                        class="align-items-center bg-first-color btn btn-primary d-flex fw-bold gap-2 justify-content-center m-1 p-mb-sc-0 text-white w-50"
                                        style="width: 40%;">
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
    activated() {
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
    top: 10%;
    left: 25%;
    z-index: 9999;
}

.random_recipe .img-recipe-container .overlay,
.info-recipe {
    opacity: 0;
    transition: all 1s;
}

.random_recipe .img-recipe-container:hover .overlay,
.info-recipe {
    opacity: 0.75 !important;
    transition: all 0.5;
}

@media only screen and (max-width: 768px) {
    .random_recipe {
        width: 100%;
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
        left: 25%;
        top: 10%;
        z-index: 9999;
    }
}
</style>
