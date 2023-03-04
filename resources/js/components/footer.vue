<template>
    <section class="footer font-amiri"
             dir="rtl">
        <div class="align-items-center bg-dark bg-gradient d-flex justify-content-center p-1 top-border w-100 position-relative">
            <div class="w-100 text-center">
                <img class="rounded-circle"
                     :src="w_path + '/images/logo2.png'"
                     style="height: 80px;"
                     alt="">
            </div>
            <div class="fw-bold mx-4 position-absolute start-0 text-info"
                 style="color: #229191;">
                Contact +213 777777
                <li class="fa fa-phone"
                    style="color: rgb(53 255 255);"></li>
            </div>

        </div>
        <div class="content h-100 w-100 position-relative bg-dark">

            <div class="container position-relative text-white"
                 style="z-index: 10;">

                <div class="row">
                    <div class="col-6 col-md-4 pt-5">
                        <div class="site-map d-flex flex-column h-auto">
                            <div class="font-sc-2 font-4 fw-bold">خريطة الموقع</div>
                            <nav class="list-unstyled d-flex flex-column">

                                <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3"
                                   href="#">
                                    <span style="background: #229191;"
                                          class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                    رئسية</a>


                                <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3"
                                   href="#">
                                    <span style="background: #229191;"
                                          class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                    رئسية</a>

                                <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3"
                                   href="#">
                                    <span style="background: #229191;"
                                          class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                    رئسية</a>


                                <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3"
                                   href="#">
                                    <span style="background: #229191;"
                                          class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                    رئسية</a>

                            </nav>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 pt-5 position-relative">
                        <div class="separator position-absolute">
                            <img :src="path + '/images/l33.png'"
                                 alt=""
                                 srcset="">
                        </div>
                        <div class="social_media  d-flex flex-column justify-content-between h-100">
                            <div class="font-sc-2 font-4 fw-bold mb-4">منصات التواصل الاجتماعي</div>
                            <div class="d-flex align-items-center mt-3">
                                <img class="ms-3 rounded-circle"
                                     src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png"
                                     alt="">
                                <div class="font-22"><a id="mediaLink"
                                       href="#"
                                       class="font-weight-bolder text-decoration-none text-info">متابعتنا علي صفحة الفيس بوك</a></div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <img class="ms-3 rounded-circle"
                                     src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png"
                                     alt="">
                                <div class="font-22"><a id="mediaLink"
                                       href="#"
                                       class="font-weight-bolder text-decoration-none text-info">متابعتنا علي صفحة الفيس بوك</a></div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <img class="ms-3 rounded-circle"
                                     src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png"
                                     alt="">
                                <div class="font-22"><a id="mediaLink"
                                       href="#"
                                       class=" font-weight-bolder text-decoration-none text-info">متابعتنا علي صفحة الفيس بوك</a></div>
                            </div>
                        </div>
                    </div>
                    

                    <div class=" subscribe col-12 col-md-4 d-flex flex-column justify-content-between pt-5 position-relative gap-3">
                        <div class="separator position-absolute">
                            <img :src="path + '/images/l33.png'"
                                 alt=""
                                 srcset="">
                        </div>
                        <h1 class="fw-bold">متابعتنا</h1>
                        <div class="font-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque error fugit dolore mollitia consectetur animi facere minus nobis blanditiis nulla aut adipisci itaque, ullam temporibus deleniti. Explicabo pariatur cumque excepturi.</div>
                        <div class="form">
                            <input class="form-control"
                                   type="email"
                                   name=""
                                   placeholder="example@gmail.com">
                            <button type="submit"
                                    class="btn btn-primary font-amiri fs-5 fw-bolder mt-2 w-100"
                                    style="
                            background: #186666;
                            border: none;
                        ">اشتراك</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright text-center text-white w-100">
            Copyright
        </div>
    </section>


</template>

<script>
export default {
    inject: ['w_path'],
    data() {

        return {
            Path: window.location.host,
        }
    }
}
</script>

<style scoped>
.footer {

    width: 100%;
    height: 500px;


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
    opacity: 0.5;
    transition: all 0.5s;
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