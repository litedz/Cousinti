<template>
    <status ref="status"></status>
    <div class="add-message bg-white shadow-sm">
        <div class="title">
            <h1 class="text-capitalize text-center">send message</h1><!--v-if-->
        </div>
        <div class="content d-grid gap-2 p-3">
            <div class="d-grid gap-1 select-area w-25">
                <label class="select-label">Select Option (Send to ) :</label>
                <select class="form-select" v-model="selectSend">
                    <option value="all-user" @select="sendToAll = true">All Users</option>
                    <option value="user" @select="sendToAll = false">Specific user</option>
                </select>
            </div>
            <hr>

            <form class="d-grid form-group gap-2">
                <div v-if="username.length !== 0">
                    <label for="subject">To :</label>
                    <input type="text" name="User" class="form-control" placeholder="To User " v-model="username">
                </div>
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control" placeholder="Subject ......" v-model="subject">
                <label for="subject">Message</label>
                <textarea class="form-control" placeholder="Message . . . ." v-model="body">
        </textarea>
                <button type="button" @click="SendMessage()" class="btn-primary btn">Send</button>
            </form>
        </div>
        <div class="bg-gray d-grid gap-2 left-25 p-5 position-fixed table-users top-0 w-50 h-75"
            style="overflow-y: auto;overflow-x: hidden;" v-if="show_table_user">
            <div class="m-2 position-absolute w-100">
                <span class="bg-white fa fa-remove p-1 px-2 rounded-4 pointer" @click="show_table_user = false"></span>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="search . . ." class="form-control">
            </div>
            <table class="bg-white table table-hover">
                <thead class="bg-gray-700 text-white">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="w-1">Select</th>
                    </tr>
                </thead>

                <tbody>

                    <tr v-for="user in users">
                        <td>{{ user.username }}</td>
                        <td>{{ user.email }}</td>
                        <td class="">
                            <button type="button" class="btn btn-primary" @click="SelectUser(user)">Select
                                <span class="badge"></span></button>
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</template>
<script>
export default {

    mounted() {
        this.getUsers();
    },
    data() {
        return {
            emailSelected: '',
            username:'',
            subject: '',
            body: '',
            selectSend: '',
            show_table_user: false,
            users: '',
            filtredUsers: '',
            user_id: '',
            sendToAll: false,

        }
    },
    watch: {
        selectSend: {
            handler() {
                if (this.selectSend == 'user') {
                    this.show_table_user = true;
                    this.selectSend = '';
                    this.sendToAll = false;
                }
                else if (this.selectSend == 'all-user') {
                    this.sendToAll = true;
                    this.username = '';
                }

            },
        },
        sendToAll:{
            handler(){
          //
            }
        }

    },
    methods: {
        SendMessage() {
            let data = new FormData();
            data.append("subject", this.subject);
            data.append("body", this.body);
            data.append("user_id", this.user_id);
            data.append("sendToAll", this.sendToAll);
            // data.append("_method", "PUT");
            axios.post("/panel/admin_message/message/sending", data)
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.$refs.status.Display('success', response.data.message, 'Done', 'check');
                            this.ResetField();
                        }
                    }
                })
                .catch((error) => {
                    this.$refs.status.Display('danger', error.response.data.message, 'status', 'stop');

                });
        },
        searchUser() {

        },
        getUsers() {
            axios.get("/panel/users")
                .then((response) => {
                    if (response.data) {
                        if (response.data) {
                            this.users = response.data.users;
                        }
                    }
                })
                .catch((error) => {
                    this.$refs.status.Display('danger', error.response.data.message, 'status', 'stop');

                });
        },
        SelectUser(user) {
            this.user_id = user.id;
            this.username =user.username;
            this.show_table_user = false;
        },
        // reset field
        ResetField(){
            this.subject = '',
            this.body = '',
            this.show_table_user = false,
            this.username ='';
            this.selectSend ='';
        }
    },
}
</script>
<style></style>