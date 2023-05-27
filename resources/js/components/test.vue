<template>
    <div>
        <Line :data="info" :options="options" />

    </div>
</template>
<script>
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, PointElement } from 'chart.js/auto'
import { Line } from 'vue-chartjs'
import { Bar } from 'vue-chartjs'
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend, PointElement)
export default {
    components: { Line },
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