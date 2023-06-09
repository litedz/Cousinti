<template>
    <div>
        <status ref="status"></status>
        <main role="main" class="container bootdey.com">
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-default rounded box-shadow">
                <img class="mr-3" :src="w_path+'/storage/'+this.$attrs.user.avatar" width="150" height="150">
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">{{this.$attrs.user.username}}</h6>
                    <small>Messages</small>
                </div>
            </div>

            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Recent Messages</h6>

                <div class="aler alert-warning bg-gradient p-3 text-center" v-if="messages.length == 0">
                    <div class="fs-3"> You dont have any message</div>
                </div>
                <div v-for="msg in messages">
                    <div class="d-grid gap-2 media pt-3 text-muted position-relative" v-if="msg.from_id !== null">
                        <div class="d-flex gap-2">

                            <img :src="w_path + '/storage/' + msg.from_user.avatar" alt="" class="mr-2 rounded-circle"
                                width="32" height="32">
                            <strong class="d-block text-gray-dark"> <a :href="'/profile/' + msg.from_user.id">
                                    {{ msg.from_user.username }}</a></strong>
                        </div>


                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">

                            {{ msg.message }}
                        </p>
                        <button class="btn btn-danger d-flex end-0 flex-center gap-2 m-2 position-absolute"
                            @click="DeleteMessage(msg.id)"><span class="fa fa-trash"></span>Remove</button>
                    </div>
                    <!-- Message from unknown -->
                    <div class="d-grid gap-2 media pt-3 text-muted position-relative" v-else>
                        <div class="d-flex gap-2">
                            <img :src="'https://ui-avatars.com/api/?name='+msg.from" alt="" class="mr-2 rounded-circle" width="32"
                                height="32"> <strong class="d-block text-gray-dark">{{ msg.from }}</strong>
                        </div>

                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            {{ msg.message }}
                        </p>
                        <button class="btn btn-danger d-flex end-0 flex-center gap-2 m-2 position-absolute"
                            @click="DeleteMessage(msg.id)"><span class="fa fa-trash"></span>Remove</button>
                    </div>
                </div>


            </div>
        </main>
    </div>
</template>
<script>
export default {
    inject: ['w_path'],
    mounted() {
        this.getMessages();
    },
    data() {
        return {
            messages: '',
        }
    },
    methods: {
        getMessages() {
            let data = new FormData();
            data.append('user_id', this.$attrs.auth_id)
            axios.get('/messages/' + this.$attrs.auth_id, data).then((Response) => {
                this.messages = Response.data;
            });
        },

        DeleteMessage(message_id) {
            let data = new FormData();

            data.append("message_id", message_id);
            data.append("_method", "DELETE");
            axios.post('messages/' + message_id, data).then((response) => {
                if (response.data) {
                    this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                    this.getMessages();
                }
            })
                .catch((error) => { });

        },
    },
}
</script>
<style scoped>
.text-white-50 {
    color: rgba(255, 255, 255, .5);
}

.bg-blue {
    background-color: #00b5ec;
}

.border-bottom {
    border-bottom: 1px solid #e5e5e5;
}

.box-shadow {
    box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
}
</style>