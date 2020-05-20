<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index,follow">
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/favicon.png')}}" />
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
    @yield('styles')
</head>

<body class="other_pages_body bg-gray">
    <!-- Back to top button -->
    <div id="buttonBackToTop">
        <img src="{{ asset('/assets/img/up.png')}}" alt="">
    </div>
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <p>{{ __('home.menu.searchTxt') }}</p>
            <form method="get" action="{{ url(app()->getLocale() .'/site-search') }}">
            <input type="text" name="txt" class="form-control" name="search" id="">
            <button type="submit" class="btn-main">{{ __('home.menu.searchBtn') }}</button>
            </form>
        </div>
    </div>
    <!-- start header -->
    <header class="{{request()->is(app()->getLocale()) ? 'homePage' : 'other_Pages' }}">
        <div id="openSearch" class="bg-info mt-4 mobile-search-web  mobile">
            <h6 class="title-wdight"> {{ __('home.menu.searchTxtMob') }} </h6>
            <form method="get" action="{{ url(app()->getLocale() .'/site-search') }}">
                <div class="form-group">
                    <input name="txt" type="text " class="form-control " id=" " placeholder=" ">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-main btn-bg-pink w-100">{{ __('home.menu.searchBtn') }}</button>
                </div>
            </form>
        </div>
        @if(request()->is(app()->getLocale()))
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                <li data-target="#demo" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach    
            </ul>
            <div class="carousel-inner">
        @endif        
                <!-- nav bar -->
                <nav class="navbar navbar-expand-md" id="{{request()->is(app()->getLocale()) ? 'NavBar' : '' }}">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ config("app.baseUrl").$settings->logo }}" alt="">
                    </a>

                    <div class="mob other">
                        <div class="d-flex">
                            <img class="img img_search" onclick="openNavSearch()" src="{{ asset('/assets/img/tw/noun_Search_2680509.svg')}}" alt="">
                            <div class="dropdown">
                                <button type="button" class="nav-link btn dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img_call" src="{{ asset('/assets/img/tw/call.svg')}}" alt="">  
                                </button>

                                <div class="dropdown-menu">
                                @foreach($sitePhones as $phone)
                                    <a class="dropdown-item" href="tel:{{ $phone->phone }}">
                                    {{ $phone->phone }}  <img class="other_call center" src="{{ asset('/assets/img/tw/call.svg')}}" alt=""> 
                                    </a>
                                @endforeach
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url(app()->getLocale() .'/contact-us') }}">
                                    {{ __('home.menu.contactUs') }} <img class="other_call" src="{{ asset('/assets/img/mob/noun_Mail_1571628.svg')}}" alt="">
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
                                    <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($pestControlObj, 'slug') )}}" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-chevron-down"></i> {{ __('home.menu.pestControl') }}
                                    </a>
                                    <div class="dropdown-menu midmenu">
                                        <div class="row">
                                            <div class="col-lg-4 col-6 border_left">
                                            <a class="dropdown-item" href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($pestControlObj, 'slug') )}}"> {{ getLocalizableColumn($pestControlObj, 'name') }} </a>
                                            @foreach($pestControls as $key => $pestControl)
                                            <!-- {{ $key++ }} -->
                                                <a class="dropdown-item" href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($pestControl, 'slug') )}}"> {{ getLocalizableColumn($pestControl, 'name') }}</a>
                                                @if(($key + 1) % 5 == 0)
                                                    </div>
                                                    @if($key != count($pestControls))
                                                        <div class="col-lg-4 col-6 border_left">
                                                    @endif        
                                                @endif
                                            @endforeach
                                            @if((count($pestControls) + 1) % 5 != 0) 
                                            <a class="dropdown-item" href="{{ url(app()->getLocale() .'/pest-libraries' ) }}"> {{ __('home.menu.otherPests') }} </a>
                                            <a class="dropdown-item" href="{{ url(app()->getLocale() .'/faqs' ) }}"> {{ __('home.footer.faqsCommon') }}</a>
                                            </div>
                                            @else 
                                            <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="{{ url(app()->getLocale() .'/pest-libraries' ) }}"> {{ __('home.menu.otherPests') }} </a>
                                                <a class="dropdown-item" href="{{ url(app()->getLocale() .'/faqs' ) }}"> {{ __('home.footer.faqsCommon') }}</a>
                                            </div>  
                                            @endif     
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group">
                                    <a href="{{ url(app()->getLocale() .'/pest-libraries' )}}" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-chevron-down"></i> {{ __('home.menu.pestLibrary') }}
                                    </a>
                                    <div class="dropdown-menu midmenu">
                                        <div class="row">
                                        <div class="col-lg-4 col-6 border_left">
                                        @foreach($pestLibrariesMenu as $key => $pestLibrary)
                                            <!-- {{ $key++ }} -->
                                                <a class="dropdown-item" href="{{ url(app()->getLocale() .'/pest-libraries/'.getLocalizableColumn($pestLibrary, 'slug') )}}"> {{ getLocalizableColumn($pestLibrary, 'name') }} </a>
                                                @if($key % 5 == 0)
                                                    </div>
                                                    @if($key != count($pestLibrariesMenu))
                                                        <div class="col-lg-4 col-6 border_left">
                                                    @endif        
                                                @endif
                                        @endforeach
                                        @if(count($pestLibrariesMenu) % 5 != 0) 
                                            <a class="dropdown-item" href="{{ url(app()->getLocale() .'/pest-bites' )}}"> {{ __('home.menu.pestBites') }} </a>
                                            <a class="dropdown-item" href="{{ url(app()->getLocale() .'/pest-libraries' )}}"> {{ __('home.menu.otherPests') }} </a>
                                            </div>
                                        @else 
                                        <div class="col-lg-4 col-6 border_left">
                                                <a class="dropdown-item" href="{{ url(app()->getLocale() .'/pest-bites' )}}"> {{ __('home.menu.pestBites') }} </a>
                                                <a class="dropdown-item" href="{{ url(app()->getLocale() .'/pest-libraries' )}}"> {{ __('home.menu.otherPests') }} </a>
                                        </div>   
                                        @endif    
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group">
                                    <a href="{{ url(app()->getLocale() .'/services' )}}" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-chevron-down"></i> {{ __('home.menu.otherServices') }}
                                    </a>
                                    <div class="dropdown-menu">
                                    @foreach($otherServices as $key => $otherService)
                                        <a class="dropdown-item" href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($otherService, 'slug') )}}"> {{ getLocalizableColumn($otherService, 'name') }} </a>
                                    @endforeach  
                                        <a class="dropdown-item" href="{{ url(app()->getLocale() .'/services') }}"> {{ __('home.menu.otherServices') }} </a>
                                    </div>
                                </div>
                            </li>
                            @if(app()->getLocale() == 'ar')
                            <li>
                                <a class="nav-link" href="{{ url(app()->getLocale() .'/blog') }}">{{ __('home.menu.blog') }}</a>
                            </li>
                            @endif
                            <li>
                                <a class="nav-link" href="{{ url(app()->getLocale() .'/about-us' )}}">{{ __('home.menu.aboutUs') }}</a>
                            </li>
                            <div class="dropdown-divider mob mt-4"></div>
                            <li class="mob email">
                                <a href="{{ url(app()->getLocale() .'/contact-us') }}" class="nav-link"> {{ __('home.menu.contactUs') }} </a>
                                <a href="#"><img src="{{ asset('/assets/img/mob/noun_Mail_1571628.svg')}}" alt=""></a>
                            </li>
                            <li class="mob call pb-4 mb-2">
                                <a href="tel:{{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}" class="nav-link"> {{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }} </a>
                                <a href="tel:{{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}"><img src="{{ asset('/assets/img/mob/noun_call_2443019.svg')}}" alt=""></a>
                            </li>
                            @if(!request()->is('ar/blog', 'ar/blog/*', 'categories/*'))
                            <div class="dropdown-divider mob mt-4"></div>
                            <li class="mob">
                                <a href="#" class="nav-link">{{ __('home.menu.changeLang') }}</a>
                            @if(app()->getLocale() == 'ar')
                            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img src="{{ asset('/assets/img/Flag-EN.svg')}}" alt="EN"></a>
                            @else
                            <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><img src="{{ asset('/assets/img/Flag-AR.svg')}}" alt="AR"></a>
                            @endif 
                            </li>
                            @endif
                        </ul>
                    </div>

                    <div class="extra-nav d-flex justify-content-around align-items-center" id="{{request()->is(app()->getLocale()) ? 'ExtraNav' : '' }}">
                        <a onclick="openNav()">
                        @if(request()->is(app()->getLocale()))
                        <img src="{{ asset('/assets/img/noun_Search_2680509.svg')}}" alt=""></a>
                        @else
                        <img src="{{ asset('/assets/img/tw/noun_Search_2680509.svg')}}" alt=""></a>
                        @endif
                        <div class="btn-group">
                            <button type="button" class="nav-link btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="">
                                @if(request()->is(app()->getLocale()))
                                    <img src="{{ asset('/assets/img/noun_call_2443019.svg')}}" alt=""></a>
                                @else
                                    <img src="{{ asset('/assets/img/tw/call.svg')}}" alt=""></a>
                                @endif
                                </button>
                            <div class="dropdown-menu">
                            @foreach($sitePhones as $phone)
                                <a class="dropdown-item" href="tel:{{ $phone->phone }}">
                                    <i class="fa fa-phone"></i> {{ $phone->phone }}
                                </a>
                            @endforeach
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url(app()->getLocale() .'/contact-us') }}">
                                    <i class="fa fa-envelope"></i> {{ __('home.menu.contactUs') }}
                                </a>
                            </div>
                        </div>
                        @if(!request()->is('ar/blog', 'ar/blog/*', 'ar/categories/*'))    
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img src="{{ asset('/assets/img/Flag-EN.svg')}}" alt="EN"></a>
                    @else
                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><img src="{{ asset('/assets/img/Flag-AR.svg')}}" alt="AR"></a>
                    @endif 
                    @endif
                    </div>
                </nav>
                @if(request()->is(app()->getLocale()))
                <!-- social media -->
                <div class="social-media d-flex flex-column align-items-center justify-content-between">
                    <a href="{{ $settings->facebook_url }}"><img src="{{ asset('/assets/img/icon1.svg')}}" alt=""></a>
                    <a href="{{ $settings->twitter_url }}"><img src="{{ asset('/assets/img/icon2.svg')}}" alt=""></a>
                    <a href="{{ $settings->linkedin_url }}"><img src="{{ asset('/assets/img/icon3.svg')}}" alt=""></a>
                    <a href="{{ $settings->youtube_url }}"><img src="{{ asset('/assets/img/icon4.svg')}}" alt=""></a>
                </div>
                <a class="scroll" href="#main"><img src="{{ asset('/assets/img/Scroll.svg')}}" alt=""></a>
                @foreach($sliders as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                    <img src="{{ config("app.baseUrl").$slider->image }}" alt=" {{ $slider->alt }}">
                    <div class="carousel-caption">
                        <!-- <a href="{{ url(app()->getLocale() .'/contact-us') }}"> -->
                        <button class="btn-main services_order">
                        {{ __('home.orderService.order') }}
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <!-- </a> -->
                        <h1>{{ __('home.menu.orkida') }}</h1>
                        <h3>{{ getLocalizableColumn($slider, 'title') }}</h3>
                    </div>
                </div>
                @endforeach
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
                <p>{{ charsLimit(getLocalizableColumn($about, 'desc'), 300) }}</p>
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
                    <a href="{{ url('/') }}">‎@OrkidaPest</a>
                    <a href="{{ $settings->twitter_url }}">{{ __('home.footer.seeOnTweeter') }}</a>
                </div>
                <article class="tw-example ">
                <a class="twitter-timeline" data-lang="ar" data-width="400"  data-height="250" href="https://twitter.com/OrkidaPest">Tweets by OrkidaPest</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </article>
            </div>
            <div class="last d-flex ">
                <div>
                    <p>{{ __('home.footer.siteCategories') }}</p>
                    <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($pestControlObj, 'slug') )}}">{{ __('home.menu.pestControl') }}</a>
                    <a href="{{ url(app()->getLocale() .'/pest-libraries') }}">{{ __('home.menu.pestLibrary') }}</a>
                    <!-- <a href="{{ url(app()->getLocale() .'/services') }}">{{ __('home.menu.otherServices') }}</a> -->
                    <a href="{{ url(app()->getLocale() .'/blog' ) }}">{{ __('home.menu.blog') }}</a>
                    <a href="{{ url(app()->getLocale() .'/faqs') }}">{{ __('home.footer.faqsCommon') }}</a>
                </div>
                <div>
                    <p>{{ __('home.footer.aboutOrkida') }}</p>
                    <a href="{{ url(app()->getLocale() .'/about-us') }}">{{ __('home.menu.aboutUs') }}</a>
                    <a href="{{ url(app()->getLocale() .'/contact-us') }}">{{ __('home.menu.contactUs') }}</a>
                    <a href="{{ url(app()->getLocale() .'/policy') }}">{{ __('home.footer.policy') }}</a>
                    <a href="{{ url(app()->getLocale() .'/privacy') }}">{{ __('home.footer.privacy') }}</a>
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
    @yield('scripts')
</body>

</html>