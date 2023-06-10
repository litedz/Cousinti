<template >
    <div class="contact-support">
        <status ref="status"></status>
        <div class="container">
            <div class="row justify-content-center">
                <div class="bg-body col-md-6 col-12 ">
                    <div class="well well-sm">
                        <form class="form-horizontal">
                            <fieldset>
                                <legend class="border-bottom border-info text-center">Contact us</legend>
                                <!-- subject input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="subject">Your
                                        Subject</label>
                                    <div class="">
                                        <input id="subject" name="subject" type="text" placeholder="Your subject"
                                            class="form-control w-100" v-model="subject">
                                    </div>
                                </div><!-- Message body -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">Your
                                        message</label>
                                    <div class="">
                                        <textarea class="form-control" id="message" name="message" v-model="message"
                                            placeholder="Please enter your message here..." rows="5"></textarea>
                                    </div>
                                </div><!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary btn-lg" @click="sendMessage()">Send
                                            Message</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.email = this.$attrs.auth_email;
    },
    data() {
        return {
            message: '',
            subject: '',
            email: '',
        }
    },
    methods: {

        sendMessage() {
            let data = new FormData();
            data.append('from_user_id', this.$attrs.auth_id);
            data.append('subject', this.subject);
            data.append('body', this.message);
            data.append('email', this.email);

            axios.post("contact-support", data)
                .then((response) => {
                    if (response.data) {
                        this.$refs.status.Display('success', response.data, 'status', 'info');
                        this.$emit('sendMessage');
                        this.Resetfields();
                    }
                })
                .catch((error) => {
                    this.$refs.status.Display('danger', error.response.data.message, 'warning', 'warning');
                });
        },
        Resetfields() {
            this.subject = '';
            this.message = '';
            this.email = '';
        }

    }
}
</script>
<style></style>