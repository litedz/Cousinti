<template>
    <div id="comments">
        <status ref="status"></status>
        <div class="topbar_comments">
            <div class="align-items-center d-flex heading justify-content-center fs-1"><span>تعليقات</span>
                <span class="fa fa-commenting first-color fs-3 mb-4 ms-1 h1"></span>
            </div>
        </div>
        <div class="comments-area">
            <div class="container">
                <div class="row p-4 rounded">
                    <div class="col-12 col-md-5">
                        <div class="leave-comment w-100 bg-white">
                            <div class="title font-weight-bolder p-4 text-center w-100">
                                Leave Comments
                            </div>
                            <!-- form to add comments -->
                            <div class="form mt-4 d-flex flex-column text-right">
                                <label for="comment" class="mt-2 mb-2">Comments :</label>
                                <textarea class="form-control" v-model="comment" name="" id="" cols="30" rows="10"
                                    placeholder="اترك تعليف"></textarea>
                                <button type="button" @click="add_comment()"
                                    class="bg-second-color btn btn-lg mt-2 text-white w-100 w-50">
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="h-100 position-relative text-center"  v-if="comments.data && comments.data.length == 0 ">
                            <div class="border fs-4 position-absolute rounded text-black-50 text-capitalize top-50 w-100">
                                لايوجد تعليقات كن اول من يضع تعليق </div>
                        </div>
                        <div class="single-comment mb-1 bg-white d-flex flex-row-reverse rounded position-relative pt-2 pb-2"
                            v-for="comment in comments.data" :key="comment.recipe">
                            <div class="left-shape position-absolute"></div>
                            <div class="avatar mx-2">
                                <img class="rounded-circle mt-2" :src="w_path + '/storage/' + comment.user.avatar"
                                    style="width: 80px;height: 80px;" alt="" srcset="" />
                            </div>
                            <div class="d-flex flex-column info mx-3 text-black text-right w-75 font-amiri">
                                <div class="fs-5 mt-1 name">
                                    <a class="text-capitalize text-dark text-decoration-none"
                                        :href="'/profile/' + comment.user.id">{{ comment.user.username }}</a>

                                </div>
                                <span class="text-info time">{{ formateDate(comment.created_at) }}</span>
                                <div class="comment lh-lg fs-6">
                                    {{ comment.comment }}
                                </div>
                            </div>
                        </div>
                        <pagination :data="this.comments" @pagination-change-page="getComments" />
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
import footer from "./footer.vue";
import moment from "moment";
export default {

    inject: ["w_path"],
    mounted() {
        this.getComments();
    },
    data() {
        return {
            comments: {},
            comment: '',
            currentPage: 1,
            pageNext: 1,
        };
    },
    methods: {
        getComments(page = 1) {

            axios({ method: "get", url: "/comments/" + this.$attrs.recipe_id + "?page=" + page })
                .then((response) => {
                    if (response.data) {
                        this.comments = response.data;
                        this.currentPage = response.data.current_page;
                        this.pageNext = response.data.current_page;
                        console.log(response.data);
                    }
                })
                .catch((error) => { });
        },

        formateDate(created_at) {
            return moment(created_at, false).fromNow();
        },
        add_comment() {
            const data = new FormData();
            data.append("comment", this.comment);
            data.append("_token", document.querySelector('meta[name="csrf-token"]').content);
            data.append("recipe_id", this.$attrs.recipe_id);


            axios({ method: "post", url: "/comments", data: data })
                .then((response) => {
                    if (response.data == 'Add Success') {
                        this.getComments();
                    }
                })
                .catch((error) => {

                    if (error.response.data) {
                        this.$refs.status.display('danger', error.response.message, 'خطا', 'info');
                    }
                });
        },
        PaginateComment(page = 1) {
            axios({ method: "get", url: "/comments/" + this.$attrs.recipe_id + "?page=" + page })
                .then((response) => {
                    if (response.data) {
                        this.comments = response.data;
                    }
                })
                .catch((error) => { });

        }
    },
};
</script>

<style>
#comments .topbar_comments {
    /* background: url('https://media.istockphoto.com/id/1090430162/vector/abstract-soft-speed-futuristic-swoosh-wave-three-minimalistic-divider-swoosh-lines-in.jpg?s=170667a&w=0&k=20&c=YLUpavzVQPZeSTBhMG2V6SoJ6cuC_dlMtq_9zjtwOmA='); */
    height: 100px;
    text-align: center;
    padding-top: 10px;
    /* background-repeat: no-repeat;
    background-position: 47% 14%;
    background-origin: content-box;
    background-size: auto; */
}

#comments .comments-area {
    width: 100%;
    height: auto;
}

#comments .comments-area .row {
    background: hsl(0 0% 96% / 1);
}

#comments .comments-area .row .leave-comment {
    color: black;
    direction: rtl;
    padding: 10px;
}

#comments .comments-area .row .leave-comment .title {
    border-bottom: 1px solid #8f625b1f;
    color: #000000b5;
    font-size: 22px;
}

#comments .comments-area .row .time {
    font-size: 11px;
}

#comments .comments-area .row .left-shape {
    width: 0;
    height: 0;
    border-top: 40px solid #ef6f82;
    border-right: 40px solid transparent;
    left: 0;
    top: 0;
}

@media only screen and (max-width: 768px) {
    #comments .comments-area .row {
        display: flex;
        flex-direction: column-reverse;
    }
}</style>
