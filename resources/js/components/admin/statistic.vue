<template>
    <div>

        <h1>welcome static</h1>

        <Line :data="info" :options="options" />

    </div>
</template>
<script>
import moment from 'moment';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, PointElement } from 'chart.js/auto'
import { Line } from 'vue-chartjs'

export default {
    components: { Line },
    mounted() {
        this.getUsers();
    },
    data() {
        return {
            users: '',
            info: {
                labels: [],
                datasets: [{
                    label: 'Users Stat',
                    data: [],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }],

            },
        }
    },
    methods: {
        getUsers() {
            axios({ method: "get", url: "/panel/static/users" })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            // console.log(moment('2012/12/12').format('d'));
                            this.users = response.data;
                            // this.info.datasets[0].data = response.data;
                            for (let index = 0; index < this.users.length; index++) {
                                this.info.labels[index] = moment(this.users[index][0].created_at).format('MMMM');
                                this.info.datasets[0].data[index] = this.users[index].length;
                            }

                            // console.log(moment().month(4));
                        }
                    }
                })
                .catch((error) => { });

        }
    }
}
</script>
<style></style>