<template>
    <div class="status m-5 position-fixed w-50" style="bottom: 10%;">
        <div :class="'border alert alert-' + this.class">
            <div :class="'fa fa-' + icon"></div>
            <div class="h5">{{ this.status_response }}</div>
            {{ this.message }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            class: '',
            message: '',
            status_response: '',
            icon: '',
        }
    },
    methods: {
        Display(style, message, status_response, icon) {
            this.class = style;
            this.message = message;
            this.status_response = status_response;
            this.icon = icon;
            $('.status').fadeIn();
            setTimeout(() => {
                $('.status').fadeOut();
            }, 5000);
        }
    }
}
</script>

<style>
.status {
    display: none;
    z-index: 9999;
}
</style>

