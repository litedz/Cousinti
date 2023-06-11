<template>
    <div class="email-status end-0 mx-3 position-fixed top-45 w-25 z-9999" v-if="status !== 1">
        <div class="alert alert-warning">
            <div class="fw-bold text-center title">Email Not verified </div>
            <div class="fs-6 message">{{ message }}</div>
            <a class="fw-bolder text-first" href="#" @click="SendMail()" v-if="show_link">verified email</a>
        </div>
    </div>
</template>
<script>
export default {
    props: ['status'],
    data() {
        return {
            message: 'Verifying your email will help us keep your account secure and provide you with the best user experience Please check Link Below',
            show_link: true
        }
    },
    methods: {
        SendMail() {
            this.show_link = false;
            axios.post('/user/email/verification').then((Response) => {
                if (Response.data.message) {
                    this.message = Response.data.message;
                    this.show_link = false;
                }
            }).catch((error) => {
                this.show_link = true;
            });
        },
    },
}
</script>
<style></style>