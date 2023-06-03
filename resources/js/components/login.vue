<template>
    <div class="login font-amiri mt-4">
        <status ref="status"></status>
        <loading-page></loading-page>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div
                        class="align-items-center d-flex flex-row-reverse gap-4 justify-content-center p-mb-sm-4 steps w-100-md w-100-sc mb-4">
                        <div class="step">
                            <div class="align-items-center border d-flex flex-column p-2 rounded-circle px-3">
                                <span class="fa fa-magnifying-glass-plus fa-solid text-info opacity-75"></span>
                                <div class="font-weight-bolder fs-4 text-black-title title">
                                    ابحث
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="step">
                            <div class="align-items-center border d-flex flex-column p-2 rounded-circle px-3">
                                <span class="fa fa-home fa-user-cog text-danger opacity-75"></span>
                                <div class="font-weight-bolder fs-4 text-black-title title">
                                    جرب
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="step">
                            <div class="align-items-center border d-flex flex-column p-2 rounded-circle">
                                <span class="fa fa-face-grin-stars text-warning opacity-75"></span>
                                <div class="font-weight-bolder fs-4 text-black-title title">
                                    استمتع
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cover col-md-6">
                    <img class="w-100" :src="w_path + '/images/img-login.png'" alt="" />
                </div>
                <div class="content text-center mt-5 col-12 col-md-6">
                    <div class="overflow-hidden position-relative h-auto p-mt-lg-5 p-mt-md-4 content-login">
                        <div class="position-absolute w-100 h-100 start-50 opacity-75"></div>
                        <div class="m-auto">
                            <FormKit type="form" #default="{ state: { valid } }" @submit="login()" :actions="false"
                                form-class="bg-light shadow m-lg-4 p-5 position-relative z-7777 d-grid gap-3">
                                <div class="logo text-center">
                                    <img class="w-50" :src="w_path + '/images/logo.png'" alt="" style="">
                                </div>
                                <div class="text-black-title h1 mb-4 font-weight-bolder  text-center">
                                    تسجيل الدخول
                                </div>
                                <div class="">
                                    <FormKit type="email" v-model="email" dir="rtl" input-class="form-control"
                                        validation="required|email|length:3" name="اسم المستحدم"
                                        placeholder="اسم المستخدم" />

                                    <FormKit type="password" v-model="password" dir="rtl" input-class="form-control mt-2"
                                        validation="required|length:6" name="كلمة السر" placeholder="كلمة السر" />
                                    <div class="forgot_remember d-flex justify-content-between align-items-center mt-3">
                                        <div class="remember_me d-flex align-items-center">
                                            <FormKit type="checkbox" v-model="remember_me" dir="rtl"
                                                input-class="form-check-input mt-2" name="remember" />
                                            <a class="text-decoration-none text-black m-1" href="#">تذكرني</a>
                                        </div>
                                        <div class="forget">
                                            <a class="text-decoration-none text-danger font-weight-bold" href="#">
                                                ? نسيت كلمة السر
                                            </a>
                                        </div>
                                    </div>

                                    <FormKit
                                        input-class="bg-first-color border-0 formkit-input fs-5 mt-2 p-1 position-relative rounded text-white w-100"
                                        :disabled="!valid" type="submit" :prefix-icon="this.lockIcon" label="دخول" />

                                    <div class="d-flex justify-content-end mt-3 text-black">
                                        <p class="fs-6 text-black-title">
                                            لا تملك حساب
                                            <a href="/register" class="text-decoration-none fw-bolder">إنشاء حساب جديد</a>
                                        </p>
                                    </div>
                                    <div v-show="this.success_message.status" :class="'alert ' + success_message.class">
                                        <span v-html="success_message.message">
                                        </span>
                                    </div>
                                    <!-- // facebook login button  -->
                                    <div class="d-flex justify-content-center">
                                        <div class="align-items-center bg-primary button-facebook d-flex font-amiri fs-6 fw-bold justify-content-center  p-1 rounded-pill text-white w-50 w-100-sc pointer"
                                            @click="ConnectToTheFacebook()">
                                            <img :src="w_path + '/images/faceicon.png'" alt="" data-v-aacc3324=""
                                                class="img-fluid mx-2" style="width: 25px;">
                                            <div class="text">تسجيل عن طريق الفيس بوك</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="align-items-center d-flex gap-1 justify-content-end px-3"><a href="/"
                                            class="first-color fw-bolder text-decoration-none">الرئيسية</a><span
                                            class="fa fa-arrow-right text-black-title"></span></div>
                                </div>
                            </FormKit>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    iconLoaderUrl: (iconName) =>
        `https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/svgs/solid/${iconName}.svg`,
    inject: ["w_path"],
    mounted() {
        this.faceApi();
    },
    data() {
        return {
            email: "",
            password: "",
            remember_me: false,
            accessTokenFb: "",
            csrf: document
                .querySelector("meta[name=csrf-token]")
                .getAttribute("content"),
            success_message: {
                status: false,
                message: "",
                class: "",
            },
            lockIcon:
                '<svg  height="30" width="30" cx="25" cy="50" fill="white"> <path d="M16,21.9146472 L16,24.5089948 C16,24.7801695 16.2319336,25 16.5,25 C16.7761424,25 17,24.7721195 17,24.5089948 L17,21.9146472 C17.5825962,21.708729 18,21.1531095 18,20.5 C18,19.6715728 17.3284272,19 16.5,19 C15.6715728,19 15,19.6715728 15,20.5 C15,21.1531095 15.4174038,21.708729 16,21.9146472 L16,21.9146472 L16,21.9146472 Z M15,22.5001831 L15,24.4983244 C15,25.3276769 15.6657972,26 16.5,26 C17.3284271,26 18,25.3288106 18,24.4983244 L18,22.5001831 C18.6072234,22.04408 19,21.317909 19,20.5 C19,19.1192881 17.8807119,18 16.5,18 C15.1192881,18 14,19.1192881 14,20.5 C14,21.317909 14.3927766,22.04408 15,22.5001831 L15,22.5001831 L15,22.5001831 Z M9,14.0000125 L9,10.499235 C9,6.35670485 12.3578644,3 16.5,3 C20.6337072,3 24,6.35752188 24,10.499235 L24,14.0000125 C25.6591471,14.0047488 27,15.3503174 27,17.0094776 L27,26.9905224 C27,28.6633689 25.6529197,30 23.991212,30 L9.00878799,30 C7.34559019,30 6,28.652611 6,26.9905224 L6,17.0094776 C6,15.339581 7.34233349,14.0047152 9,14.0000125 L9,14.0000125 L9,14.0000125 Z M10,14 L10,10.4934269 C10,6.90817171 12.9101491,4 16.5,4 C20.0825462,4 23,6.90720623 23,10.4934269 L23,14 L22,14 L22,10.5090731 C22,7.46649603 19.5313853,5 16.5,5 C13.4624339,5 11,7.46140289 11,10.5090731 L11,14 L10,14 L10,14 Z M12,14 L12,10.5008537 C12,8.0092478 14.0147186,6 16.5,6 C18.9802243,6 21,8.01510082 21,10.5008537 L21,14 L12,14 L12,14 L12,14 Z M8.99742191,15 C7.89427625,15 7,15.8970601 7,17.0058587 L7,26.9941413 C7,28.1019465 7.89092539,29 8.99742191,29 L24.0025781,29 C25.1057238,29 26,28.1029399 26,26.9941413 L26,17.0058587 C26,15.8980535 25.1090746,15 24.0025781,15 L8.99742191,15 L8.99742191,15 Z" id="lock" sketch:type="MSShape"><svg>',
        };
    },
    methods: {
        login() {
            const data = new FormData();
            data.append("email", this.email);
            data.append("password", this.password);
            data.append("remember_me", this.remember_me);
            axios({
                method: "post",
                url: "/login",
                data: data,
            })
                .then((response) => {
                    this.success_message.status = false;
                    console.log(response.data);
                    if (response.data) {
                        if (response.data.status === "logged") {
                            this.success_message.status = true;
                            this.success_message.class = "alert-success";
                            this.success_message.message =
                                response.data.message +
                                "الرجاء الانتظار . . 2 ث";
                            setInterval(() => {
                                window.location.href = "/dashboard";
                            }, 2000);
                        } else {
                            this.success_message.status = true;
                            this.success_message.class = "alert-danger";
                            this.success_message.message =
                                response.data.message;
                        }
                    }
                })
                .catch((error) => { });
        },
        faceApi() {
            window.fbAsyncInit = function () {
                FB.init({
                    appId: "1118668775495565",
                    autoLogAppEvents: true,
                    xfbml: true,
                    version: "v16.0",
                });
            };
        },
        ConnectToTheFacebook() {
            let me = this;
            FB.login(function (response) {
                if (response.status === "connected") {
                    me.accessTokenFb = response.authResponse.accessToken;
                    me.FetchDataFacebook();
                }
            });
        },
        FetchDataFacebook() {
            axios
                .get("https://graph.facebook.com/v16.0/me?fields=id,email&access_token=" + this.accessTokenFb)
                .then((response) => {
                    if (response.data) {
                        let profile = response.data;
                        let email = profile.email;
                        let UserIdFace = profile.id;
                        this.CheckAuthWebsite(email, UserIdFace);
                    }

                });
        },
        CheckAuthWebsite(email, UserIdFace) {
            var FacebookData = new FormData();
            FacebookData.append('email', email);
            FacebookData.append('Id_user_media', UserIdFace);
            axios({
                method: 'post',
                url: '/facebook/login',
                data: FacebookData,
            })
                .then(function (response) {
                    if (response.data == 'Connected') {
                        window.location.href = '/dashboard';
                    }
                    else {
                        this.$refs.status.Display(response.data.style, response.data.message, "تحذير", "fa-exclamation-triangle");
                    }
                }).catch((error) => {
                    if (error.response) {
                        console.log(error.response);
                        this.$refs.status.Display('danger', error.response.data.message, "تحذير");
                    }
                });
        }
    },
};
</script>

<style scoped>
.login {
    /* background: #f3f3f3; */
}

.login .content {
    /* width: 58%; */
    height: max-content;
}

.login .content .steps {
    width: 50%;
}

.login .content div:last-of-type {
    /* height: 60%; */
}

.login .content div:last-of-type .h1 {
    letter-spacing: 0.04rem;
}

.login .content div:last-of-type .m-auto {}

.login .cover {}

.login .cover img {
    /* width: 75%; */
}

.login .content .content-login {
    /* background-image: url('~/images/bg-login2.png');
    background-position: 10%;
    background-size: contain;
    background-repeat: no-repeat; */
}

.formkit-message {
    text-align: right;
    color: red;
    font-weight: bolder;
    margin-top: 10px;
    font-size: 15px;
}

.login form.formkit-form {
    background: #fffffe;
    position: relative;
    z-index: 10;
}

.login form.formkit-form .remember_me {
    color: #565353;
    font-weight: 400;
}

.login form.formkit-form .remember_me a {
    font-weight: 400;
    color: #4c4c4c;
}

.login form.formkit-form .btn-primary-perso span svg {
    position: absolute;
    left: 0;
}

.login .steps .separator {
    width: 10%;
    height: 1px;
    background: #c9c9c9;
}

@media only screen and (max-width: 900px) {
    .p-mb-sm-4 {
        margin-bottom: 3rem !important;
    }

    .login div.d-flex .content {
        width: 100%;
        margin-bottom: 5rem;
    }

    .login .content div:last-of-type {
        height: auto;
    }

    .login .content div:last-of-type .m-auto {
        width: 75%;
    }

    .cover {
        display: none;
    }
}

@media only screen and (min-width: 900px) and (max-width: 1200px) {
    .login .cover {
        width: auto;
    }

    .login .cover img {
        width: 100%;
    }

    .login .content div:last-of-type .m-auto {
        width: 75%;
    }
}
</style>
