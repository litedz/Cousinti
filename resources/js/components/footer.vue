<template>
    <section class="footer font-amiri" dir="rtl">
        <div class="content h-100" style="background:#3A3959;border-top:5px solid #ef6f82;">
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

                        <div class="gx-2 gy-2 row">
                            <div class="col-6">
                                <div class="img-container position-relative">
                                    <div class="bg-first-color h-100 overlay position-absolute top-0 w-100"></div>
                                    <div class="name-recipe fw-bold position-absolute text-center text-truncate  w-100 z-5555"
                                        style="top: 45%;"><a href="#" class="text-decoration-none text-white">name recipe</a></div>
                                    <img src="https://picsum.photos/200" alt="" class="rounded w-100">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="img-container position-relative">
                                    <div class="bg-first-color h-100 overlay position-absolute top-0 w-100"></div>
                                    <div class="name-recipe fw-bold position-absolute text-center text-truncate  w-100 z-5555"
                                        style="top: 45%;"><a href="#" class="text-decoration-none text-white">name recipe</a></div>
                                    <img src="https://picsum.photos/200" alt="" class="rounded w-100">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="img-container position-relative">
                                    <div class="bg-first-color h-100 overlay position-absolute top-0 w-100"></div>
                                    <div class="name-recipe fw-bold position-absolute text-center text-truncate  w-100 z-5555"
                                        style="top: 45%;"><a href="#" class="text-decoration-none text-white">name recipe</a></div>
                                    <img src="https://picsum.photos/200" alt="" class="rounded w-100">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="img-container position-relative">
                                    <div class="bg-first-color h-100 overlay position-absolute top-0 w-100"></div>
                                    <div class="name-recipe fw-bold position-absolute text-center text-truncate  w-100 z-5555"
                                        style="top: 45%;"><a href="#" class="text-decoration-none text-white">name recipe</a></div>
                                    <img src="https://picsum.photos/200" alt="" class="rounded w-100">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-3 d-flex flex-column gap-3 position-relative subscribe">
                        <h1 class="fw-bold">متابعتنا</h1>
                        <div class="font-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Eaque error fugit dolore mollitia consectetur animi facere minus nobis blanditiis nulla aut
                            adipisci itaque, ullam temporibus deleniti. Explicabo pariatur cumque excepturi.</div>
                        <div class="form"><input class="form-control" type="email" name=""
                                placeholder="example@gmail.com"><button type="submit"
                                class="bg-gradient bg-second-color btn btn-primary font-amiri fs-5 fw-bolder mt-2 w-100"
                                style="border:none;">اشتراك</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright text-center text-white w-100" style="background:hsl(242 22% 20% / 1);">
            Copyright </div>
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