<template>
    <section class="last-activity">
        <h1> Last activity</h1>
        <div class="bg-white shadow">
            <div v-for="activity in lastActivitys">
                <div class="activity border-bottom d-flex flex-column p-1 p-3 rounded" v-if="activity.comment">
                    <div class="fst-italic text-muted title">Comment</div>
                    <div class="content d-flex">"{{ activity.comment }}" <div class="">a : <a
                                :href="'/recipes/' + activity.recipe.id">{{ activity.recipe.id }}</a></div>
                    </div>
                    <div>
                        <span class="fa-clock fa-regular"></span>
                        <span class="font-italic fs-6 text-muted">{{ formateData(activity.created_at) }}</span>

                    </div>
                </div>
                <div class="activity border-bottom d-flex flex-column p-1 p-3 rounded" v-else>
                    <div class="fst-italic text-muted title">Recipe</div>
                    <div class="content">
                        <a :href="'/recipes/' + activity.id" class="fs-3 text-success">{{ activity.name }} </a>

                        <div>
                            <span class="fa-clock fa-regular"></span>
                            <span class="font-italic fs-6 text-muted">{{ formateData(activity.created_at) }}</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import moment from "moment";
export default {
    mounted() {
        this.GetLastActivity();
    },
    data() {
        return {
            lastActivitys: [],
        }
    },

    computed: {
        ss: function () {

            // return this.lastActivitys.sort((a, b) => {
            //     if (a.created_at < b.created_at) {
            //         return -1;
            //     }
            //     if (a.created_at > b.created_at) {
            //         return 1;
            //     }
            //     // a must be equal to b
            //     return 0;
            // });
        },
    },

    methods: {
        sortedByDate(Activitys) {
            return this.lastActivitys.sort(function compareFn(a, b) {
                if (a.created_at > b.created_at) {
                    return -1;
                }
                if (a.created_at < b.created_at) {
                    return 1;
                }
                // a must be equal to b
                return 0;
            }
            );
            // for (let index = 0; index < Activitys.length; index++) {

            //     if (index == 0) {
            //         this.lastActivitys[index] = Activitys[index];
            //     }
            //     else {

            //         if (Activitys[index].created_at < Activitys[index - 1].created_at) {

            //             this.lastActivitys[index] = Activitys[index];

            //         } else {

            //             this.lastActivitys[index] = Activitys[index];
            //         }
            //     }
            // }


        },
        formateData(created_at, form) {
            return moment(created_at, true).format(form);
        },
        GetLastActivity() {
            axios.get("/user/lastActivity")
                .then(response => {
                    this.lastActivitys = response.data;
                })
                .catch((error) => {
                    // console.log(error.response.errors);
                });
        }
    }
}
</script>
<style></style>