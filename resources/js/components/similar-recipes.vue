<template>
    <div class="similar-recipes w-100 h-auto mt-5 overflow-auto" dir="rtl">
        <div class="outer w-100">
            <div class="h-25 img-container position-relative cover-type">
                <div
                    class="bg-black h-100 opacity-25 overlay-img-container position-absolute top-0 w-100"></div>
                <div class="align-items-center d-flex h-100 justify-content-center text-center">
                    <span class="bg-white fs-1 position-absolute px-5 round type">حلويات</span>
                </div>
            </div>
            <hr />
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col-12 col-md-4" id="item" v-for="recipe in sameRecipe" :key="recipe.same">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <img class="w-100 rounded" v-for="cover in recipe.images_recipe" :key="cover.recipe"
                                    :src="w_path + '/storage/recipes/' + cover.name" alt="" />
                                <div class="title font-weight-light font-amiri h3">
                                    <a :href="'/recipes/' + recipe.id" class="text-black-title text-decoration-none">{{
                                        recipe.name }}</a>
                                </div>
                                <div class="by d-flex gap-2">
                                    <div class="text-capitalize text-weight-500 text-black-50">
                                        الكاتب
                                    </div>
                                    <a class="mx-1 opacity-75 second-color text-decoration-none"
                                        :href="'/profile/' + recipe.author.id">{{ recipe.author.username }}</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="footer mt-5">
            <footer-page></footer-page>
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
                $(".item:nth-child(" + Math.floor(Math.random() * x) + 1 + ")"
                ).fadeToggle();
            }, 2000);
        },
        recipeSameType() {
            const data = new FormData();
            data.append("SearchBy", "type");
            axios({ method: "get", url: "/guest/filter/" + this.$attrs.type, data: data })
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

.similar-recipes .outer .section .title a:hover {
    color: #EF6F82;
    transition: all 0.5s;
}

.cover-type {
    background: url('/storage/types/default.png');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;
}</style>
