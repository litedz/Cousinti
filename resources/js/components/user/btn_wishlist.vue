<template>
    <status ref="status_wishlist" :key="wishlist"></status>
    <div class=" btn-wishliste border border-danger first-color p-2 pointer rounded-circle" data-toggle="tooltip"
        data-placement="top" title="Add to wish List" @click="AddToWishList()">
        <span class="fa fa-heart-circle-plus"></span>
    </div>
</template>
<script scoped>
export default {
    props: ['recipe_id', 'user_id'],
    data() {
        return {
            
        }
    },
    methods: {
        AddToWishList() {
            let data = new FormData();
            data.append('user_id', this.user_id);
            data.append('recipe_id', this.recipe_id);
            axios({ method: "post", url: "/wishlist", data: data })
                .then((response) => {
                    if (response.data) {

                        this.types = response.data;
                        this.$refs.status_wishlist.Display('success', response.data.message, 'success', 'warning');
                    }
                })
                .catch((error) => {

                    this.$refs.status_wishlist.Display('danger', error.response.data.message, 'خطاء', 'exclamation-circle');
                });
        },
    },
}
</script>