<template>
    <div id="comments">
        <div class="topbar_comments">
            <div class="h1">تعليقات</div>
        </div>
        <div class="comments-area">
            <div class="container">
                <div class="row p-4 rounded">
                    <div class="col-12 col-md-5">
                        <div class="leave-comment w-100 bg-white">
                            <div class="title font-weight-bolder p-4 text-center w-100">
                                comments
                            </div>
                            <div class="form mt-4 d-flex flex-column text-right">

                                <label for="comment"
                                       class="mt-2 mb-2">Comments :</label>
                                <textarea class="form-control"
                                          v-model="comment"
                                          name=""
                                          id=""
                                          cols="30"
                                          rows="10"
                                          placeholder="اترك تعليف"></textarea>
                                <button type="button"
                                        @click="add_comment()"
                                        class="btn btn-primary btn-lg w-50 mt-2">
                                    ارسال
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="single-comment mb-1 bg-white d-flex flex-row-reverse rounded position-relative pt-2 pb-2"
                             v-for="comment in comments"
                             :key="comment.recipe">
                            <div class="left-shape position-absolute"></div>
                            <div class="avatar w-25">
                                <img class="rounded-circle mt-2"
                                     :src="w_path + '/storage/' + comment.user.avatar"
                                     style="width: 80px;height: 80px;"
                                     alt=""
                                     srcset="" />
                            </div>
                            <div class="d-flex flex-column info mx-3 text-black text-right w-75 font-amiri">
                                <div class="fs-5 mt-1 name">{{ comment.user.username }}</div>
                                <span class="text-info time">{{ formateDate(comment.created_at) }}</span>
                                <div class="comment lh-lg fs-6">
                                    {{ comment.comment }}
                                </div>
                            </div>
                        </div>

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
            comments: "",
            comment: '',
        };
    },
    methods: {
        getComments() {
            // const data = new FormData();
            // data.append("field", "field");
            console.log(this.$attrs.recipe_id);
            axios({ method: "get", url: "/comments/" + this.$attrs.recipe_id })
                .then((response) => {
                    if (response.data) {
                        this.comments = response.data;
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
                        // this.$refs.status.display('danger', 'حل التعليق فارغ ', 'خطا', 'info');
                    }
                });
        },
    },
};
</script>

<style>
#comments .topbar_comments {
    background: url("./images/shape-comments.png");
    background-size: cover;
    height: 100px;
    text-align: center;
    color: white;
    padding-top: 10px;
}

#comments .comments-area {
    width: 100%;
    height: auto;
    margin: 6% 0;
}

#comments .comments-area .row {
    background: #e4e4e4;
}

#comments .comments-area .row .leave-comment {
    color: black;
    direction: rtl;
    padding: 10px;
}

#comments .comments-area .row .leave-comment .title {
    border-bottom: 1px solid #168272;
    color: #000000b5;
    font-size: 22px;
}

#comments .comments-area .row .time {
    font-size: 11px;
}

#comments .comments-area .row .left-shape {
    width: 0;
    height: 0;
    border-top: 40px solid #168272;
    border-right: 40px solid transparent;
    left: 0;
    top: 0;
}

@media only screen and (max-width: 768px) {
    #comments .comments-area .row {
        display: flex;
        flex-direction: column-reverse;
    }
}
</style>
