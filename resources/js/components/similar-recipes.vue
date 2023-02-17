<template>

    <div class="similar-recipes w-100 h-auto mt-5 overflow-auto"
         dir="rtl">
        <div class="outer mx-auto w-75">
            <div class="h1 font-amiri text-black-title"></div>
            <hr />
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col-6 col-xs-3 col-md-4" id="item" v-for="recipe in sameRecipe"
                             :key="recipe.same">
                            <div class="d-flex flex-column align-items-center">
                                <img class="w-75 rounded"
                                     v-for="cover in recipe.images_recipe"
                                     :key="cover.recipe"
                                     :src="w_path + '/storage/recipes/' + cover.name"
                                     alt="" />
                                <div class="title font-weight-light font-amiri h3 mt-3">
                                    <a :href="'/recipes/' + recipe.id"
                                       class="text-decoration-none text-first">{{ recipe.name }}</a>
                                </div>
                                <div class="by d-flex">
                                    <div class="text-capitalize text-weight-500 text-black-50">
                                        الكاتب
                                    </div>
                                    <a class="text-decoration-none text-info mx-1"
                                       href="#">{{ recipe.author.username }}</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    inject: ["w_path"],
    mounted() {
        this.recipeSameType();
        // this.random_show();
    },
    data() {
        return {
            sameRecipe: '',
        };
    },
    methods: {
        random_show() {
            setInterval(() => {
                let x = document.querySelectorAll("#item").length;
                $(
                    ".item:nth-child(" + Math.floor(Math.random() * x) + 1 + ")"
                ).fadeToggle();
            }, 2000);
        },
        recipeSameType() {
            const data = new FormData();
            data.append("SearchBy", "type");
            axios({ method: "post", url: "/guest/filter/" + this.$attrs.type, data: data })
                .then((response) => {
                    console.log(response);
                    if (response.data) {

                        this.sameRecipe = response.data;
                    }
                })
                .catch((error) => { });
        },
    },
};
</script>

<style scoped>
.similar-recipes .outer .row #item {
    transition: all;
    height: auto;
}

.similar-recipes .outer .section .row div.middle-col {
    margin-top: 3rem;
}
</style>
