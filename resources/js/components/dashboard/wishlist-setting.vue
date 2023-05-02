<template>
    <status ref="status"></status>
    <table class="bg-white mx-auto shadow table w-75">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col" class="border-bottom px-5">Recipe</th>
                <th scope="col" class="text-center border-bottom">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in wishList">
                <td class="px-5"><a :href="w_path + '/recipes/' + item.recipe_id" class="text-black-title">{{
                    item.recipe[0].name }}</a></td>
                <td class="text-center">
                    <li class="fa fa-trash-can fs-4 pointer text-danger" @click="removeFromWishList(item.recipe_id)"></li>
                </td>
            </tr>

        </tbody>
    </table>
</template>



<script>
export default {
    inject: ['w_path'],
    mounted() {
        this.GetWishList();
    },
    activated(){
        this.GetWishList();
    },
    data() {
        return {
            wishList: '',
        }
    },
    methods: {
        GetWishList() {

            axios({ method: "get", url: "/wishlist/" + this.$attrs.auth_id })
                .then((response) => {
                    if (response.data) {

                        this.wishList = response.data.WishList;
                    }
                })
                .catch((error) => { });
        },
        removeFromWishList(recipe_id) {
            let data = new FormData();
            data.append('recipe_id', recipe_id);
            data.append("_method", "DELETE");
            axios({ method: "POST", url: "/wishlist/" + this.$attrs.auth_id, data: data })
                .then((response) => {
                    if (response.data) {

                        this.types = response.data;
                        if (response.data.message == 'Deleted') {
                            this.GetWishList();
                        }
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
<style scoped></style>