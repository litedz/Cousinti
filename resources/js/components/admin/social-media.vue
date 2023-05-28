<template>
    <div class="bg-white p-3 social-media" auth_id="1">
        <status ref="status"></status>
        <div class="container">
            <h1 class="text-center text-capitalize border-bottom"> Social Media </h1>
            <div class="d-grid gap-3 w-100">
                <h6 class="fs-5 mt-4 text-center text-muted" v-if="media.length == 0"> You dont have any Media</h6>
                <div class="item" v-for="item in media">
                    <label for="">{{ item.media }}</label>
                    <div class="d-flex gap-2">
                        <input type="text" :name="item.media" class="form-control" readonly :value="item.url">
                        <button class="bg-transparent border-success btn btn-primary rounded-circle"
                            @click="getUpdateInfo({ 'media': item.media,'url': item.url,'id': item.id })">
                            <span class="fa fa-arrow-left-rotate text-success"></span>
                        </button>
                        <button class="bg-transparent border-danger btn btn-primary rounded-circle"
                            @click="deleteMedia(item.id)">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </div>
                </div>
                <!-- show form -->
                <button type="button" class="btn btn-primary fa-plus mx-auto px-3 rounded-circle" title="add"
                    @click="show_form_add_media = true"></button>
                <!-- Form add Media -->
                <div class="add-media bg-white d-grid left-25 p-3 position-fixed rounded-5 shadow top-45 w-50"
                    v-if="show_form_add_media">
                    <span class="fa fa-remove m-2 pointer" @click="show_form_add_media = false"></span>
                    <h1 class="border-bottom text-center">Add Media</h1>
                    <form class="d-grid form-group gap-3">
                        <label for="name_media">Media name :</label>
                        <input type="text" class="form-control" v-model="media_name" placeholder="LinkedIn">
                        <label for="name_media">Url :</label>
                        <input type="text" class="form-control" v-model="media_url" placeholder="www.Linkedin.com">
                        <button class="btn btn-primary" @click="addMedia()">
                            <span class="fa fa-add"></span>
                        </button>
                    </form>
                </div>
                <!-- Form Form Update Media -->
                <div class="add-media bg-white d-grid left-25 p-3 position-fixed rounded-5 shadow top-45 w-50"
                    v-if="show_form_update_media">
                    <span class="fa fa-remove m-2 pointer" @click="show_form_update_media = false"></span>
                    <h1 class="border-bottom text-center">Add Media</h1>
                    <form class="d-grid form-group gap-3">
                        <label for="name_media">Media name :</label>
                        <input type="text" class="form-control" v-model="media_name" placeholder="LinkedIn">
                        <label for="name_media">Url :</label>
                        <input type="text" class="form-control" v-model="media_url" placeholder="www.Linkedin.com">
                        <button class="btn btn-primary" @click="updateMedia()">
                            <span class="fa fa-add"></span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        this.getMedia();
    },
    data() {
        return {
            media: '',
            show_form_add_media: false,
            media_name: '',
            media_url: '',
            media_id: '',
            show_form_update_media: false,
        }
    },
    methods: {
        getMedia() {
            axios.get('/panel/media').then((response) => {
                this.media = response.data.media;
            })
        },
        addMedia() {
            let data = new FormData();
            data.append('media', this.media_name);
            data.append('url', this.media_url)
            axios.post('/panel/media', data).then((response) => {

                if (response.data.status == 'Done') {
                    this.show_form_add_media = false;
                    this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                    this.getMedia();
                }
            }).catch((error) => {
                this.$refs.status.Display(error.response.data.style, error.response.data.message, error.response.data.status, error.response.data.icon);
            })
        },
        deleteMedia(media_id) {
            let data = new FormData();
            data.append('_method', 'DELETE');
            data.append('media_id', media_id);
            axios.post('/panel/media/' + media_id, data).then((response) => {

                if (response.data.status == 'Deleted') {
                    this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                    this.getMedia();
                }
            }).catch((error) => {
                this.$refs.status.Display('danger', error.response.data.message, 'Wrong', 'warning');
            })
        },
        getUpdateInfo(updateMedia) {
            this.show_form_update_media = true;
            this.media_name = updateMedia.media;
            this.media_url = updateMedia.url;
            this.media_id = updateMedia.id;
        },
        updateMedia() {
            let data = new FormData();
            data.append('media', this.media_name);
            data.append('url', this.media_url)
            data.append('media_id', this.media_id)
            data.append('_method', 'PUT')
            axios.post('/panel/media/' + this.media_id, data)
                .then((response) => {
                    if (response.data.status == 'Updated') {
                        this.show_form_add_media = false;
                        this.$refs.status.Display(response.data.style, response.data.message, response.data.status, response.data.icon);
                        this.show_form_update_media =false;
                        this.getMedia();
                    }
                }).catch((error) => {
                    this.$refs.status.Display('danger', error.response.data.message, error.response.data.status, 'warning');
                })
        },
    },
}
</script>
<style></style>