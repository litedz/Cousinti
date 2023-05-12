<template>
    <div>
        <input type="text" name="text" v-model="d" />
        <button classs="btn btn-primary btn-lg m-4" @click="test()">Clcik me </button>

    </div>
</template>
<script>
export default {

    data() {
        return {
            d: '',
        }
    },
    methods: {

        test() {
            let data = new FormData();
            data.append('recipe_id',this.d)
            data.append("_method", "DELETE");
            axios({
                method: 'post',
                url: 'panel/recipes/delete',
                data: data,
            }).then((Response) => {

            });
        },
    }
}
</script>
<style></style>