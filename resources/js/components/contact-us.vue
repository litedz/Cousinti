<template >
    <div class="contact-support">
        <status ref="status"></status>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="" method="post">
                            <fieldset>
                                <legend class="text-center">Contact us</legend>

    
                                <!-- subject input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="subject">Your Subject</label>
                                    <div class="col-md-9">
                                        <input id="subject" name="subject" type="text" placeholder="Your subject"
                                            v-model="subject" class="form-control">
                                    </div>
                                </div>

                                <!-- Message body -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="message">Your message</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="message" name="message"
                                            placeholder="Please enter your message here..." rows="5"
                                            v-model="message"></textarea>
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary btn-lg"
                                            @click="sendMessage()">Submit</button>
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
    mounted(){
       this.email= this.$attrs.auth_email ;
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

            axios({ method: "post", url: "contact-support", data: data })
                .then((response) => {
                    if (response.data) {
                        this.$refs.status.Display('success', response.data, 'status', 'info');
                        this.$emit('sendMessage');
                    }
                })
                .catch((error) => {
                    console.log(error.response);
                    this.$refs.status.Display('danger', error.response.data.message, 'warning', 'warning');
                });
        },
    }
}
</script>
<style></style>