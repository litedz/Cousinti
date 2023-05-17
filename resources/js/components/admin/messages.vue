<template>
    <div class="messages">
        <status ref="status"></status>
        <h1 class="border-bottom">Messages </h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="chat_container">
                        <div class="job-box">
                            <div class="job-box-filter">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="filter-search-box text-right">
                                            <label>Search:<input type="search" class="form-control input-sm" placeholder=""
                                                    v-model="searchValue"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="inbox-message">
                                <ul>
                                    <li v-for="msg in MessagesFilted">
                                        <div>
                                            <div class="message-avatar">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    <h5>{{ msg.from_user.username }}
                                                        <!-- <span class="unread">Unread</span> -->
                                                    </h5>
                                                    <span>{{ formateDate(msg.created_at) }}</span>
                                                </div>
                                                <p>{{ msg.body }}</p>
                                                <div class="align-items-baseline d-flex gap-1 pointer"
                                                    @click="ReplyMessageForm(msg.from_user)">
                                                    <span class="fa fa-reply text-first"></span>
                                                    <span>Reply</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-700 form-reply left-25 p-3 position-fixed rounded-1 top-25 w-50" v-if="Show_form_reply">
            <div class="w-100">
                <span class="bg-white fa fa-remove p-1 pointer px-2 rounded-circle text-right"
                    @click="Show_form_reply = false"></span>
            </div>
            <form action="" class="bg-light d-grid gap-2 mx-auto p-4 rounded-1 w-50">
                <label for="reply">Reply To : <span class="fw-bolder">test</span>
                </label>
                <input type="text" class="form-control" name="subject" v-model="Reply.subject">
                <label for="body">Message</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control" v-model="Reply.body"></textarea>
                <button type="button" class="btn btn-lg btn-primary" @click="ReplyMessage()"
                    :disabled="DisplayReplyButton">Reply</button>
            </form>
        </div>
    </div>
</template>
<script>
export default {

    mounted() {
        this.getMessagesAdmin();
    },
    data() {
        return {
            searchValue: '',
            messages: '',
            MessagesFilted: '',
            Reply: {
                body: '',
                subject: '',
            },
            Show_form_reply: false,
            ReplyToUser: '',
            DisplayReplyButton: false,
        }
    },
    watch: {
        searchValue: {
            handler() {
                this.sortByValue();
            },
        }
    },
    methods: {
        getMessagesAdmin() {
            axios.get('admin_messages').then((response) => {
                this.messages = response.data;
                this.MessagesFilted = this.messages;
            });

        },

        sortByValue() {
            this.MessagesFilted = Object.values(this.messages).filter((message) => message.body.match(this.searchValue));
        },
        ReplyMessageForm(user) {
            this.Show_form_reply = true;
            this.ReplyToUser = user;
        },
        ReplyMessage() {
            let data = new FormData();
            data.append('body', this.Reply.body);
            data.append('subject', this.Reply.subject);
            data.append('to_user_id', this.ReplyToUser.id);
            data.append('to_email', this.ReplyToUser.email);
            this.DisplayReplyButton = true;
            axios.post('/panel/messages/Reply', data).then((response) => {
                console.log(response);
                this.$refs.status.Display('success', response.data.message, 'status', 'info');
                this.Reply.body = '';
                this.Reply.subject = '';
                this.DisplayReplyButton = false;
            }).catch((error) => {

                this.$refs.status.Display('danger', error.response.data.message, 'warning', 'warning');
            });

        },
    },
}
</script>
<style>
.job-box-filter label {
    width: 100%;
}

.job-box-filter select.input-sm {
    display: inline-block;
    max-width: 120px;
    margin: 0 5px;
    border: 1px solid #e8eef1;
    border-radius: 2px;
    height: 34px;
    font-size: 15px;
}

.job-box-filter label input.form-control {
    max-width: 200px;
    display: inline-block;
    border: 1px solid #e8eef1;
    border-radius: 2px;
    height: 34px;
    margin-left: 5px;
    font-size: 15px;
}

.text-right {
    text-align: right;
}

.job-box-filter {
    padding: 12px 15px;
    background: #ffffff;
    border-bottom: 1px solid #e8eef1;
    margin-bottom: 20px;
}

.job-box {
    background: #ffffff;
    display: inline-block;
    width: 100%;
    padding: 0 0px 40px 0px;
    border: 1px solid #e8eef1;
}

.job-box-filter a.filtsec {
    margin-top: 8px;
    display: inline-block;
    margin-right: 15px;
    padding: 4px 10px;
    font-family: 'Quicksand', sans-serif;
    transition: all ease 0.4s;
    background: #edf0f3;
    border-radius: 50px;
    font-size: 13px;
    color: #81a0b1;
    border: 1px solid #e2e8ef;
}

.job-box-filter a.filtsec.active {
    color: #ffffff;
    background: #16262c;
    border-color: #16262c;
}

.job-box-filter a.filtsec i {
    color: #03A9F4;
    margin-right: 5px;
}

.job-box-filter a.filtsec:hover,
.job-box-filter a.filtsec:focus {
    color: #ffffff;
    background: #07b107;
    border-color: #07b107;
}

.job-box-filter a.filtsec:hover i,
.job-box-filter a.filtsec:focus i {
    color: #ffffff;
}

.job-box-filter h4 i {
    margin-right: 10px;
}

/*=====================================
Inbox Message Style
=======================================*/
.inbox-message ul {
    padding: 0;
    margin: 0;
}

.inbox-message ul li {
    list-style: none;
    position: relative;
    padding: 15px 20px;
    border-bottom: 1px solid #e8eef1;
}

.inbox-message ul li:hover,
.inbox-message ul li:focus {
    background: #eff6f9;
}

.inbox-message .message-avatar {
    position: absolute;
    left: 30px;
    top: 50%;
    transform: translateY(-50%);
}

.message-avatar img {
    display: inline-block;
    width: 54px;
    height: 54px;
    border-radius: 50%;
}

.inbox-message .message-body {
    margin-left: 85px;
    font-size: 15px;
    color: #62748F;
}

.message-body-heading h5 {
    font-weight: 600;
    display: inline-block;
    color: #62748F;
    margin: 0 0 7px 0;
    padding: 0;
}

.message-body h5 span {
    border-radius: 50px;
    line-height: 14px;
    font-size: 12px;
    color: #fff;
    font-style: normal;
    padding: 4px 10px;
    margin-left: 5px;
    margin-top: -5px;
}

.message-body h5 span.unread {
    background: #07b107;
}

.message-body h5 span.important {
    background: #dd2027;
}

.message-body h5 span.pending {
    background: #2196f3;
}

.message-body-heading span {
    float: right;
    color: #62748F;
    font-size: 14px;
}

.messages-inbox .message-body p {
    margin: 0;
    padding: 0;
    line-height: 27px;
    font-size: 15px;
}

a:hover {
    text-decoration: none;
}
</style>