<template>
    <section class="static container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class="px-3 py-3 d-flex justify-content-between">
                                <h3 class="card-title">Likes</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ Object.keys(this.likes).length }} </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class="px-3 py-3 d-flex justify-content-between">
                                <h3 class="card-title">Comments</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ Object.keys(this.comments).length }}</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas2" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class="px-3 py-3 d-flex justify-content-between">
                                <h3 class="card-title">Your Recipe</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>{{ Object.keys(this.recipes).length }} </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas3" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-6">
                <Line :data="infoUsers" ref="usersStat" />
            </div>
        </div>

    </section>
</template>
<script>

import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, PointElement } from 'chart.js/auto'
import { Line } from 'vue-chartjs'
import months from 'months';
import moment from 'moment';

export default {
    mounted() {
        setInterval(() => {
            this.staticUser();
        }, 10000)
    },
    activated() {
        this.staticUser();
    },
    components: { Line },
    data() {
        return {
            likes: '',
            comments: '',
            recipes: '',

            infoUsers: {
                labels: months,
                datasets: [
                    {
                        label: 'Recipes Static',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(239 111 130)',
                        tension: 0.1,
                    },
                    {
                        label: 'Liked Static',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    },
                    {
                        label: 'Comments Static',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(53 50 102)',
                        tension: 0.1
                    }
                ],

            },
        }
    },
    methods: {
        staticUser() {

            axios({ method: "get", url: "/user/statistic/" + this.$attrs.auth_id }).then((response) => {
                this.likes = response.data.likes;
                this.comments = response.data.comments;
                this.recipes = response.data.recipes;

                for (let index = 0; index < Object.values(this.recipes).length; index++) {
                    this.infoUsers.datasets[0].data[moment(Object.keys(this.recipes)[index]).month()] = Object.values(this.recipes)[index].length;
                }
                for (let index = 0; index < Object.values(this.likes).length; index++) {
                    this.infoUsers.datasets[1].data[moment(Object.keys(this.likes)[index]).month()] = Object.values(this.likes)[index].length;
                }
                for (let index = 0; index < Object.values(this.comments).length; index++) {
                    this.infoUsers.datasets[2].data[moment(Object.keys(this.comments)[index]).month()] = Object.values(this.comments)[index].length;
                }

            });
        },
    },
}
</script>