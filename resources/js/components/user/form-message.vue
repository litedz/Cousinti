<template>
    <section class="message bottom-0 end-0  position-fixed">
        <status ref="status"></status>
        <div class="card" id="chat1" style="border-radius: 15px;">
            <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <i class="fas fa-angle-left"></i>
                <p class="mb-0 fw-bold">Live chat</p>
                <i class="fas fa-times pointer" @click="$emit('CloseChat')"></i>
            </div>
            <div id="card-body" class="card-body pt-3 overflow-auto" style="height:500px;">
                <div v-for="message in conversation" :key="message.conversation">
                    <div class="d-flex flex-row justify-content-start mb-4"
                        v-if="this.$attrs.user_id_send == message.id_user_send">
                        <img :src="w_path + '/storage/' + message.user.avatar" alt="avatar 1"
                            style="width: 45px; height: 100%;">
                        <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                            <p class="small mb-0">{{ message.message }}</p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-end mb-4" v-else>
                        <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                            <p class="small mb-0">{{ message.message }}</p>
                        </div>
                        <img :src="w_path + '/storage/' + message.user.avatar" alt="avatar 1"
                            style="width: 45px; height: 100%;">
                    </div>
                </div>
                <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample" rows="4" @keydown.enter="SendMessage()"></textarea>
                    <label class="form-label" for="textAreaExample">Type your message</label>
                </div>

            </div>
        </div>


    </section>
</template>
<script>
import { emit } from 'process';

export default {
    inject: ['w_path'],
    mounted() {
        this.showChat = this.$attrs.chat;
        this.getConversation();
        this.ss();
    },
    watch: {
    },
    data() {
        return {
            message: '',
            conversation: '',

        }
    },
    methods: {
        ss() {
            let body = document.querySelector('.card-body');
            body.scrollTop = body.scrollHeight;
        },
        SendMessage() {
        },
        getConversation() {
            let body = document.querySelector('.card-body');
            let data = new FormData();
            data.append('user_id_recipient', this.$attrs.user_id_recipient);
            data.append('user_id_send', this.$attrs.user_id_send);
            axios({
                method: 'post',
                url: '/messages/conversation',
                data: data,

            }).then((response) => {
                if (response.data) {
                    this.conversation = response.data; 
                    this.$emit('closeScroll');
                }

            }).catch((error) => {
                this.$refs.status.Display('danger', error.response.data.message, 'خطاء');
            });

            this.ss();


        },
    }

}
</script>

<style scoped>
#chat1 .form-outline .form-control~.form-notch div {
    pointer-events: none;
    border: 1px solid;
    border-color: #eee;
    box-sizing: border-box;
    background: transparent;
}

#chat1 .form-outline .form-control~.form-notch .form-notch-leading {
    left: 0;
    top: 0;
    height: 100%;
    border-right: none;
    border-radius: .65rem 0 0 .65rem;
}

#chat1 .form-outline .form-control~.form-notch .form-notch-middle {
    flex: 0 0 auto;
    max-width: calc(100% - 1rem);
    height: 100%;
    border-right: none;
    border-left: none;
}

#chat1 .form-outline .form-control~.form-notch .form-notch-trailing {
    flex-grow: 1;
    height: 100%;
    border-left: none;
    border-radius: 0 .65rem .65rem 0;
}

#chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading {
    border-top: 0.125rem solid #39c0ed;
    border-bottom: 0.125rem solid #39c0ed;
    border-left: 0.125rem solid #39c0ed;
}

#chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading,
#chat1 .form-outline .form-control.active~.form-notch .form-notch-leading {
    border-right: none;
    transition: all 0.2s linear;
}

#chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle {
    border-bottom: 0.125rem solid;
    border-color: #39c0ed;
}

#chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle,
#chat1 .form-outline .form-control.active~.form-notch .form-notch-middle {
    border-top: none;
    border-right: none;
    border-left: none;
    transition: all 0.2s linear;
}

#chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing {
    border-top: 0.125rem solid #39c0ed;
    border-bottom: 0.125rem solid #39c0ed;
    border-right: 0.125rem solid #39c0ed;
}

#chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing,
#chat1 .form-outline .form-control.active~.form-notch .form-notch-trailing {
    border-left: none;
    transition: all 0.2s linear;
}

#chat1 .form-outline .form-control:focus~.form-label {
    color: #39c0ed;
}

#chat1 .form-outline .form-control~.form-label {
    color: #bfbfbf;
}
</style>