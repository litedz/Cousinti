<template>
    <Transition name="fade">
        <div class="status position-fixed font-amiri z-9999" style="left: 25%;top: 5%;direction: rtl;" v-show="show_status">
            <div :class="'d-grid gap-2 border alert alert-' + this.class">
                <button type="button" class="btn btn-close btn-outline-white btn-sm p-2 rounded-circle"
                    @click="CloseStatus()" title="close-status"></button>
                <div :class="'fa fa-' + icon"></div>
                <div class="h5">{{ this.status_response }}</div>
                {{ this.message }}
            </div>
        </div>
    </Transition>
</template>

<script>
export default {

    mounted() {

    },
    data() {
        return {
            class: '',
            message: '',
            status_response: '',
            icon: '',
            duration: '',
            show_status: false,
        }
    },
    methods: {
        Display(style = 'info', message = 'Message', status_response = 'status', icon = 'exclamation-circle', duration = '5000') {

            this.class = style;
            this.message = message;
            this.status_response = status_response;
            this.icon = icon;
            this.duration = duration;
            this.show_status = true;
            let me = this;
            setTimeout(() => {
                me.show_status = false;
            }, this.duration);

        },
        RestoreField() {
            this.class = '';
            this.message = '';
            this.status_response = '';
            this.icon = '';
        },
        CloseStatus() {
            this.RestoreField();
            this.show_status = false;
        },
    }
}
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.status {
    width: 50%;
    margin: 3rem;
}

@media only screen and (max-width: 768px) {

    .status {
        width: 90%;
        margin: 3% !important;
        left: 0 !important;
    }
}
</style>

