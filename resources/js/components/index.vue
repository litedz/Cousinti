<template>
    <!-- https://media-cldnry.s-nbcnews.com/image/upload/newscms/2019_41/3044956/191009-cooking-vegetables-al-1422.jpg -->
    <loading-page></loading-page>

    <div class="header position-relative overflow-hidden" dir="rtl">
        <KeepAlive>
            <component
                :is="activeComponent"
                @CloseRecipe="activeComponent = 'empty'"
            />
        </KeepAlive>
        <div
            class="login-icon d-flex flex-row position-absolute"
            style="left: 2%; top: 2%; z-index: 9991 !important"
        >
            <a
                href="/login"
                class="fa fa-door-open fa-sign-in fs-2 mx-3 text-white text-decoration-none"
                data-toggle="tooltip"
                data-placement="top"
                title="تسجيل الدخول "
            ></a>
        </div>
        <div
            id="home-navbar"
            class="home-navbar"
            style="display: none"
            dir="ltr"
        >
            <nav-bar></nav-bar>
        </div>
        <div
            class="index-nav h-auto position-absolute top-0 w-100 z-8888"
            @mouseleave="hoverLink('leave')"
        >
            <button class="btn btn-toggle m-2" @click="toggleNav()">
                <li class="fa fa-bars-staggered"></li>
            </button>
            <div class="font-amiri mx-auto nav p-3">
                <li class="fs-4">
                    <a
                        href="#"
                        class="fw-bolder p-2 rounded text-decoration-none link-nav"
                        @mouseenter="hoverLink()"
                        data-menu="submenu1"
                        style="color: white"
                        >معجنات</a
                    >
                    <div
                        id="submenu1"
                        @mouseleave="hoverLink('leave')"
                        class="p-3 position-absolute mt-3 rounded sub-menu w-50 z-9999"
                        style="background: rgb(1, 135, 135); display: none"
                    >
                        <div
                            class="d-flex justify-content-between position-relative"
                        >
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5 fw-bolder"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li class="fs-6">aeaezaeza</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="fs-4">
                    <a
                        data-menu="submenu2"
                        @mouseenter="hoverLink()"
                        href="#"
                        class="fw-bolder p-2 rounded text-decoration-none"
                        style="color: white"
                        >home</a
                    >

                    <div
                        id="submenu2"
                        @mouseleave="hoverLink('leave')"
                        class="p-3 position-absolute mt-3 rounded sub-menu w-50 z-9999"
                        style="background: rgb(1, 135, 135); display: none"
                    >
                        <div
                            class="d-flex justify-content-between position-relative"
                        >
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5 fw-bolder"
                                >
                                    ezaeaezaea
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li>
                                        <a
                                            href="#"
                                            class="text-decoration-none fs-6 mb-1 mt-1 text-white"
                                            >azeaeazzae</a
                                        >
                                    </li>
                                </div>
                            </div>
                            <div class="mx-1 region w-25">
                                <div
                                    style="border-bottom: 1px solid #fcfdff54"
                                    class="name-region fs-5"
                                >
                                    شرقية
                                </div>
                                <div class="items">
                                    <li class="fs-6">aeaezaeza</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="fs-3 position-relative" style="" id="logo">
                    <img
                        src="http://127.0.0.1:8000/images/logo2.png"
                        alt=""
                        style="width: 138px; position: relative"
                        class=""
                    />
                </li>
                <li class="fs-4">
                    <a
                        @mouseenter="hoverLink()"
                        href="#"
                        class="fw-bolder p-2 rounded text-decoration-none"
                        style="color: white"
                        >حلويات</a
                    >
                </li>
                <li class="fs-4">
                    <a
                        @mouseenter="hoverLink()"
                        href="#"
                        class="fw-bolder p-2 rounded text-decoration-none"
                        style="color: white"
                        >حلويات</a
                    >
                </li>
            </div>
        </div>

        <div class="logo-title position-absolute text-center z-7777">
            <div
                class="bg-white display-1 fw-bolder text text-black"
                style="letter-spacing: 15px"
            >
                COUSINTI test
            </div>
        </div>
        <div
            class="center-text h-50 position-absolute w-100 z-5555 d-flex justify-content-center flex-column"
            style="top: 30%"
        >
            <div class="mt-5 mb-5">
                <div
                    class="name-regione display-4 font-amiri text-center text-white fw-bolder"
                    id="name-regione"
                >
                    <span class="Typewriter__wrapper"
                        >ماعرفتيش واش طيبي <br />
                        !!! </span
                    ><span class="Typewriter__cursor">|</span>
                </div>
            </div>
            <div class="steps">
                <div class="container">
                    <div
                        class="bg-body h-auto mt-sm-5 mx-sm-auto shape col-12 col-md-9 col-lg-5"
                        style="border-radius: 22% 0%; height: 174px"
                    >
                        <div
                            class="d-flex flex-column h-75 items justify-content-around p-5"
                            dir="rtl"
                        >
                            <div
                                class="name-regione font-amiri fs-3 fw-bold text-black-name-regione text-center"
                            >
                                اجعل يومك احلي في 3 خطوات
                            </div>
                            <div
                                class="item align-items-center d-flex align-items-center justify-content-around"
                            >
                                <li
                                    class="border fa fa-apple-whole fs-1 m-1 p-2 rounded-circle text-info"
                                ></li>
                                <span class="m-1"
                                    >Lorem ipsum dolor st, atqeriam,
                                    asperiores.</span
                                >
                            </div>
                            <div
                                class="item align-items-center d-flex align-items-center justify-content-around"
                            >
                                <li
                                    class="border fa fa-apple-whole fs-1 m-1 p-2 rounded-circle text-info"
                                ></li>
                                <span class="m-1"
                                    >Lorem ipsum dolor st, atqeriam,
                                    asperiores.</span
                                >
                            </div>
                            <div
                                class="item align-items-center d-flex align-items-center justify-content-around"
                            >
                                <li
                                    class="border fa fa-apple-whole fs-1 m-1 p-2 rounded-circle text-info"
                                ></li>
                                <span class="m-1"
                                    >Lorem ipsum dolor st, atqeriam,
                                    asperiores.</span
                                >
                            </div>
                            <div class="font-amiri random text-center">
                                <button
                                    class="btn fs-4 fw-bolder mt-5 w-50"
                                    style="background: rgb(52, 64, 64)"
                                    @click="activeComponent = 'random-recipe'"
                                >
                                    اختيار وصفة
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cover position-relative">
            <div
                class="w-100 h-100 opacity-75 bg-perso position-absolute"
                style="
                    background: linear-gradient(
                        177deg,
                        rgb(83, 196, 180),
                        #ffffffb8
                    );
                "
            ></div>
        </div>
    </div>

    <section
        class="choose_food h-auto mb-5 mt-5"
        style="width: 100; height: 900px"
    >
        <div class="container">
            <div class="row">
                <div
                    class="align-items-center col-12 text-dark d-flex flex-row-reverse justify-content-center mb-5 text-center"
                >
                    <img class="ms-2" :src="w_path + '/images/V2.png'" alt="" />
                    <h1 class="text-black-name-regione h2">انواع الوصفات</h1>
                    <img class="ms-2" :src="w_path + '/images/V2.png'" alt="" />
                </div>
                <div
                    class="col-xs-12 col-md-6 col-lg-4 item overflow-hidden p-0 position-relative"
                    :id="type.type"
                    @mouseenter="EffectCategorie()"
                    @mouseleave="EffectCategorie()"
                    v-for="type in types_recipe"
                    :key="type.recipe"
                >
                    <div
                        class="d-flex flex-column h-100 justify-content-around position-absolute w-100 z-8888"
                    >
                        <div
                            class="d-flex flex-column justify-content-around text-center text-white squar"
                            style="background: #17a2b8b8; height: 10%"
                        >
                            <a
                                :href="'/similar/' + type.type"
                                class="text-decoration-none"
                            >
                                <div class="font-amiri h4 text-white">
                                    {{ type.type }}
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="bg-dark w-100" style="height: 350px">
                        <div class="h-100 w-100">
                            <img
                                src="http://127.0.0.1:8000/images/1.jpg"
                                alt=""
                                class="h-100 w-100"
                                style=""
                            />
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="best-of-recipe mb-5 p-3 px-0">
        <div
            class="font-amiri mb-5 pb-3 text-center w-100"
            style="
                border-bottom: 1px solid lightgrey;
                border-right: 799px solid transparent;
                border-left: 800px solid transparent;
            "
        >
            <div
                class="name-regione d-flex align-items-center justify-content-center"
            >
                <div class="h2 fw-bolder m-1">افضل الوصفات</div>
                <i class="fa fa-star-half-alt text-warning"></i>
            </div>
            <div class="fst-italic text-muted">اكثر الوصفات اعجابا</div>
        </div>
        <div class="cover">
            <div class="container">
                <div class=""></div>
                <div class="row">
                    <div
                        class="col-12 col-md-6"
                        @mouseenter="EffectBestRecipe()"
                        @mouseleave="EffectBestRecipe()"
                    >
                        <div class="position-relative">
                            <div
                                class="icon align-items-center d-flex flex-column info justify-content-between justify-content-center position-absolute w-100 z-5555"
                                style="top: 45%; transition: all 1s; opacity: 0"
                            >
                                <div class="name h3 text-white">
                                    <a
                                        href="#"
                                        class="text-decoration-none text-white"
                                        >Lorem zmloxxx</a
                                    >
                                </div>
                                <div class="icons">
                                    <a href="#">
                                        <li
                                            class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                        ></li> </a
                                    ><a href="#">
                                        <li
                                            class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                        ></li> </a
                                    ><a href="#">
                                        <li
                                            class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                        ></li>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="bg-dark end-0 h-100 opc position-absolute top-0 w-100"
                                style="transition: all 1s; opacity: 0"
                            ></div>
                            <div class="img w-100">
                                <img
                                    src="https://picsum.photos/200"
                                    class="w-100"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-mt-sc-4">
                        <div class="row h-100 p-xxl-5">
                            <div
                                class="col-6 mb-1 rounded img-fluid"
                                @mouseenter="EffectBestRecipe()"
                                @mouseleave="EffectBestRecipe()"
                            >
                                <div class="position-relative">
                                    <div
                                        class="bg-dark end-0 h-100 opc position-absolute top-0 w-100"
                                        style="transition: all 1s; opacity: 0"
                                    >
                                        <div
                                            class="align-items-center d-flex flex-column info justify-content-between justify-content-center position-absolute top-50 w-100 z-5555"
                                        >
                                            <div class="name h3 text-white">
                                                <a
                                                    href="#"
                                                    class="text-decoration-none text-white"
                                                    >Lorem zmloxxx</a
                                                >
                                            </div>
                                            <div class="icons">
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="img w-100">
                                        <img
                                            src="https://picsum.photos/200"
                                            class="w-100"
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-6 mb-1 rounded img-fluid"
                                @mouseenter="EffectBestRecipe()"
                                @mouseleave="EffectBestRecipe()"
                            >
                                <div class="position-relative">
                                    <div
                                        class="bg-dark end-0 h-100 opc position-absolute top-0 w-100"
                                        style="transition: all 1s; opacity: 0"
                                    >
                                        <div
                                            class="align-items-center d-flex flex-column info justify-content-between justify-content-center position-absolute top-50 w-100 z-5555"
                                        >
                                            <div class="name h3 text-white">
                                                <a
                                                    href="#"
                                                    class="text-decoration-none text-white"
                                                    >Lorem zmloxxx</a
                                                >
                                            </div>
                                            <div class="icons">
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="img w-100">
                                        <img
                                            src="https://picsum.photos/200"
                                            class="w-100"
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-6 mb-1 rounded img-fluid"
                                @mouseenter="EffectBestRecipe()"
                                @mouseleave="EffectBestRecipe()"
                            >
                                <div class="position-relative">
                                    <div
                                        class="bg-dark end-0 h-100 opc position-absolute top-0 w-100"
                                        style="transition: all 1s; opacity: 0"
                                    >
                                        <div
                                            class="align-items-center d-flex flex-column info justify-content-between justify-content-center position-absolute top-50 w-100 z-5555"
                                        >
                                            <div class="name h3 text-white">
                                                <a
                                                    href="#"
                                                    class="text-decoration-none text-white"
                                                    >Lorem zmloxxx</a
                                                >
                                            </div>
                                            <div class="icons">
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="img w-100">
                                        <img
                                            src="https://picsum.photos/200"
                                            class="w-100"
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-6 mb-1 rounded img-fluid"
                                @mouseenter="EffectBestRecipe()"
                                @mouseleave="EffectBestRecipe()"
                            >
                                <div class="position-relative">
                                    <div
                                        class="bg-dark end-0 h-100 opc position-absolute top-0 w-100"
                                        style="transition: all 1s; opacity: 0"
                                    >
                                        <div
                                            class="align-items-center d-flex flex-column info justify-content-between justify-content-center position-absolute top-50 w-100 z-5555"
                                        >
                                            <div class="name h3 text-white">
                                                <a
                                                    href="#"
                                                    class="text-decoration-none text-white"
                                                    >Lorem zmloxxx</a
                                                >
                                            </div>
                                            <div class="icons">
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                                <a href="#">
                                                    <li
                                                        class="bg-info fa fa-heart-circle-bolt p-3 rounded-circle text-white m-1"
                                                    ></li>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="img w-100">
                                        <img
                                            src="https://picsum.photos/200"
                                            class="w-100"
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section
        class="sing_up bg-dark position-relative d-flex align-items-center mb-5 font-amiri"
    >
        <div
            class="bg-black h-100 opacity-75 opt w-100 position-absolute"
        ></div>
        <div class="container position-relative text-white" style="z-index: 22">
            <div
                class="align-items-center align-items-end d-flex flex-column justify-content-center"
            >
                <div class="display-1 font-weight-bolder" dir="rtl">
                    جربة وصفة ونجحتلك ?
                </div>
                <div class="fs-5 lh-lg text-right">
                    أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                    النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص
                    أوالعديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو
                    العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد
                    من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من
                    النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل
                    هذا
                </div>
                <div class="form mt-4 mt-lg-5">
                    <a
                        href="/register"
                        class="font-weight-bolder fs-3 m-1 p-2 px-5 rounded rounded-pill text-decoration-none text-first"
                        style="color: white; background: #229191"
                        >الحساب
                    </a>
                    <a
                        href="/rules"
                        class="bg-gradient bg-light font-weight-bolder fs-3 m-1 p-2 px-5 rounded rounded-pill text-decoration-none text-first text-info"
                        >القوانين</a
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="sweats font-amiri position-relative">
        <div
            class="d-flex flex-column align-items-center justify-content-center w-100 mb-5"
        >
            <div class="h2 fw-bolder m-1 text-center mb-1">اخر الحلويات</div>
            <div class="sep mt-1" style="width: 8%"></div>
            <div class="sep mt-1" style="width: 6%"></div>
            <div class="sep mt-1" style="width: 4%"></div>
        </div>
        <div
            class="align-items-center d-flex flex-column sliderSweats w-100"
            style="transition: all 1s"
        >
            <div
                class="d-inline-flex position-relative w-75 overflow-hidden"
                style="height: 400px"
            >
                <div
                    class="d-flex items position-relative"
                    style="right: 0px"
                    id="slideSweats"
                    dir="rtl"
                >
                    <div
                        id="item-slider"
                        data-show="1"
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px; transition: all 1s"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/111/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        id="item-slider"
                        data-show="2"
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px; transition: all 1s"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/107/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        id="item-slider"
                        data-show="3"
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px; transition: all 1s"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/122/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        id="item-slider"
                        data-show="3"
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px; transition: all 1s"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/108/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        id="item-slider"
                        data-show="3"
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px; transition: all 1s"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/99/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="action">
                <div
                    class="next align-items-center bg-light d-flex end-0 h-100 h-50 justify-content-center position-absolute text-first top-0 px-4 shadow pointer"
                    @click="scrollSlider('right', 'slideSweats')"
                >
                    <li class="fa fa-chevron-right"></li>
                </div>
                <div
                    class="prev align-items-center bg-light d-flex start-0 h-100 h-50 justify-content-center position-absolute text-first top-0 px-4 shadow pointer"
                    @click="scrollSlider('left', 'slideSweats')"
                >
                    <li class="fa fa-chevron-left"></li>
                </div>
            </div>
        </div>
    </section>

    <section class="salts font-amiri mt-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center w-100 mb-5"
        >
            <div class="h2 fw-bolder m-1 text-center mb-1">اخر المملحات</div>
            <div class="sep mt-1" style="width: 8%"></div>
            <div class="sep mt-1" style="width: 6%"></div>
            <div class="sep mt-1" style="width: 4%"></div>
        </div>
        <div
            class="align-items-center d-flex flex-column slideSalts w-100"
            style="transition: all 1s"
        >
            <div
                class="d-inline-flex position-relative w-75 overflow-hidden"
                style="height: 400px"
            >
                <div
                    class="d-flex items position-relative"
                    style="right: 0px"
                    id="slideSalts"
                    dir="rtl"
                >
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/105/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/102/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/102/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/100/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/100/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >Name</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-light h-100 item mx-1 p-3 rounded"
                        style="width: 350px"
                    >
                        <div class="d-flex flex-column justify-content-center">
                            <div class="img">
                                <img
                                    src="https://picsum.photos/id/100/150"
                                    alt=""
                                    class="w-100"
                                />
                                <div
                                    class="align-items-baseline d-flex justify-content-between p-1"
                                >
                                    <div class="info">
                                        <div
                                            class="fs-4 fw-bolder text-black-500"
                                        >
                                            <a
                                                class="text-decoration-none text-first pointer"
                                                href="#"
                                                >xxxxxxxxxx</a
                                            >
                                        </div>
                                        <div class="fs-6 text-black-50">
                                            حلويات
                                        </div>
                                    </div>
                                    <div>
                                        <li
                                            class="fa fa-heart text-danger"
                                        ></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="action mt-3">
                <li
                    class="fa fa-chevron-left mt-1 text-white bg-perso mx-3 p-2 px-5 rounded-pill pointer"
                    @click="scrollSlider('left', 'slideSalts')"
                ></li>
                <li
                    class="fa fa-chevron-right mt-1 text-white bg-perso mx-3 p-2 px-5 rounded-pill pointer"
                    @click="scrollSlider('right', 'slideSalts')"
                ></li>
            </div>
        </div>
    </section>
    <section class="bestChefs h-auto" dir="rtl">
        <div class="w-100">
            <div
                class="d-flex flex-column justify-content-center mb-5 w-100 mt-5"
            >
                <h1 class="text-center">افضل الطهاة</h1>
                <div class="sep mt-1" style="width: 8%"></div>
                <div class="sep mt-1" style="width: 6%"></div>
                <div class="sep mt-1" style="width: 4%"></div>
            </div>
            <div class="chefs p-mb-sc-5 p-h-auto-sc">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <div
                                class="chef p-2 rounded"
                                style="height: auto; background: #b1b1b133"
                            >
                                <div class="d-flex flex-column">
                                    <div class="w-100">
                                        <img
                                            class="w-100"
                                            src="https://i.pravatar.cc/300?img=3"
                                            alt=""
                                        />
                                    </div>
                                    <div
                                        class="font-italic fs-5 fw-normal mt-1 mx-0 name text-center"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none text-info"
                                            >Mohamed el habib</a
                                        >
                                    </div>
                                    <div
                                        class="font-italic fs-6 fw-normal m-1 mx-0 specialité text-center"
                                        style="color: #e35516"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none"
                                            style="color: #e35516"
                                            >Specialité</a
                                        >
                                    </div>
                                    <div>
                                        <a
                                            href="#"
                                            class="bg-info btn text-white w-100 text-decoration-none"
                                            >Profile</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div
                                class="chef p-2 rounded"
                                style="height: auto; background: #b1b1b133"
                            >
                                <div class="d-flex flex-column">
                                    <div class="w-100">
                                        <img
                                            class="w-100"
                                            src="https://i.pravatar.cc/300?img=4"
                                            alt=""
                                        />
                                    </div>
                                    <div
                                        class="font-italic fs-5 fw-normal mt-1 mx-0 name text-center"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none text-info"
                                            >Mohamed el habib</a
                                        >
                                    </div>
                                    <div
                                        class="font-italic fs-6 fw-normal m-1 mx-0 specialité text-center"
                                        style="color: #e35516"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none"
                                            style="color: #e35516"
                                            >Specialité</a
                                        >
                                    </div>
                                    <div>
                                        <a
                                            href="#"
                                            class="bg-info btn text-white w-100 text-decoration-none"
                                            >Profile</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div
                                class="chef p-2 rounded"
                                style="height: auto; background: #b1b1b133"
                            >
                                <div class="d-flex flex-column">
                                    <div class="w-100">
                                        <img
                                            class="w-100"
                                            src="https://i.pravatar.cc/300?img=5"
                                            alt=""
                                        />
                                    </div>
                                    <div
                                        class="font-italic fs-5 fw-normal mt-1 mx-0 name text-center"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none text-info"
                                            >Mohamed el habib</a
                                        >
                                    </div>
                                    <div
                                        class="font-italic fs-6 fw-normal m-1 mx-0 specialité text-center"
                                        style="color: #e35516"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none"
                                            style="color: #e35516"
                                            >Specialité</a
                                        >
                                    </div>
                                    <div>
                                        <a
                                            href="#"
                                            class="bg-info btn text-white w-100 text-decoration-none"
                                            >Profile</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div
                                class="chef p-2 rounded"
                                style="height: auto; background: #b1b1b133"
                            >
                                <div class="d-flex flex-column">
                                    <div class="w-100">
                                        <img
                                            class="w-100"
                                            src="https://i.pravatar.cc/300?img=6"
                                            alt=""
                                        />
                                    </div>
                                    <div
                                        class="font-italic fs-5 fw-normal mt-1 mx-0 name text-center"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none text-info"
                                            >Mohamed el habib</a
                                        >
                                    </div>
                                    <div
                                        class="font-italic fs-6 fw-normal m-1 mx-0 specialité text-center"
                                        style="color: #e35516"
                                    >
                                        <a
                                            href="#"
                                            class="text-decoration-none"
                                            style="color: #e35516"
                                            >Specialité</a
                                        >
                                    </div>
                                    <div>
                                        <a
                                            href="#"
                                            class="bg-info btn text-white w-100 text-decoration-none"
                                            >Profile</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sponsore w-100 mw-100 mb-5" style="font-family: 'dance'">
        <div class="align-items-center d-flex justify-content-center w-100">
            <div class="position-relative mb-4">
                <div class="fs-2 fw-bold text-center">Sponsored</div>
            </div>
        </div>

        <div
            class="align-items-center d-flex justify-content-center w-100 text-center"
            style="height: 100px"
        >
            <div class="item mx-2">
                <a href="#">
                    <img
                        src="https://picsum.photos/70"
                        alt=""
                        class="rounded-circle"
                    />
                </a>
                <div class="name_comapny fw-bold">Lorem azxpp</div>
            </div>
            <div class="item mx-2">
                <a href="#">
                    <img
                        src="https://picsum.photos/70"
                        alt=""
                        class="rounded-circle"
                    />
                </a>
                <div class="name_comapny fw-bold">Lorem azxpp</div>
            </div>
            <div class="item mx-2">
                <a href="#">
                    <img
                        src="https://picsum.photos/70"
                        alt=""
                        class="rounded-circle"
                    />
                </a>
                <div class="name_comapny fw-bold">Lorem azxpp</div>
            </div>
            <div class="item mx-2">
                <a href="#">
                    <img
                        src="https://picsum.photos/70"
                        alt=""
                        class="rounded-circle"
                    />
                </a>
                <div class="name_comapny fw-bold">Lorem azxpp</div>
            </div>
        </div>
    </section>

    <section class="footer">
        <footer-page></footer-page>
    </section>
    <button
        @click="backTop()"
        type="button"
        class="btn btn-info btn-floating btn-lg position-fixed rounded-pill z-9999"
        style="right: 5%; bottom: 5%; display: none"
        id="btn-back-to-top"
    >
        <i class="fas fa-arrow-up"></i>
    </button>
</template>

<script>
import Typewriter from "typewriter-effect/dist/core";
export default {
    inject: ["w_path"],
    mounted() {
        this.availableTypes();
        this.autoType();
        window.addEventListener("scroll", this.wheneScroll);
    },
    unmounted() {
        window.removeEventListener("scroll", this.wheneScroll);
    },
    data() {
        return {
            types_recipe: "",
            effectImg: false,
            imgBestRecipe: false,
            show: "",
            activeComponent: "",
            showSubmenu: "",
        };
    },
    methods: {
        backTop() {
            document.documentElement.scrollTop = 0;
        },
        availableTypes() {
            axios({ method: "get", url: "types_recipe" })
                .then((response) => {
                    if (response.data) {
                        this.types_recipe = response.data;
                    }
                })
                .catch((error) => {});
        },
        autoType() {
            new Typewriter("#name-regione", {
                strings: ["ماعرفتيش واش طيبي <br> !!!  ", "عدنا الحل"],
                autoStart: true,
                loop: true,
            });
        },
        EffectCategorie() {
            this.effectImg = !this.effectImg;
            if (this.effectImg) {
                $("#" + event.target.id)
                    .find("img")
                    .css({ transform: "scale(1.1)" });
                $("#" + event.target.id)
                    .find(".squar")
                    .css({ height: "100%" });
            } else {
                $("#" + event.target.id)
                    .find(".squar")
                    .css({ height: "10%" });
                $("#" + event.target.id)
                    .find("img")
                    .css({ transform: "scale(1)" });
            }
        },
        EffectBestRecipe() {
            this.imgBestRecipe = !this.imgBestRecipe;
            if (this.imgBestRecipe) {
                $(event.target).find(".opc").css("opacity", "0.7");
                $(event.target).find(".icon").css("opacity", "1");
            } else {
                $(event.target).find(".opc").css("opacity", "0");
                $(event.target).find(".icon").css("opacity", "0");
            }
        },
        scrollSlider(action, name_slider) {
            var show = document.getElementById(name_slider);
            let right = parseInt(show.style.right);
            let widthSlider = show.offsetWidth;
            if (action === "right") {
                if (right < widthSlider - 300) {
                    show.style.right = right + 300 + "px";
                } else {
                    show.style.right = "0px";
                }
            } else {
                if (right > 0) {
                    show.style.right = right - 300 + "px";
                }
            }
        },
        wheneScroll() {
            if ($(window).scrollTop() > 200) {
                $("#btn-back-to-top").fadeIn();
                $("#home-navbar").fadeIn("slow");
            } else {
                $("#btn-back-to-top").fadeOut();
                $("#home-navbar").fadeOut("fast");
            }
        },
        hoverLink(action) {
            if (action == "leave") {
                $("#" + event.target.getAttribute("data-menu")).fadeOut();
                $(".sub-menu").fadeOut();
            } else {
                $(".index-nav li a").removeClass("link-nav");
                $(event.target).addClass("link-nav");
                if ($(event.target).hasClass(".link-nav") == false) {
                    $(".sub-menu").fadeOut();
                }
                $("#" + event.target.getAttribute("data-menu")).fadeIn();
            }
        },
        toggleNav() {
            $(".nav").fadeToggle();
        },
        testEmit() {
            alert("emit send");
        },
    },
};
</script>

<style>
/* generale */
body {
    transition: all 0.5ms;
}
.header {
    width: 100%;
    max-width: 100%;
    height: 1050px;
    background-color: rgb(199, 199, 199);
}

#slideSweats,
#slideSalts {
    transition: all 1s;
}

.header .cover {
    background: url("https://media-cldnry.s-nbcnews.com/image/upload/newscms/2019_41/3044956/191009-cooking-vegetables-al-1422.jpg");
    background-size: cover;
    max-width: 100%;
    height: 100%;
}

.header .steps .separator {
    width: 30%;
    height: 1px;
    background: #164;
}

.header .shape {
    /* background: white; */
    background-image: url("~/images/header-shape-1.png");
    background-size: cover;
}

.header button {
    color: white;
}

.header button:hover {
    background: white;
    color: #229191;
    box-shadow: 0px 0px 20px #229191;
    transition: all 1s ease;
}

.header .index-nav li .link-nav {
    border-width: 2px;
    border-style: solid;
    border-image: linear-gradient(268deg, #17a2b800, #00ffb8, #17a2b800) 1;
    border-top: none;
    border-right: none;
    border-left: none;
    transition: border-image 1s;
}

.index-nav .sub-menu a:hover {
    color: #164;
    transition: all 0.5s;
}

.index-nav .nav {
    width: 50%;
    color: white;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-around;
}

.logo-title {
    left: 31%;
    top: 15%;
    mix-blend-mode: screen;
    width: 38%;
}

.btn-toggle {
    display: none;
}
/* TYPES RECIPES */

#triangle-bottomright {
    width: 0;
    height: 0;
    border-bottom: 400px solid #00c4ff6b;
    border-left: 330px solid transparent;
    position: absolute;
    top: 0;
    right: 0;
}

img,
div.squar {
    transition: 1s;
}

.best-of-recipe {
}

.best-of-recipe .cover {
    height: auto;
    width: 100%;
    /* background: url("https://i.pinimg.com/564x/bb/0d/c5/bb0dc5b2d6c9566fa965809367ff29d2.jpg");
    background-size: inherit;
    background-repeat: no-repeat; */
}

.sing_up {
    height: 500px;
    background: url("https://i.pinimg.com/564x/38/61/10/386110194c0b59f92a1124fe85120836.jpg");
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
}

.bestChefs .separator {
    /* background-attachment: fixed; */
}

.bestChefs div.chefs {
    height: 500px;
    /* background: url('https://i.pinimg.com/564x/f6/4c/97/f64c97785241fefe3ea312f1bd225703.jpg');
    background-size: cover;
    background-position: right; */
    background: linear-gradient(transparent, #54545445, transparent);
}

.bestChefs .sep,
.salts .sep,
.sweats .sep {
    height: 1px;
    background: #ff8d00;
    margin: auto;
}

/* width */
.sweats .sliderSweats .d-inline-flex::-webkit-scrollbar {
    width: 5px;
    height: 5px;
}

/* Track */
.sweats .sliderSweats .d-inline-flex::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px #367a7a;
    border-radius: 10px;
}

/* Handle */
.sweats .sliderSweats .d-inline-flex::-webkit-scrollbar-thumb {
    background: #229191;
    border-radius: 10px;
}

#slide {
    transition: all 1s;
}

a.rounded-pill:hover {
    opacity: 0.7;
    transition: opacity 1s;
}
/* Extra small media */
@media only screen and (max-width: 760px) {
    .login-icon {
        top: 1% !important;
        left: 1% !important;
    }
    .btn-toggle {
        display: block;
        margin: 0.25rem !important;
    }
    .logo-title {
        left: 10%;
        width: 80%;
    }
    .index-nav #logo {
        display: none;
    }
    .index-nav .nav {
        display: none;
        background: #229191;
    }
    .index-nav .nav li.fs-4 {
        font-size: 0.9rem !important;
        width: 100% !important;
        text-align: center !important;
        margin-bottom: 5%;
    }
    .index-nav .nav li.fs-4 .sub-menu {
        position: relative !important;
        width: 100% !important;
    }
    .index-nav .nav {
        width: 100%;
    }
    .description {
        font-size: 0.9rem !important;
    }
    .header .shape div div:last-of-type div {
        background: white;
        border: none;
    }

    .best-of-recipe div:first-of-type{
        border: none !important;
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .logo-title {
        left: 20%;
        width: 60%;
    }
    .index-nav .nav {
        display: none;
        width: 100% !important;
        background: #229191;
    }
    .index-nav .nav li {
        display: flex;
        justify-content: center;
        flex-flow: row;
        flex-direction: column;
        align-items: center;
        
    }
    .index-nav .nav li #logo {
        display: none;
    }
    .index-nav .nav li .sub-menu{
        position: relative !important;
        width: 100% !important;
    }
    .index-nav .nav li .sub-menu .region .name-region{
        text-align: center;
    }
    .best-of-recipe div:first-of-type{
        border: none !important;
    }
}

@media only screen and (min-width: 992px) {
    .logo-title {
        left: 25%;
        width: 50%;
    }
    .btn-toggle {
        display: none !important;
    }
}
</style>
