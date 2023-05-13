<template>
    <div class="wishlist position-fixed w-100 h-100 top-0 start-0 z-9999">
        
        <div class="overlay w-100 h-100 position-absolute opacity-50 bg-dark z-7777"></div>
        <div class="bg-light h-100 mt-2 mx-auto position-relative w-75 z-8888">
            <span class="bg-gray fa fa-remove m-2 p-1 position-absolute px-2 remove rounded-circle text-danger pointer"
                @click="$emit('closeWishlist')"></span>
            <div class="container">

                <div class="border-bottom flex-center gap-2 header mb-2">
                    <div class="fs-3 title">WISH LIST </div><span class="fa fa-list-check fs-4 text-green"></span>
                </div>
                <div class="recipes">
                    <div class="row">
                        <div class="col-3" v-for="item in wishList">
                            <div class="recipe">
                                <img-hoverable 
                                :title="item.recipe[0].name" 
                                :urlFile="'recipes/'+item.recipe_id"
                                :level="item.recipe[0].level" 
                                :time="item.recipe[0].how_long"
                                :image="item.recipe[0].images_recipe[0].name">
                            </img-hoverable>
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
    props: ['showList'],
    mounted() {
        this.GetWishList();
    },
    activated() {
       this.GetWishList();
    },
    data() {
        return {
            wishList: '',
        }
    },
    methods: {

        GetWishList() {

            axios({ method: "get", url: "/wishlist/" + this.$attrs.user_id })
                .then((response) => {
                    if (response.data) {

                        this.wishList = response.data.WishList;
                    }
                })
                .catch((error) => { });
        },

    },
}
</script>