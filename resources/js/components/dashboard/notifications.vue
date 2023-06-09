<template>
    <status ref="status"></status>
    <div class="container">
        <div class="row">
            <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                    <h6 class="fs-1 m-0">Notifications </h6>
                </div>
                <div class="box-body p-0">
                    <div class="alert alert-primary text-center" v-if="notifications.length == 0">
                        <span class="fs-3">You dont have any notification</span>
                    </div>
                    <div class="align-items-center border-bottom d-flex gap-2 osahan-post-header p-3"
                        v-for="not in notifications">
                        <div v-if="not.type == 'Recipe' || not.type == 'like' || not.type == 'comment'"
                            class="dropdown-list-image bg-danger p-2 px-3 rounded-circle text-capitalize text-white">
                            {{ not.type.charAt(0) }}
                        </div>
                        <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" v-else alt=""
                            width="60" height="60">
                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate">{{ not.subject }}</div>
                            <div class="small">{{ not.message }}
                            </div>
                        </div>
                        <span class="ml-auto mb-auto position-relative">
                            <div class="btn-group end-0 position-absolute">
                                <button type="button" class="btn btn-light btn-sm rounded"
                                    @click="DeleteNotification(not.id)">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </div>
                            <br />
                            <div class="text-right text-muted pt-1">{{ formateDate(not.created_at) }}</div>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getNotifications();
        setInterval(() => {
            this.getNotifications();
        }, 10000);
    },
    data() {
        return {
            notifications: '',
        }
    },
    methods: {
        getNotifications() {
            axios.get("/user/notifi/" + this.$attrs.user.id)
                .then((response) => {
                    if (response.data) {
                        this.notifications = response.data;
                    }
                })
                .catch((error) => { });

        },
        DeleteNotification(notification_id) {
            let data = new FormData();

            data.append("notification_id", notification_id);
            data.append("_method", "DELETE");
            axios.post('/user/notifi/' + notification_id, data).then((response) => {
                if (response.data) {
                    this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                    this.getNotifications();
                }
            })
                .catch((error) => { });

        },
    },
}
</script>
<style></style>