<template>
    <status ref="status"></status>
    <div class=" btn-wishliste border border-danger first-color p-2 pointer rounded-circle" data-toggle="tooltip"
        data-placement="top" title="Add to wish List" @click="AddToWishList()">
        <span class="fa fa-heart-circle-plus"></span>
    </div>
</template>
<script>
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
                        this.$refs.status.Display('success', response.data.message, 'success', 'warning');
                    }
                })
                .catch((error) => {

                    this.$refs.status.Display('danger', error.response.data.message, 'danger', 'stop');
                });
        },
    },
}
</script>