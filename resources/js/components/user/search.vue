<template>
    <div class="d-flex align-items-center position-relative w-100 wrapper-search" dir="rtl">
        <span class="fa fa-search mx-1 p-2 position-absolute rounded-circle start-0 third-color" style="
    width: 30px;
    height: auto;
"></span>
        <input class="form-control w-100" v-on:keyup="search()" v-model="text_search" type="search" name="search"
            placeholder="البحث عن وصفة . . ." />
        <div class="search-found z-9999" style="">
            <div class="recipes bg-light d-flex flex-column position-absolute rounded start-0 top-100 w-100 p-3"
                v-if="recipes_found.length !== 0" dir="rtl" style="height: auto; overflow-y: auto">
                <div class="border-bottom close pb-2 start-0 top-0 w-100"><span
                        class="fa fa-remove fs-6 p-1 pointer px-2 rounded-circle text-danger" @click="CloseSearch()"></span>
                </div>
                <div class="bg-light border-bottom d-flex mt-1 pb-2" v-for="recipe in recipes_found" :key="recipe.found">
                    <div class="image w-25">
                        <a :href="'/recipes/' + recipe.id">
                            <img class="rounded w-100" :src="w_path + '/storage/recipes/' + recipe.images_recipe[0].name"
                                alt="" /></a>
                    </div>
                    <div class="info-recipe d-flex flex-column mx-3 w-100">
                        <div class="title fw-bolder">
                            <a :href="'/recipes/' + recipe.id" class="text-decoration-none text-black-title">{{ recipe.name
                            }}</a>
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
        window.addEventListener("mousemove", this.ScrollRecipes);

    },
    unmounted() {
        window.removeEventListener("mousemove", this.ScrollRecipes);
    },
    data() {
        return {
            text_search: '',
            recipes_found: '',
        }
    },
    methods: {
        ScrollRecipes() {
            let Height_Search_area = document.querySelector('.wrapper-search').scrollHeight;
            if (Height_Search_area > 500) {
                $('.wrapper-search .recipes').css('height', '500px');
            }
            else {
                $('.wrapper-search .recipes').css('height', 'auto');
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
        CloseSearch() {
            this.text_search = ''
            this.recipes_found = '';

        }
    },
};
</script>

<style></style>