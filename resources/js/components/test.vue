<template>
    <div>
       <comments recipe_id="10"></comments>
       <footer-page></footer-page>

    </div>
</template>
<script>
export default {
    data() {
        return {
            info: {
                labels: ['January', 'February', 'March'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [40, 20, 12],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }],

            },

        }
    },
    methods: {

        test() {
            let data = new FormData();
            data.append('recipe_id', this.d)
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