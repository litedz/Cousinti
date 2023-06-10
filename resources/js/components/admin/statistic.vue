<template>
    <div>

        <h1>Users Stat</h1>
        <Line :data="infoUsers" ref="usersStat" class=""/>
        <h1>Recipes Stat</h1>
        <Line :data="infoRecipes"  ref="RecipesStat"/>

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
        this.getRecipes();
    },
    data() {
        return {
            users: '',
            recipes:'',
            infoUsers: {
                labels: [],
                datasets: [{
                    label: 'Users Stat',
                    data: [],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }],

            },
            infoRecipes: {
                labels: [],
                datasets: [{
                    label: 'Recipes Stat',
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
                                this.infoUsers.labels[index] = moment(this.users[index][0].created_at).format('MMMM');
                                this.infoUsers.datasets[0].data[index] = this.users[index].length;
                            }

                            // console.log(moment().month(4));
                        }
                    }
                })
                .catch((error) => { });

        },
        getRecipes() {
            axios({ method: "get", url: "/panel/static/recipes" })
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.recipes = response.data;
                            for (let index = 0; index < this.users.length; index++) {
                                this.infoRecipes.labels[index] = moment(this.recipes[index][0].created_at).format('Do');
                                this.infoRecipes.datasets[0].data[index] = this.recipes[index].length;
                            }
                        }
                    }
                })
                .catch((error) => { });

        },
    }
}
</script>
<style></style>