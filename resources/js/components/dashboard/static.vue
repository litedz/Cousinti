<template>
    <section class="static container-fluid">
        <div class="justify-content-center mb-2 row">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class="px-3 py-3 d-flex justify-content-between">
                                <span class="card-title fa fa-heart fs-2 text-danger"></span>
                                <div class="align-items-center card-right d-flex gap-2">
                                    <p class="fw-semibold">Likes </p>
                                    <p>{{ Object.keys(this.likes).length }} </p>
                                </div>
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
                                <span class="card-title fa fa-heart fs-2 text-info"></span>
                                <div class="align-items-center card-right d-flex gap-2">
                                    <p class="fw-semibold">Comments </p>
                                    <p>{{Object.keys(this.comments).length }} </p>
                                </div>
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
                                <span class="card-title fa fa-heart fs-2 text-info"></span>
                                <div class="align-items-center card-right d-flex gap-2">
                                    <p class="fw-semibold">Recipes </p>
                                    <p>{{Object.keys(this.recipes).length }} </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-112 col-md-4 p-1 bg-white m-0">
                <Line :data="staticRecipes" :options="options.recipes" />
            </div>
            <div class="col-12 col-md-4 p-1 bg-white m-0">
                <Bar :data="staticComments" :options="options.comments" />
            </div>
            <div class="col-12 col-md-4 p-1 bg-white m-0">
                <Line :data="staticLikes" :options="options.likes" />
            </div>

        </div>

    </section>
</template>
<script>

import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, PointElement } from 'chart.js/auto'
import { Line } from 'vue-chartjs'
import { Bar } from 'vue-chartjs'
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
    components: { Line, Bar },
    data() {
        return {
            likes: '',
            comments: '',
            recipes: '',
            staticRecipes: {
                labels: months,
                datasets: [
                    {
                        label: 'Recipes',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(239 111 130)',
                        tension: 0.1,
                        beginAtZero: true,
                        fill: 1,
                    },
                ],
            },
            staticComments: {
                labels: months,
                datasets: [
                    {
                        label: 'Comments',
                        data: [],
                        fill: false,
                        backgroundColor: ['rgba(255, 205, 86, 0.2)'],
                        tension: 0.1,
                        borderWidth: 2,
                    }],

            },
            staticLikes: {
                labels: months,
                datasets: [
                    {
                        label: 'Likes',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        beginAtZero: true,
                        fill: -1,
                    }],
            },
            options: {
                comments: {
                    plugins: {
                        legend: {
                            display: true,
                        }

                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
                recipes: {
                    plugins: {

                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
                likes: {
                    plugins: {

                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            }
        }
    },
    methods: {
        staticUser() {

            axios({ method: "get", url: "/user/statistic/" + this.$attrs.auth_id }).then((response) => {
                this.likes = response.data.likes;
                this.comments = response.data.comments;
                this.recipes = response.data.recipes;

                for (let index = 0; index < Object.values(this.recipes).length; index++) {
                    this.staticRecipes.datasets[0].data[moment(Object.keys(this.recipes)[index]).month()] = Object.values(this.recipes)[index].length;
                }
                for (let index = 0; index < Object.values(this.likes).length; index++) {
                    this.staticLikes.datasets[0].data[moment(Object.keys(this.likes)[index]).month()] = Object.values(this.likes)[index].length;
                }
                for (let index = 0; index < Object.values(this.comments).length; index++) {
                    this.staticComments.datasets[0].data[moment(Object.keys(this.comments)[index]).month()] = Object.values(this.comments)[index].length;
                }

            });
        },
    },
}
</script>