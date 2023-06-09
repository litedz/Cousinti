<template>
    <section class="last-activity">
        <span class="fs-2"> Last activity</span>
        <div class="bg-white shadow">
            <div v-for="activity in lastActivitys">
                <div class="activity border-bottom d-flex flex-column p-1 p-3 rounded" v-if="activity.comment">
                    <div class="fst-italic text-muted title">Comment</div>
                    <div class=" d-flex">"{{ activity.comment }}" <div class=""> <span class="fw-bolder mx-1">In :</span><a
                                :href="'/recipes/' + activity.recipe.id">{{ activity.recipe.name }}</a></div>
                    </div>
                    <div>
                        <span class="fa-clock fa-regular"></span>
                        <span class="font-italic fs-6 text-muted">{{ formateData(activity.created_at) }}</span>

                    </div>
                </div>
                <div class="activity border-bottom d-flex flex-column p-1 p-3 rounded" v-else>
                    <div class="fst-italic text-muted title">Recipe</div>
                    <div class="">
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
    },
    activated(){
        this.GetLastActivity();
    },
    data() {
        return {
            lastActivitys: [],
        }
    },
    methods: {
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
<style scoped></style>