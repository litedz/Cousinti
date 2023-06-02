<template>
    <section class="footer font-amiri" dir="rtl">
        <status ref="status"></status>
        <div class="content mb-2" style="border-top:5px solid #ef6f82;">
            <div class="container position-relative text-white" style="z-index:10;">
                <div class="row gy-4 pt-5">
                    <div class="col-6 col-md-3">
                        <div class="site-map d-flex flex-column h-auto">
                            <div class="font-sc-2 font-4 fw-bold">خريطة الموقع</div>
                            <nav class="list-unstyled d-flex flex-column">
                                <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3" href="#">
                                    <span class="border fa fa-home font-14 ms-3 p-2 rounded-circle"></span> رئسية
                                </a>
                                <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3" href="#">
                                    <span class="border fa fa-home font-14 ms-3 p-2 rounded-circle"></span>
                                    رئسية </a>
                                <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3" href="#">
                                    <span class="border fa fa-home font-14 ms-3 p-2 rounded-circle"></span>
                                    رئسية </a>
                            </nav>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 position-relative">
                        <div class="d-flex flex-column justify-content-between social_media gap-4">
                            <div class="font-4 font-sc-2 fw-bold">منصات التواصل الاجتماعي</div>
                            <div class="d-grid gap-3">
                                <div class="align-items-center d-flex"><img class="ms-3 rounded-circle"
                                        src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png"
                                        alt="">
                                    <div class="font-22"><a id="mediaLink" href="#"
                                            class="font-weight-bolder text-decoration-none"
                                            style="color:hsl(0 0% 90% / 1);">متابعتنا علي صفحة الفيس بوك</a></div>
                                </div>
                                <div class="align-items-center d-flex"><img class="ms-3 rounded-circle"
                                        src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png"
                                        alt="">
                                    <div class="font-22"><a id="mediaLink" href="#"
                                            class="font-weight-bolder text-decoration-none"
                                            style="color:hsl(0 0% 90% / 1);">متابعتنا علي صفحة الفيس بوك</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 d-grid gap-3 latest-recipe">

                        <h1 class="fw-bold title">Latest Recipe</h1>

                        <div class="gx-2 row">
                            <div class="col-6" v-for="recipe in this.recipesLatest" :key="recipe.latest">
                                <div class="img-container position-relative">
                                    <div class="bg-first-color h-100 overlay position-absolute top-0 w-100"></div>
                                    <div class="name-recipe fw-bold position-absolute text-center text-truncate  w-100 z-5555"
                                        style="top: 45%;">
                                        <a :href="w_path + '/recipes/' + recipe.id" class="text-decoration-none text-white">
                                            {{ recipe.name }}</a>
                                    </div>
                                    <img :src="w_path + '/storage/recipes/' + recipe.images_recipe[0].name" alt=""
                                        class="rounded w-100" style="height: 155px;">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-12 col-md-3 d-flex flex-column gap-3 position-relative subscribe">
                        <h1 class="fw-bold">متابعتنا</h1>
                        <div class="font-14">
                            اشترك الآن في موقعنا لتحصل على مجموعة واسعة من الوصفات الشهية والمبتكرة، وتتلقى إشعارات حول آخر
                            الوصفات المضافة إلى موقعنا بانتظام
                        </div>
                        <div class="form">
                            <input v-model="subscribeEmail" class="form-control" type="email" name=""
                                placeholder="example@gmail.com">
                            <button type="button" @click="subscribe()" :disabled="buttonSubscrube"
                                class="bg-gradient bg-second-color btn btn-primary font-amiri fs-5 fw-bolder mt-2 w-100"
                                style="border:none;">اشتراك</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright position-sticky text-center text-white top-100 w-100" style="background:hsl(242 22% 20% / 1);">
            Copyright </div>
    </section>
</template>

<script>
export default {
    inject: ['w_path'],

    mounted() {
        this.latestRecipes();
        console.log(this.$refs);
    },
    data() {

        return {
            Path: window.location.host,
            subscribeEmail: '',
            recipesLatest: '',
            buttonSubscrube: false
        }

    },
    methods: {
        subscribe() {
            //display button subsribe
            this.buttonSubscrube = true;
            let data = new FormData();
            data.append('email', this.subscribeEmail)
            axios({ method: "post", url: "/subscribe", data: data })
                .then((response) => {
                    if (response.data) {
                        this.$refs.status_footer.Display('success', response.data, 'Success', 'fa-check-circle');
                        //initialization email input
                        this.subscribeEmail = '';
                        //unable subscribe btn 
                        this.buttonSubscrube = false;
                    }
                })
                .catch((error) => {
                    if (error.response) {
                        //unable subscribe btn 
                        this.buttonSubscrube = false;
                        this.$refs.status.Display('danger', error.response.data.message, 'Error', 'exclamation-circle');
                        

                    }

                });
        },
        latestRecipes() {


            axios({ method: 'get', url: '/guest/recipes/latest', }).then((response) => {

                this.recipesLatest = response.data;
            });
        }
    },
}
</script>

<style scoped>
.footer {

    width: 100%;
    height: auto;
    background:#3A3959;
}

.footer .top-border {
    width: 60px;
    height: 60px;
}

.footer .content {
    /* background: url('./images/cover_footer.jpeg');
    background-size: cover; */
}

.footer .content .social_media img {
    width: 30px;
    height: 30px;
}

.footer .content .subscribe {
    height: 350px;
    border-right: 2px solid transparent;

}

.footer .social_media #mediaLink {
    font-size: 16px;
}

.footer .copyright {
    background: #186666;
}

.footer .separator {
    /* background: url('../images/L33.png') no-repeat; */
}

.footer .separator {
    height: 300px;
    right: -15%;
}

.footer a:hover {
    color: #EF6F82 !important;
    border-color: #EF6F82 !important;
    transition: all 0.5s;
}

.footer .latest-recipe .img-container .overlay,
.footer .latest-recipe .img-container .name-recipe {
    opacity: 0;
}

.footer .latest-recipe .img-container:hover .overlay,
.footer .latest-recipe .img-container:hover .name-recipe {
    opacity: 0.75;
    transition: all 1s;
}

@media only screen and (max-width: 768px) {
    .footer {
        height: auto;
    }

    .footer .copyright {
        font-size: 10px;
    }
}
</style>