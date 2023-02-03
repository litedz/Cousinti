@extends('app')

@section('app')


<div class="header" style="width: 100%;height: 1000px;">
    <div class="loading">
        <div>
            <h1 class="">Loading ...</h1>
            <div class="mt-5">
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <nav-bar></nav-bar>

    <div class="cover_media w-100 h-100">
        <div class="bg-black h-100 opacity-75  w-100"></div>
    </div>
    <div class="content d-flex h-100 m-auto overflow-hidden position-absolute w-100 justify-items-baseline" style="top: 20%; z-index: 500;">
        <div class="container d-flex flex-row" dir="rtl">
            <div class="cover">
                <img class="position-absolute" src="{{asset('/images/c1c1.png')}}" alt="" style="width: 60%;left: -8%;top: 0%;">

            </div>
            <div class="right_area w-100 position-relative d-flex flex-column" style="top: 10%;">
                <div class="display-1 d-flex title-website"> ماعرفتيش واش <div class="text-first">طيبي ? </div>
                </div>
                <div class="sub-text h-25 lh-lg mt-5 overflow-hidden  w-50">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                </div>
                <div class="mt-5">
                    <button type="button" id="btn_solution" href="#" class="btn-primary-perso rounded-5 border-0 pt-2" style="letter-spacing: 1px;">عدنا الحل </button>
                </div>
            </div>

        </div>
    </div>
</div>



<section class="choose_food h-auto mb-5" style="width:100 ; height: 900px;">
    <div class="container">
        <div class="row">
            <div class="align-items-center col-12 text-dark d-flex flex-row-reverse justify-content-center mb-5 text-center">
                <img class="ms-2" src="{{asset('images/V2.png') }}" alt="">
                <h1>انواع الوصفات</h1>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 position-relative p-0 item overflow-hidden">
                <div class=" name position-absolute text-center" style="margin: 0 2%;width: 96%;z-index: 1;top: 40%;">
                    <div class="display-6 font-weight-bolder text-white">Gratine</div>
                </div>
                <div class="h-100 opt position-absolute w-100 overflow-hidden"></div>
                <img class="w-100 item" src="{{asset('images/1.jpg')}}" alt="" srcset="" style="height: 500px;">
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 position-relative p-0 item overflow-hidden">
                <div class=" name position-absolute text-center" style="margin: 0 2%;width: 96%;z-index: 1;top: 40%;">
                    <div class="display-6 font-weight-bolder text-white">Gratine</div>
                </div>
                <div class="h-100 opt position-absolute w-100 overflow-hidden"></div>
                <img class="w-100 item" src="{{asset('images/1.jpg')}}" alt="" srcset="" style="height: 500px;">
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 position-relative p-0 item overflow-hidden">
                <div class=" name position-absolute text-center" style="margin: 0 2%;width: 96%;z-index: 1;top: 40%;">
                    <div class="display-6 font-weight-bolder text-white">Gratine</div>
                </div>
                <div class="h-100 opt position-absolute w-100 overflow-hidden"></div>
                <img class="w-100 item" src="{{asset('images/1.jpg')}}" alt="" srcset="" style="height: 500px;">
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 position-relative p-0 item overflow-hidden">
                <div class=" name position-absolute text-center" style="margin: 0 2%;width: 96%;z-index: 1;top: 40%;">
                    <div class="display-6 font-weight-bolder text-white">Gratine</div>
                </div>
                <div class="h-100 opt position-absolute w-100 overflow-hidden"></div>
                <img class="w-100 item" src="{{asset('images/1.jpg')}}" alt="" srcset="" style="height: 500px;">
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 position-relative p-0 item overflow-hidden">
                <div class=" name position-absolute text-center" style="margin: 0 2%;width: 96%;z-index: 1;top: 40%;">
                    <div class="display-6 font-weight-bolder text-white">Gratine</div>
                </div>
                <div class="h-100 opt position-absolute w-100 overflow-hidden"></div>
                <img class="w-100 item" src="{{asset('images/1.jpg')}}" alt="" srcset="" style="height: 500px;">
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 position-relative p-0 item overflow-hidden">
                <div class=" name position-absolute text-center" style="margin: 0 2%;width: 96%;z-index: 1;top: 40%;">
                    <div class="display-6 font-weight-bolder text-white">Gratine</div>
                </div>
                <div class="h-100 opt position-absolute w-100 overflow-hidden"></div>
                <img class="w-100 item" src="{{asset('images/1.jpg')}}" alt="" srcset="" style="height: 500px;">
            </div>
        </div>
</section>

<section class="sweets mb-5">
    <div class="container p-1">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="images">
                    <img class="img-fluid" src="{{asset('images/chef_sweet.jpg')}}" alt="">
                    <img class="img-fluid vector_3 position-relative " src="{{asset('images/V3.png')}}" alt="">
                </div>

            </div>
            <div class="col-md-6 col-xs-12 text-right text-dark">
                <div class="intoduction w-100 h-100">
                    <div class="title h4 ">
                        انواع الحلويات الجزائرية
                    </div>
                    <div class="text lh-lg mt-5 ps-5 mb-5 w-100 h-50">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...
                    </div>
                    <div class="d-flex justify-content-end readMore ">
                        <div class="btn-primary-perso rounded-5 ">
                            <a href="#" class="position-relative text-decoration-none h5 font-weight-bolder">
                                متابعة </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-around mt-5">
                <div class="shapes w-25">
                    <div class="shape mt-2 m-auto w-100"></div>
                    <div class="shape mt-2 m-auto w-75"></div>
                    <div class="shape mt-2 m-auto w-50"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="recette text-dark mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
                <div class="left-area">
                    <div class="item mb-5   position-relative rounded-bottom text-right">
                        <div class="right-shape ">
                            <img class="end-0 position-absolute" src="{{asset('images/V4.png')}}" alt="">
                        </div>
                        <div class="p-4">
                            <div class="image_recette position-relative w-100">
                                <div class="bg-black h4 opacity-75 p-2 position-absolute text-center text-white type_of_recette w-100" style="top: 40%;">
                                    gratin
                                </div>
                                <img class="rounded w-100" src="{{asset('images/2.jpg')}}" alt="" style="height: 250px;">
                            </div>

                            <div class="info_recette">
                                <div class="title h4 font-weight-normal mb-3 mt-2 ">نفس تحتاج</div>
                                <div class="detaile mb-5 text-black-50 font-14 lh-lg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <a href="#" class="bg-primary-color font-weight-bold font-16 p-3 position-absolute rounded-3 text-center text-decoration-none text-white w-50" style="box-shadow: -1px 3px 3px 2px #838383;">الوصفة كاملة</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-area">
                    <div class="item   position-relative rounded-bottom text-right">
                        <div class="right-shape ">
                            <img class="end-0 position-absolute" src="{{asset('images/V4.png')}}" alt="">
                        </div>
                        <div class="p-4">
                            <div class="image_recette position-relative w-100">
                                <div class="bg-black h4 opacity-75 p-2 position-absolute text-center text-white type_of_recette w-100" style="top: 40%;">
                                    gratin
                                </div>
                                <img class="rounded w-100" src="{{asset('images/2.jpg')}}" alt="" style="height: 250px;">
                            </div>

                            <div class="info_recette">
                                <div class="title h4 font-weight-normal mb-3 mt-2 ">نفس تحتاج</div>
                                <div class="detaile mb-5 text-black-50 font-14 lh-lg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <a href="#" class="bg-primary-color font-weight-bold font-16 p-3 position-absolute rounded-3 text-center text-decoration-none text-white w-50" style="box-shadow: -1px 3px 3px 2px #838383;">الوصفة كاملة</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-3 mb-5">
                <div class="left-area">
                    <div class="item mb-5   position-relative rounded-bottom text-right">
                        <div class="right-shape ">
                            <img class="end-0 position-absolute" src="{{asset('images/V4.png')}}" alt="">
                        </div>
                        <div class="p-4">
                            <div class="image_recette position-relative w-100">
                                <div class="bg-black h4 opacity-75 p-2 position-absolute text-center text-white type_of_recette w-100" style="top: 40%;">
                                    gratin
                                </div>
                                <img class="rounded w-100" src="{{asset('images/2.jpg')}}" alt="" style="height: 250px;">
                            </div>

                            <div class="info_recette">
                                <div class="title h4 font-weight-normal mb-3 mt-2 ">نفس تحتاج</div>
                                <div class="detaile mb-5 text-black-50 font-14 lh-lg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <a href="#" class="bg-primary-color font-weight-bold font-16 p-3 position-absolute rounded-3 text-center text-decoration-none text-white w-50" style="box-shadow: -1px 3px 3px 2px #838383;">الوصفة كاملة</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-area">
                    <div class="item   position-relative rounded-bottom text-right">
                        <div class="right-shape ">
                            <img class="end-0 position-absolute" src="{{asset('images/V4.png')}}" alt="">
                        </div>
                        <div class="p-4">
                            <div class="image_recette position-relative w-100">
                                <div class="bg-black h4 opacity-75 p-2 position-absolute text-center text-white type_of_recette w-100" style="top: 40%;">
                                    gratin
                                </div>
                                <img class="rounded w-100" src="{{asset('images/2.jpg')}}" alt="" style="height: 250px;">
                            </div>

                            <div class="info_recette">
                                <div class="title h4 font-weight-normal mb-3 mt-2 ">نفس تحتاج</div>
                                <div class="detaile mb-5 text-black-50 font-14 lh-lg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى ...
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <a href="#" class="bg-primary-color font-weight-bold font-16 p-3 position-absolute rounded-3 text-center text-decoration-none text-white w-50" style="box-shadow: -1px 3px 3px 2px #838383;">الوصفة كاملة</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                <div class="h-100 right-area w-100">
                    <div class="item w-100 h-auto  p-3 d-flex border-bottom">
                        <img class="w-25  float-left" src="{{asset('images/2.jpg') }}" alt="" style="height:150px ;">

                        <div class="d-flex detaile text-right flex-column">
                            <div class="font-weight-bold mb-2 title">نص تجربة</div>
                            <div class="font-14 mb-2 text text-black  overflow-hidden lh-lg" style="height:80px ;">
                                أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                            </div>
                            <a href="#" class="font-weight-bold primary-color text-decoration-none">read more</a>

                        </div>




                    </div>
                    <div class="item w-100 h-auto  p-3 d-flex border-bottom">
                        <img class="w-25  float-left" src="{{asset('images/2.jpg') }}" alt="" style="height:150px ;">

                        <div class="d-flex detaile text-right flex-column">
                            <div class="font-weight-bold mb-2 title">نص تجربة</div>
                            <div class="font-14 mb-2 text text-black  overflow-hidden lh-lg" style="height:80px ;">
                                أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                            </div>
                            <a href="#" class="font-weight-bold primary-color text-decoration-none">read more</a>

                        </div>




                    </div>
                    <div class="item w-100 h-auto  p-3 d-flex border-bottom">
                        <img class="w-25  float-left" src="{{asset('images/2.jpg') }}" alt="" style="height:150px ;">

                        <div class="d-flex detaile text-right flex-column">
                            <div class="font-weight-bold mb-2 title">نص تجربة</div>
                            <div class="font-14 mb-2 text text-black  overflow-hidden lh-lg" style="height:80px ;">
                                أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                            </div>
                            <a href="#" class="font-weight-bold primary-color text-decoration-none">read more</a>

                        </div>




                    </div>
                    <div class="item w-100 h-auto  p-3 d-flex border-bottom">
                        <img class="w-25  float-left" src="{{asset('images/2.jpg') }}" alt="" style="height:150px ;">

                        <div class="d-flex detaile text-right flex-column">
                            <div class="font-weight-bold mb-2 title">نص تجربة</div>
                            <div class="font-14 mb-2 text text-black  overflow-hidden lh-lg" style="height:80px ;">
                                أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                            </div>
                            <a href="#" class="font-weight-bold primary-color text-decoration-none">read more</a>

                        </div>




                    </div>
                    <div class="item w-100 h-auto  p-3 d-flex border-bottom">
                        <img class="w-25  float-left" src="{{asset('images/2.jpg') }}" alt="" style="height:150px ;">

                        <div class="d-flex detaile text-right flex-column">
                            <div class="font-weight-bold mb-2 title">نص تجربة</div>
                            <div class="font-14 mb-2 text text-black  overflow-hidden lh-lg" style="height:80px ;">
                                أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                            </div>
                            <a href="#" class="font-weight-bold primary-color text-decoration-none">read more</a>

                        </div>




                    </div>
                    <div class="item w-100 h-auto  p-3 d-flex border-bottom">
                        <img class="w-25  float-left" src="{{asset('images/2.jpg') }}" alt="" style="height:150px ;">

                        <div class="d-flex detaile text-right flex-column">
                            <div class="font-weight-bold mb-2 title">نص تجربة</div>
                            <div class="font-14 mb-2 text text-black  overflow-hidden lh-lg" style="height:80px ;">
                                أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                            </div>
                            <a href="#" class="font-weight-bold primary-color text-decoration-none">read more</a>

                        </div>




                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<section class="sing_up bg-dark position-relative d-flex align-items-center mb-5">
    <div class="bg-black h-100 opacity-75 opt w-100 position-absolute"></div>
    <div class="container position-relative text-white" style="z-index: 22;">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="">

                    <div class="font-14 lh-lg text-right">أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أوالعديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أنمن النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا النص أو العديد من النصوص أن تولد مثل هذا
                    </div>
                    <div class="form mt-4 mt-lg-5">
                        <a href="#" class="btn-primary-perso font-weight-bolder font-22 rounded-pill  rounded text-first" style="color:white;background:#069A8E">حساب</a>
                        <a href="#" class="btn-primary-perso bg-transparent border font-22 text-white  rounded-pill font-weight-bolder rounded text-first">القوانين</a>

                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 ">
                <div class="display-1 font-weight-bolder" dir="rtl">جربة وصفة ونجحتلك ? </div>
            </div>
        </div>
    </div>
</section>
<section class="best_comment w-100">
    <div class="container">

        <!-- <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="avatar text-center">
                    <img class="rounded-circle position-relative z-index-5" src="{{asset('images/avatar.jpg')}}" alt="">
                </div>
                <div class="comment font-14 lh-lg position-relative w-100 z-index-2" style="">

                    <div class="p-4 text text-center">
                        <i class="fa-solid fa-quote-left float-left  text-dark"></i>
                        <div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere aut quas delectus magnam nesciunt iure, alias ratione? Consequatur a quasi voluptates! Sint laudantium, nulla amet nam hic eius totam accusamus.
                        </div>
                        <i class="fa-solid fa-quote-right  bottom-0 position-absolute text-dark" style="right: 15%;bottom: 3%;"></i>
                    </div>

                </div>
            </div>  -->


        <div class="comments" dir="rtl">
            <div class="row d-flex justify-content-around row">
                <div class="col-12 col-lg-12 col-md-12  m-5 p-4" style="color: #db1e5b;">
                    <h1 class="display-1 font-weight-bolder">افضل التعليقات</h1>
                </div>
                <div class="bg-light col-10 col-lg-3 col-md-6 col-xl-2 comment  p-4 roundedtext-right position-relative shadow">
                    <div class="h-25 overflow-hidden text">
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث التى يولدها التطبيق.
                    </div>
                    <div class="avatar">
                        <img class="mt-4 rounded-circle" src="{{asset('images/avatar.jpg')}}" alt="">
                    </div>
                    <div class="font-weight-bold h5 mt-3 name_user">azezaeaezaezazea</div>
                    <div class="font-14 mt-3 rank text-black-50">Rank</div>
                </div>
                <div class="bg-light col-10 col-lg-3 col-md-6  col-xl-2 comment  p-4 rounded  text-right position-relative shadow">
                    <div class="h-25 overflow-hidden text">
                        إذا كنت تحتاج إلىتريد، النص لن يبدو مى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                    </div>
                    <div class="avatar">
                        <img class="mt-4 rounded-circle" src="{{asset('images/avatar.jpg')}}" alt="">
                    </div>
                    <div class="font-weight-bold h5 mt-3 name_user">azezaeaezaezazea</div>
                    <div class="font-14 mt-3 rank text-black-50">Rank</div>
                </div>
                <div class="bg-light col-10 col-lg-3 col-md-6  col-xl-2 comment  p-4 rounded text-right position-relative shadow">
                    <div class="h-25 overflow-hidden text">
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنكلى زيادة عدد الحروف التى يولدها التطبيق.

                    </div>
                    <div class="avatar">
                        <img class="mt-4 rounded-circle" src="{{asset('images/avatar.jpg')}}" alt="">
                    </div>
                    <div class="font-weight-bold h5 mt-3 name_user">azezaeaezaezazea</div>
                    <div class="font-14 mt-3 rank text-black-50">Rank</div>
                </div>

            </div>


        </div>

    </div>
</section>

<section class="footer" dir="rtl">
    <div class="bg-dark d-flex top-border w-100 justify-content-around p-1">
        <img class="rounded-circle" src="{{asset('images/logo2.png')}}" alt="">

    </div>
    <div class="content h-100 w-100 position-relative">
        <div class="bg-dark h-100 opacity-50 opt position-absolute w-100" style="z-index: 1;"></div>
        <div class="container position-relative text-white" style="z-index: 10;">

            <div class="row">
                <div class="col-6 col-md-4 pt-5">
                    <div class="site-map">
                        <div class="h1">خريطة الموقع</div>
                        <nav class="list-unstyled d-flex flex-column">

                            <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3" href="#">
                                <span style="background: #069A8E;" class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                رئسية</a>
                            </li>

                            <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3" href="#">
                                <span style="background: #069A8E;" class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                رئسية</a>

                            <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3" href="#">
                                <span style="background: #069A8E;" class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                رئسية</a>


                            <a class="font-16 font-weight-bolder text-decoration-none text-white mt-3" href="#">
                                <span style="background: #069A8E;" class="fa fa-home font-14 ms-3  p-2 rounded-circle"></span>
                                رئسية</a>

                        </nav>
                    </div>
                </div>
                <div class="col-6 col-md-4 pt-5 position-relative">
                    <div class="separator position-absolute">
                        <img src="{{asset('images/l33.png')}}" alt="" srcset="">
                    </div>
                    <div class="social_media  d-flex flex-column justify-content-between">
                        <div class="font-weight-bolder h2 mb-4">منصات التواصل الاجتماعي</div>
                        <div class="d-flex align-items-center mt-3">
                            <img class="ms-3 rounded-circle" src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png" alt="">
                            <div class="font-22"><a id="mediaLink" href="#" class="font-weight-bolder text-decoration-none">متابعتنا علي صفحة الفيس بوك</a></div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <img class="ms-3 rounded-circle" src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png" alt="">
                            <div class="font-22"><a id="mediaLink" href="#" class="font-weight-bolder text-decoration-none">متابعتنا علي صفحة الفيس بوك</a></div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <img class="ms-3 rounded-circle" src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png" alt="">
                            <div class="font-22"><a id="mediaLink" href="#" class=" font-weight-bolder text-decoration-none">متابعتنا علي صفحة الفيس بوك</a></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 d-flex flex-column justify-content-between pt-5 subscribe position-relative">
                    <div class="separator position-absolute">
                        <img src="{{asset('images/l33.png')}}" alt="" srcset="">
                    </div>
                    <h1>متابعتنا</h1>
                    <div class="font-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque error fugit dolore mollitia consectetur animi facere minus nobis blanditiis nulla aut adipisci itaque, ullam temporibus deleniti. Explicabo pariatur cumque excepturi.</div>
                    <input class="form-control" type="text" name="">
                    <button type="submit" class="btn btn-primary btn-info">اشتراك</button>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center text-white w-100">
        Copyright
    </div>
</section>








@endsection