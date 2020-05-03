<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index,follow"><meta name="description" content="Discover and buy electronics, computers, apparel &amp; accessories, shoes, watches, furniture, home and kitchen goods, beauty &amp; personal care, grocery, gourmet food &amp; more. Enjoy great deals, fastest delivery and cash on delivery | Souq.com">
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="assets/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900&display=swap&subset=arabic" rel="stylesheet">
    <link href="{{ asset('/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/nice-select.css')}}">
    @if(request()->is(app()->getLocale()))
        <link href="{{ asset('/assets/css/slick-carousel.css')}}" rel="stylesheet">
        <link href="{{ asset('/assets/css/slick-carouse-theme.css')}}" rel="stylesheet">
    @endif

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('/assets/css/style_ar.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css')}}">
    @else
        <link rel="stylesheet" href="{{ asset('/assets/css/style_en.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/css/responsive_en.css')}}">
    @endif
</head>

<body class="other_pages_body bg-gray">
    <!-- Back to top button -->
    <div id="buttonBackToTop">
        <img src="assets/img/up.png" alt="">
    </div>
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <p>{{ __('home.menu.searchTxt') }}</p>
            <input type="text" class="form-control" name="search" id="">
            <button class="btn-main">{{ __('home.menu.searchBtn') }}</button>
        </div>
    </div>
    <!-- start header -->
    <header class="{{request()->is(app()->getLocale()) ? 'homePage' : 'other_Pages' }}">
        <div id="openSearch" class="bg-info mt-4 mobile-search-web  mobile">
            <h6 class="title-wdight"> {{ __('home.menu.searchTxtMob') }} </h6>
            <form>
                <div class="form-group">
                    <input type="text " class="form-control " id=" " placeholder=" ">
                </div>
                <div class="form-group">
                    <button class="btn-main btn-bg-pink w-100">{{ __('home.menu.searchBtn') }}</button>
                </div>
            </form>
        </div>
        @if(request()->is(app()->getLocale()))
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
            </ul>
            <div class="carousel-inner">
        @endif        
                <!-- nav bar -->
                <nav class="navbar navbar-expand-md" id="{{request()->is(app()->getLocale()) ? 'NavBar' : '' }}">
                    <a class="navbar-brand" href="index.html">
                        <img src="../assets/img/logo@2x.png" alt="">
                    </a>

                    <div class="mob other">
                        <div class="d-flex">
                            <img class="img img_search" onclick="openNavSearch()" src="../assets/img/tw/noun_Search_2680509.svg" alt="">
                            <div class="dropdown">
                                <button type="button" class="nav-link btn dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img_call" src="../assets/img/tw/call.svg" alt="">  
                                </button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="tel:056 30 03 530">
                                        05655 30 03 530  <img class="other_call center" src="assets/img/tw/call.svg" alt=""> 
                                    </a>
                                    <a class="dropdown-item" href="tel:056 30 03 533">
                                       056 30 03 533 <img class="other_call center" src="assets/img/tw/call.svg" alt="">
                                    </a>
                                    <a class="dropdown-item" href="tel:056 30 03 540">
                                        056 30 03 540 <img class="other_call" src="assets/img/tw/call.svg" alt="">
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="contact.html">
                                    {{ __('home.menu.contactUs') }} <img class="other_call" src="assets/img/mob/noun_Mail_1571628.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <!-- <i class="fas fa-bars"></i> -->
                            <span class="one"></span>
                            <span class="two"></span>
                            <span class="three"></span>
                            </button>
                            <!-- <div id="toggle">
                                <div class="one"></div>
                                <div class="two"></div>
                                <div class="three"></div>
                            </div> -->
                        </div>
                    </div>

                    <div class="navbar-collapse collapse" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="active">
                                <div class="btn-group">
                                    <a href="pest_bites.html" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-chevron-down"></i> {{ __('home.menu.pestControl') }}
                                    </a>
                                    <div class="dropdown-menu midmenu">
                                        <div class="row">
                                            <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="pest_control_details.html"> مكافحه النمل الابيض </a>
                                                <a class="dropdown-item" href="#">مكافحه بق الفراش</a>
                                                <a class="dropdown-item" href="#"> مكافحه الصراصير </a>
                                                <a class="dropdown-item" href="#"> مكافحه الفئران </a>
                                                <a class="dropdown-item" href="#"> مكافحه النمل</a>
                                            </div>
                                            <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="#">مكافحه السمك الفضى</a>
                                                <a class="dropdown-item" href="#">مكافحه السوس</a>
                                                <a class="dropdown-item" href="#">مكافحه الخنافس</a>
                                                <a class="dropdown-item" href="#"> مكافحه الناموس </a>
                                                <a class="dropdown-item" href="#"> مكافحه البراغيت </a>
                                            </div>
                                            <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="#"> افات اخرى </a>
                                                <a class="dropdown-item" href="faq.html"> اكثر الاسئله المكرره </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group">
                                    <a href="pest_library.html" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-chevron-down"></i> {{ __('home.menu.pestLibrary') }}
                                    </a>
                                    <div class="dropdown-menu midmenu">
                                        <div class="row">
                                            <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="#"> نمل ابيض </a>
                                                <a class="dropdown-item" href="#"> النمل </a>
                                                <a class="dropdown-item" href="#"> البعوض </a>
                                                <a class="dropdown-item" href="#"> الصراصير </a>
                                                <a class="dropdown-item" href="#"> سوس الخشب </a>
                                            </div>
                                            <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="#"> الذباب </a>
                                                <a class="dropdown-item" href="#"> السمك الفضى </a>
                                                <a class="dropdown-item" href="#"> الخنافس </a>
                                                <a class="dropdown-item" href="#"> الهاموش </a>
                                                <a class="dropdown-item" href="#"> البراغيت </a>
                                            </div>
                                            <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="#"> الوزغ </a>
                                                <a class="dropdown-item" href="#"> عث الغبار </a>
                                                <a class="dropdown-item" href="#"> الفئران </a>
                                                <a class="dropdown-item" href="other_pest_bites.html"> انواع الدغات </a>
                                                <a class="dropdown-item" href="#"> افات اخرى </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-chevron-down"></i> {{ __('home.menu.otherServices') }}
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"> تنظيف فلل </a>
                                        <a class="dropdown-item" href="other_services.html"> تنظيف شقق </a>
                                        <a class="dropdown-item" href="#"> عزل حزنات المياه</a>
                                        <a class="dropdown-item" href="#"> صيانه خزانات </a>
                                        <a class="dropdown-item" href="404.html"> صفحة 404 </a>
                                        <a class="dropdown-item" href="sitemap.html"> خريطة الموقع </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link" href="blog.html">{{ __('home.menu.blog') }}</a>
                            </li>
                            <li>
                                <a class="nav-link" href="about.html">{{ __('home.menu.aboutUs') }}</a>
                            </li>
                            <div class="dropdown-divider mob mt-4"></div>
                            <li class="mob email">
                                <a href="contact.html" class="nav-link"> {{ __('home.menu.contactUs') }} </a>
                                <a href="#"><img src="assets/img/mob/noun_Mail_1571628.svg" alt=""></a>
                            </li>
                            <li class="mob call pb-4 mb-2">
                                <a href="tel:{{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}" class="nav-link"> {{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }} </a>
                                <a href="tel:{{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}"><img src="assets/img/mob/noun_call_2443019.svg" alt=""></a>
                            </li>
                            <div class="dropdown-divider mob mt-4"></div>
                            <li class="mob">
                                <a href="#" class="nav-link">{{ __('home.menu.changeLang') }}</a>
                            @if(app()->getLocale() == 'ar')
                            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img src="assets/img/Flag-EN.svg" alt=""></a>
                            @else
                            <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><img src="assets/img/Flag-AR.svg" alt="AR"></a>
                            @endif 
                            </li>
                        </ul>
                    </div>

                    <div class="extra-nav d-flex justify-content-around align-items-center" id="{{request()->is(app()->getLocale()) ? 'ExtraNav' : '' }}">
                        <a onclick="openNav()"><img src="assets/img/noun_Search_2680509.svg" alt=""></a>
                        <div class="btn-group">
                            <button type="button" class="nav-link btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href=""><img src="assets/img/noun_call_2443019.svg" alt=""></a>
                            </button>
                            <div class="dropdown-menu">
                            @foreach($sitePhones as $phone)
                                <a class="dropdown-item" href="tel:{{ $phone->phone }}">
                                    <i class="fa fa-phone"></i> {{ $phone->phone }}
                                </a>
                            @endforeach
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="contact.html">
                                    <i class="fa fa-envelope"></i> {{ __('home.menu.contactUs') }}
                                </a>
                            </div>
                        </div>
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img src="assets/img/Flag-EN.svg" alt=""></a>
                    @else
                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><img src="assets/img/Flag-AR.svg" alt="AR"></a>
                    @endif 
                    </div>
                </nav>
                @if(request()->is(app()->getLocale()))
                <!-- social media -->
                <div class="social-media d-flex flex-column align-items-center justify-content-between">
                    <a href=""><img src="assets/img/icon1.svg" alt=""></a>
                    <a href=""><img src="assets/img/icon2.svg" alt=""></a>
                    <a href=""><img src="assets/img/icon3.svg" alt=""></a>
                    <a href=""><img src="assets/img/icon4.svg" alt=""></a>
                </div>
                <a class="scroll" href="#main"><img src="assets/img/Scroll.svg" alt=""></a>
                <div class="carousel-item active">
                    <img src="assets/img/BG1@2x.png" alt="">
                    <div class="carousel-caption">
                        <button class="btn-main services_order">
                        {{ __('home.orderService.order') }}
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <h1>اوركيدا</h1>
                        <h3>لمكافحة الحشرات</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/BG1@2x.png" alt="">
                    <div class="carousel-caption">
                        <button class="btn-main services_order">
                            طلب خدمة
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <h1>اوركيدا</h1>
                        <h3>لمكافحة الحشرات</h3>
                    </div>
                </div>
            </div>
        </div>
                @endif
    </header>

    @yield('content')

    <!-- start footer -->
    <footer>
        <div class="d-flex justify-content-between ">
            <div class="data-footer ">
                <img src="{{ asset('/assets/img/logo2.png')}}" alt=" ">
                <p>{!! getLocalizableColumn($about->desc) !!}</p>
                <div class="social d-flex ">
                    <a href="{{ $settings->youtube_url }}"><img src="{{ asset('/assets/img/social/icon5.svg')}}" alt=" "></a>
                    <a href="{{ $settings->linkedin_url }}"><img src="{{ asset('/assets/img/social/icon4.svg')}}" alt=" "></a>
                    <a href="{{ $settings->instagram_url }}"><img src="{{ asset('/assets/img/social/icon3.svg')}}" alt=" "></a>
                    <a href="{{ $settings->twitter_url }}"><img src="{{ asset('/assets/img/social/icon2.svg')}}" alt=" "></a>
                    <a href="{{ $settings->facebook_url }}"><img src="{{ asset('/assets/img/social/icon1.svg')}}" alt=" "></a>
                </div>
            </div>
            <div class="twitter ">
                <div class="d-flex justify-content-between ">
                    <span>{{ __('home.footer.tweetsBy') }}</span>
                    <a href=" ">‎@OrkidaPest</a>
                    <a href=" ">{{ __('home.footer.seeOnTweeter') }}</a>
                </div>
                <article class="tw-example ">
                    <article>
                        <div class="d-flex ">
                            <img src="../assets/img/tw/Avatar.png " alt=" ">
                            <div>
                                <p class="m-0 ">
                                    اوركيدا لمكافحة الحشرات
                                    <span>@OrkidaPest</span>
                                </p>
                            </div>
                        </div>
                        <p class="mt-3">
                            لا يٌعد البق من الحشرات المعدية بالمعنى المفهوم, لكنه يعيش على البشر وينتقل مباشرة من شخص لآخر للحصول على الدم, ولذلك يبدو أن البق قد يكون معديًا لأنه يمكن أن يعيش في ملابس بعض الأفراد وأثاثهم, وهذه العناصر عند استخدامها أو نقلها أثناء السفر يكون البق
                            .
                        </p>
                        <div class="date ">
                            5:54 PM - Oct 10, 2018
                        </div>
                    </article>
            </div>
            <div class="last d-flex ">
                <div>
                    <p>{{ __('home.footer.siteCategories') }}</p>
                    <a href=" ">{{ __('home.menu.pestControl') }}</a>
                    <a href=" ">{{ __('home.menu.pestLibrary') }}</a>
                    <a href=" ">{{ __('home.menu.otherServices') }}</a>
                    <a href=" ">{{ __('home.menu.blog') }}</a>
                    <a href=" ">{{ __('home.footer.faqsCommon') }}</a>
                </div>
                <div>
                    <p>{{ __('home.footer.aboutOrkida') }}</p>
                    <a href=" ">{{ __('home.menu.aboutUs') }}</a>
                    <a href=" ">{{ __('home.menu.contactUs') }}</a>
                    <a href=" ">{{ __('home.footer.policy') }}</a>
                    <a href=" ">{{ __('home.footer.privacy') }}</a>
                </div>
            </div>
        </div>
        <div class="footer-alright ">
            <span>{{ __('home.footer.copyRight') }}</span>
        </div>
    </footer>
    <script src="{{ asset('/assets/js/jquery.js')}}"></script>
    <script src="{{ asset('/assets/js/popper.js')}}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('/assets/js/jquery.nice-select.min.js')}}"></script>
    @if(request()->is(app()->getLocale()))
        <script src="{{ asset('/assets/js/slick-carousel.js')}}"></script>
        @if(app()->getLocale() == 'ar')
            <script src="{{ asset('/assets/js/slick_ar.js')}}"></script>
        @else    
            <script src="{{ asset('/assets/js/slick_en.js')}}"></script>
        @endif    
    @endif
    <script src="{{ asset('/assets/js/main.js')}}"></script>
</body>

</html>