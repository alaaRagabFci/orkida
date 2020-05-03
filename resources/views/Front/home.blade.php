@extends('Front.layouts')
@section('title',__('home.meta.homePage.title'))
@section('meta')
<meta name="keywords" content="{{ __('home.meta.homePage.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.homePage.description') }}">
@endsection
@section('content')
        <!-- order service -->
    <section id="main">
        <div class="first d-flex justify-content-center align-items-center">
            <p class="mb-0">{{ __('home.orderService.wantService') }}</p>
            <div class="select">
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected> {{ __('home.orderService.selectService') }}</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <i class="fa fa-chevron-left"></i>
            </div>
            <button class="btn-main"> {{ __('home.menu.searchBtn') }} </button>
        </div>
        <div class="second d-flex justify-content-center align-items-center">
            <p>{{ __('home.menu.contactUs') }}</p>
            <section class="d-flex">
                <!-- <img src="assets/img/noun_Phone_2717579.svg" alt=""> -->
                <i class="fas fa-phone"></i>
                <div>
                    <span>{{ __('home.orderService.usePhone') }}</span>
                    <p>056 300 35 30</p>
                </div>
            </section>
            <section class="d-flex">
                <!-- <img src="assets/img/noun_Mail_2698285.svg" alt=""> -->
                <i class="fas fa-envelope"></i>
                <div>
                    <span>{{ __('home.orderService.useMessage') }}</span>
                    <p>{{ __('home.orderService.sendMessage') }}</p>
                </div>
            </section>
        </div>
    </section>
    <!-- services -->
    <section id="services">
        <h3 class="title_1">{{ __('home.services') }}<img class="dots w-100" src="assets/img/Dots.svg" alt="">
        </h3>
        <div class="container-fluid">
            <div class="row services">
                <div class="col-lg-4">
                    <section class="backdrop">
                        <div class="overlay_filter"></div>
                        <a href="pest_control.html">
                            <img src="assets/img/services/Img1.png" alt="">
                            <h3 class="mb-0 w-100">مكافحة الآفات</h3>
                        </a>
                        <div class="info_text">
                            <h6 class="text-center"> مكافاه الافئات </h6>
                            <small class="text-center">مع كل يوم، نثبت دائماً أننا الأفضل في مجال مكافحة الحشرات لما نقدمه من خدمة إحترافية وخبرة عالية ونسعى دائماً لتحقيق الأفضل لك ولأسرتك، من خلال أسرع مكافحة لكافة أنواع الحشرات لنوفر لك منزل آمن وبيئة نظيفة..
                            </small>
                        </div>
                        <div class="more">
                            <a href="pest_control.html"> مزيد من التفاصيل </a>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="backdrop">
                        <div class="overlay_filter"></div>
                        <a href="">
                            <img src="assets/img/services/Img2.png" alt="">
                            <h3 class="mb-0 w-100 ">تنسيق حدائق</h3>
                        </a>
                        <div class="info_text">
                            <h6 class="text-center"> مكافاه الافئات </h6>
                            <small class="text-center">مع كل يوم، نثبت دائماً أننا الأفضل في مجال مكافحة الحشرات لما نقدمه من خدمة إحترافية وخبرة عالية ونسعى دائماً لتحقيق الأفضل لك ولأسرتك، من خلال أسرع مكافحة لكافة أنواع الحشرات لنوفر لك منزل آمن وبيئة نظيفة..
                            </small>
                        </div>
                        <div class="more">
                            <a href="#"> قراءه المزيد </a>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="backdrop">
                        <div class="overlay_filter"></div>
                        <a href="">
                            <img src="assets/img/services/Img3.png" alt="">
                            <h3 class="mb-0 w-100 ">تنسيق حدائق</h3>
                        </a>
                        <div class="info_text">
                            <h6 class="text-center"> مكافاه الافئات </h6>
                            <small class="text-center">مع كل يوم، نثبت دائماً أننا الأفضل في مجال مكافحة الحشرات لما نقدمه من خدمة إحترافية وخبرة عالية ونسعى دائماً لتحقيق الأفضل لك ولأسرتك، من خلال أسرع مكافحة لكافة أنواع الحشرات لنوفر لك منزل آمن وبيئة نظيفة..
                            </small>
                        </div>
                        <div class="more">
                            <a href="#"> قراءه المزيد </a>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="backdrop">
                        <div class="overlay_filter"></div>
                        <a href="">
                            <img src="assets/img/services/Img4.png" alt="">
                            <h3 class="mb-0 w-100 ">تنسيق حدائق</h3>
                        </a>
                        <div class="info_text">
                            <h6 class="text-center"> مكافاه الافئات </h6>
                            <small class="text-center">مع كل يوم، نثبت دائماً أننا الأفضل في مجال مكافحة الحشرات لما نقدمه من خدمة إحترافية وخبرة عالية ونسعى دائماً لتحقيق الأفضل لك ولأسرتك، من خلال أسرع مكافحة لكافة أنواع الحشرات لنوفر لك منزل آمن وبيئة نظيفة..
                            </small>
                        </div>
                        <div class="more">
                            <a href="#"> قراءه المزيد </a>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="backdrop">
                        <div class="overlay_filter"></div>
                        <a href="">
                            <img src="assets/img/services/Img5.png" alt="">
                            <h3 class="mb-0 w-100 ">تنسيق حدائق</h3>
                        </a>
                        <div class="info_text">
                            <h6 class="text-center"> مكافاه الافئات </h6>
                            <small class="text-center">مع كل يوم، نثبت دائماً أننا الأفضل في مجال مكافحة الحشرات لما نقدمه من خدمة إحترافية وخبرة عالية ونسعى دائماً لتحقيق الأفضل لك ولأسرتك، من خلال أسرع مكافحة لكافة أنواع الحشرات لنوفر لك منزل آمن وبيئة نظيفة..
                            </small>
                        </div>
                        <div class="more">
                            <a href="#"> قراءه المزيد </a>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="backdrop">
                        <div class="overlay_filter"></div>
                        <a href="">
                            <img src="assets/img/services/Img6.png" alt="">
                            <h3 class="mb-0 w-100 ">تنسيق حدائق</h3>
                        </a>
                        <div class="info_text">
                            <h6 class="text-center"> مكافاه الافئات </h6>
                            <small class="text-center">مع كل يوم، نثبت دائماً أننا الأفضل في مجال مكافحة الحشرات لما نقدمه من خدمة إحترافية وخبرة عالية ونسعى دائماً لتحقيق الأفضل لك ولأسرتك، من خلال أسرع مكافحة لكافة أنواع الحشرات لنوفر لك منزل آمن وبيئة نظيفة..
                            </small>
                        </div>
                        <div class="more">
                            <a href="#"> قراءه المزيد </a>
                        </div>
                    </section>
                </div>
                <div class="w-100">
                    <a href="services.html" class="mr-auto btn-border d-block">
                    {{ __('home.seeAll.seeAllServices') }}
                        <i class="fa fa-chevron-left "></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="video">
        <img class="shield-img" src="../assets/img/Shield (1).svg " alt=" ">
        <div class="d-flex align-items-center ">
            <div>
                <h3>يشرفنا تعاملكم مع اوركيدا</h3>
                <p>مع كل يوم، نثبت دائماً أننا الأفضل في مجال مكافحة الحشرات لما نقدمه من خدمة إحترافية وخبرة عالية ونسعى دائماً لتحقيق الأفضل لك ولأسرتك، من خلال أسرع مكافحة لكافة أنواع الحشرات لنوفر لك منزل آمن وبيئة نظيفة..
                </p>
                <button class="btn-main">{{ __('home.menu.aboutUs') }}</button>
            </div>
            <div class="video-wrapper">
                <video src="https://www.youtube.com/watch?v=H1BQeRBmvC0 " poster="../assets/img/man-standing-next-to-his-van.png "></video>
            </div>
        </div>
    </section>
    <!-- start slider here -->

    <section class="slider" id="slider">
        <h3 class="title_1">{{ __('home.menu.pestLibrary') }} <img class="dots w-100" src="assets/img/Dots.svg " alt=" "></h3>

        <div class="outer">
            <div id="big" class="owl-carousel owl-theme">
                <div class="item ">
                    <img src="assets/img/img1.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore ">المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore ">المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img1.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore "> المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore "> المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img1.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore "> المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore "> المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img1.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore ">المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> النمل الأبيض </h1>
                        <p>
                            عرَّف النمل الأبيض (بالإنجليزية: Termite) بكونه مجموعة من الحشرات آكلة السليولوز (بالإنجليزية: cellulose)، كما ويشار إليه باسم "النمل الأبيض " كونه لا ينتمي إلى فصيلة النمل العادي، على الرغم من أن نظامه الاجتماعي يتماثل مع النظام الخاص بالنمل والنحل،
                        </p>
                        <a href="# " class="raedMore ">المزيد من التفاصيل <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
            </div>
            <div id="thumbs" class="owl-carousel owl-theme">
                <div class="item">
                    <img src="assets/img/img1.jpg">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> النمل الابيض </h6>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> الصراصير </h6>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img1.jpg ">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> النمل الابيض </h6>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> الصراصير </h6>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img1.jpg ">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> النمل الابيض </h6>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> الصراصير </h6>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img1.jpg ">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> النمل الابيض </h6>
                    </div>
                </div>
                <div class="item ">
                    <img src="assets/img/img2.jpg ">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> الصراصير </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="padding-80 mt-4">
            <a href="pest_library.html" class="mr-auto btn-border d-block">
            {{ __('home.seeAll.seeAllPestLibraries') }}
                    <i class="fa fa-chevron-left "></i>
                </a>
        </div>
    </section>

    <!-- <section class="library "></section> -->
    <section id="articles" class="article">
        <h3 class="title_1">{{ __('home.latestArticles') }}<img class="dots w-100 " src="assets/img/Dots.svg " alt=" ">
        </h3>
        <div class="container-fluid">
            <div class="row services">
                <div class="col-lg-7 col-md-12">
                    <div class="gallery-slider-for">
                        <div class="slider-item">
                            <div class="item">
                                <div class="article-img">
                                    <img src="assets/img/download@2x.png" alt=" ">
                                    <article>
                                        <h4>النمل الأبيض و طرق لتخلص منه</h4>
                                        <p>الثلاثاء 22 / 6 / 2019</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="gallery-slider-nav">
                        <div class="slider-item d-flex">
                            <div class="item_thumb">
                                <img src="assets/img/download.png" alt="">
                            </div>
                            <div class="article_info">
                                <h4>طرق التنظيف الأكثر فاعلية</h4>
                                <p class="mb-3 ">تنظيف بالبخار أصبح أداة التنظيف المفضلة لدى العديد من الأشخاص وخاصة هؤلاء الذين يعانون من الربو والحساسية تجاه المواد والمنظفات الكيميائية.</p>
                                <p class="m-0">
                                    الثلاثاء 22 / 6 / 2019
                                </p>
                            </div>
                        </div>
                        <div class="slider-item d-flex">
                            <div class="item_thumb">
                                <img src="assets/img/bigstock-Plumber-160449857-1024x791.png" alt="">
                            </div>
                            <div class="article_info">
                                <h4>طرق التنظيف الأكثر فاعلية</h4>
                                <p class="mb-3 ">تنظيف بالبخار أصبح أداة التنظيف المفضلة لدى العديد من الأشخاص وخاصة هؤلاء الذين يعانون من الربو والحساسية تجاه المواد والمنظفات الكيميائية.</p>
                                <p class="m-0">
                                    الثلاثاء 22 / 6 / 2019
                                </p>
                            </div>
                        </div>
                        <div class="slider-item d-flex">
                            <div class="item_thumb">
                                <img src="assets/img/Pros-and-Cons-of-Using-Professional-Movers-in-New-York-City.png" alt="">
                            </div>
                            <div class="article_info">
                                <h4>طرق التنظيف الأكثر فاعلية</h4>
                                <p class="mb-3 ">تنظيف بالبخار أصبح أداة التنظيف المفضلة لدى العديد من الأشخاص وخاصة هؤلاء الذين يعانون من الربو والحساسية تجاه المواد والمنظفات الكيميائية.</p>
                                <p class="m-0">
                                    الثلاثاء 22 / 6 / 2019
                                </p>
                            </div>
                        </div>
                        <div class="slider-item d-flex">
                            <div class="item_thumb">
                                <img src="assets/img/download.png" alt="">
                            </div>
                            <div class="article_info">
                                <h4>طرق التنظيف الأكثر فاعلية</h4>
                                <p class="mb-3 ">تنظيف بالبخار أصبح أداة التنظيف المفضلة لدى العديد من الأشخاص وخاصة هؤلاء الذين يعانون من الربو والحساسية تجاه المواد والمنظفات الكيميائية.</p>
                                <p class="m-0">
                                    الثلاثاء 22 / 6 / 2019
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="arrow-container-postion web">
                        <a href="#" class="prev slick-arrow"> <i class="fa fa-angle-right"></i> </a>
                        <a href="#" class="next slick-arrow"> <i class="fa fa-angle-left"></i> </a>
                    </div>
                </div>
            </div>
            <div class="more-buttons">
                <div class="arrow-container mobile">
                    <a href="#" class="prev slick-arrow"> <i class="fa fa-angle-right"></i> </a>
                    <a href="#" class="next slick-arrow"> <i class="fa fa-angle-left"></i> </a>
                </div>
                <div class="w-100 mt-2">
                    <a href="blog.html" class="mr-auto btn-border d-block">
                    {{ __('home.seeAll.seeAllArticles') }}
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="right-section ">
            <h3 class="web ">{{ __('home.contactUsSection.happyContact') }}</h3>
            <h3 class="mob text-center">{{ __('home.contactUsSection.saveServiceForYouMob') }}</h3>
            <div class="all-items">
                <div class="item d-flex">
                    <img src="../assets/img/contact/icon1.svg " alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.safe_active') }}</h4>
                        <p>{{ __('home.contactUsSection.safe_active_desc') }}</p>
                    </div>
                </div>
                <div class="item d-flex ">
                    <img src="../assets/img/contact/icon2.svg " alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.guarantee') }}</h4>
                        <p>{{ __('home.contactUsSection.guarantee_desc') }}</p>
                    </div>
                </div>
                <div class="item d-flex ">
                    <img src="../assets/img/contact/icon3.svg " alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.suitableService') }}</h4>
                        <p>{{ __('home.contactUsSection.suitableService_desc') }}</p>
                    </div>
                </div>
                <div class="item d-flex ">
                    <img src="../assets/img/contact/icon4.svg " alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.aboutUs') }}</h4>
                        <p>{{ __('home.contactUsSection.aboutUs') }}</p>
                    </div>
                </div>
            </div>
            <div class="d-flex call-loction ">
                <div>
                    <h4><img src="../assets/img/noun_call.svg " alt=" "> {{ __('home.orderService.usePhone') }}</h4>
                    <p>056 30 03 530</p>
                </div>
                <div>
                    <h4><img src="../assets/img/noun_place_1989108.svg " alt=" "> {{ __('home.contactUsSection.address') }} </h4>
                    <p>مدينة جدة ، شارع الأمام الشافعي</p>
                </div>
            </div>
        </div>
        <h3 class="mob ">{{ __('home.contactUsSection.happyContact') }}</h3>
        <div class="form ">
            <form action=" ">
                <label for="fname">{{ __('home.contactUsSection.contactForm.name') }}</label>
                <input type="text" id="fname" class="form-control">
                <label for="phone ">{{ __('home.contactUsSection.contactForm.mobile') }}</label>
                <input type="phone " id="phone" class="form-control">
                <label for="email ">{{ __('home.contactUsSection.contactForm.email') }}</label>
                <input type="email" id="email" class="form-control">
                <label for="msg">{{ __('home.contactUsSection.contactForm.topic') }}</label>
                <textarea id="msg" class="form-control"></textarea>
                <button class="btn-main mt-2 " type="submit ">{{ __('home.contactUsSection.contactForm.sendBtn') }}</button>
            </form>
        </div>
    </section>
    <section id="send-email">
        <h3>{{ __('home.subscriptions.subscribe') }}</h3>
        <div class="text-center">
            <button>{{ __('home.subscriptions.subscribeBtn') }}</button>
            <input type="email" placeholder="{{ __('home.subscriptions.emailPlaceHolder') }} ">
        </div>
    </section>
@endsection