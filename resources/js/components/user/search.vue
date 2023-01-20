<template>
    <div class="d-flex align-items-center position-relative w-100"
         dir="rtl">
        <span class="fa fa-search position-absolute start-0 bg-info p-2 rounded-circle mx-1 text-black-50"></span>
        <input class="form-control w-100"
               v-on:keyup="search()"
               v-model="text_search"
               type="search"
               name="search"
               placeholder="البحث عن وصفة . . ." />
        <div class="search-found z-9999"
             style="">
            <div class="recipes bg-light d-flex flex-column position-absolute rounded start-0 top-100 w-100 p-3"
                 v-if="recipes_found.length !== 0"
                 dir="rtl"
                 style="height: 250px; overflow-y: auto">
                <div class="bg-light border-bottom d-flex mt-1 pb-2"
                     v-for="recipe in recipes_found"
                     :key="recipe.found">
                    <div class="image w-25">
                        <a href="#">
                            <img class="rounded w-100"
                                 :src="w_path + '/storage/recipes/' + recipe.images_recipe[0].name"
                                 alt="" /></a>
                    </div>
                    <div class="info-recipe d-flex flex-column mx-3 w-100">
                        <div class="title fw-bolder">
                            <a href="#"
                               class="text-decoration-none text-black-title">{{ recipe.name }}</a>
                        </div>
                        <div class="how_todo text-black-50">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    inject: ['w_path'],
    mounted() {
        window.addEventListener("scroll", this.wheneScroll);
    },
    unmounted() {
        window.removeEventListener("scroll", this.wheneScroll);
    },
    data() {
        return {
            text_search: "",
            recipes_found: '',
        }
    },
    methods: {
        wheneScroll() {
            if ($(window).scrollTop() > 300) {
                $(".search-bar").css({
                    position: "fixed",
                    top: "0",
                });
            } else {
                $(".search-bar").css({
                    position: "relative",
                });
            }
        },
        search(key) {
            if (this.text_search.length !== 0) {
                axios({
                    method: "post",
                    url: "/guest/search/" + this.text_search,
                })
                    .then((response) => {
                        if (response.data) {
                            this.recipes_found = response.data;
                        }
                    })
                    .catch((error) => { });
            }
            else {
                this.recipes_found = "";
            }
        },
    },
};
</script>

<style>

</style>