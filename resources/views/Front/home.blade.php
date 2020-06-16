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
        {{-- <form> --}}
            <div class="first d-flex justify-content-center align-items-center">
                <p class="mb-0">{{ __('home.orderService.wantService') }}</p>
                <div class="select">
                    <select onchange="getServiceLink(this);" name="searchService" class="custom-select" id="inputGroupSelect01">
                        <option selected> {{ __('home.orderService.selectService') }}</option>
                        @foreach($pestControls as $pestControl)
                        <option value="{{ getLocalizableColumn($pestControl, 'slug') }}">{{ getLocalizableColumn($pestControl, 'name') }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-chevron-left"></i>
                </div>
                <a href="#" id="serviceLink"><button type="button" class="btn-main"> {{ __('home.menu.searchBtn') }} </button></a>
            </div>
            <div class="second d-flex justify-content-center align-items-center">
                <p>{{ __('home.menu.contactUs') }}</p>
                <section class="d-flex">
                    <!-- <img src="assets/img/noun_Phone_2717579.svg" alt=""> -->
                    <i class="fa fa-phone"></i>
                    <div>
                        <span>{{ __('home.orderService.usePhone') }}</span>
                        <p>{{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}</p>
                    </div>
                </section>
                <section class="d-flex">
                    <!-- <img src="assets/img/noun_Mail_2698285.svg" alt=""> -->
                    <i class="fa fa-envelope"></i>
                    <div>
                        <span>{{ __('home.orderService.useMessage') }}</span>
                        <p onclick="scrollContactUs()">{{ __('home.orderService.sendMessage') }}</p>
                    </div>
                </section>
            </div>
        {{-- </form> --}}
    </section>
    <!-- services -->
    <section id="services">
        <h3 class="title_1">{{ __('home.services') }}<img class="dots w-100" src="{{ asset('/assets/img/Dots.svg')}}" alt="">
        </h3>
        <div class="container-fluid">
            <div class="row services">
                @foreach($homeServices as $service)
                <div class="col-lg-4">
                    <section class="backdrop">
                        <div class="overlay_filter"></div>
                        <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($service, 'slug') )}}">
                            <img src="{{ config("app.baseUrl").$service->image }}" alt=" {{ $service->image }}">
                            <h3 class="mb-0 w-100">{{ getLocalizableColumn($service, 'name') }}</h3>
                        </a>
                        <div class="info_text">
                            <h6 class="text-center"> {{ getLocalizableColumn($service, 'name') }} </h6>
                            <small class="text-center">{!! charsLimit(strip_tags(getLocalizableColumn($service, 'description')), 240) !!} </small>
                        </div>
                        <div class="more">
                            <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($service, 'slug') )}}"> {{ __('home.menu.readMore') }} </a>
                        </div>
                    </section>
                </div>
                @endforeach
                @if(count($homeServices) > 0)
                <div class="w-100">
                    <a href="{{ url(app()->getLocale() .'/services' )}}" class="mr-auto btn-border d-block">
                    {{ __('home.seeAll.seeAllServices') }}
                        <i class="fa fa-chevron-left "></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>

    <section id="video">
        <img class="shield-img" src="{{ asset('/assets/img/Shield (1).svg')}}" alt=" ">
        <div class="d-flex align-items-center ">
            <div>
                <h3>{{ getLocalizableColumn($about, 'home_title') }}</h3>
                <p>{{ charsLimit(getLocalizableColumn($about, 'home_description'), 300) }}</p>
                <a href="{{ url(app()->getLocale().'/about-us') }}"><button class="btn-main">{{ __('home.menu.aboutUs') }}</button></a>
            </div>
            <div class="video-wrapper">
                <iframe width="628" height="330" src="{{ $about->video }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <!-- start slider here -->

    <section class="slider" id="slider">
        <h3 class="title_1">{{ __('home.menu.pestLibrary') }} <img class="dots w-100" src="{{ asset('/assets/img/Dots.svg')}}" alt=" "></h3>

        <div class="outer">
            <div id="big" class="owl-carousel owl-theme">
            @foreach($pestLibraries as $pestLibrary)
                <div class="item ">
                    <img src="{{ config("app.baseUrl").$pestLibrary->image }}" alt=" {{ $pestLibrary->image_alt }}">
                    <div class="overlay "></div>
                    <div class="info ">
                        <h1> {{ getLocalizableColumn($pestLibrary, 'name') }} </h1>
                        <p>{!! charsLimit(strip_tags(getLocalizableColumn($pestLibrary, 'description')), 240) !!}</p>
                        <a href="{{ url(app()->getLocale() .'/pest-libraries/'.getLocalizableColumn($pestLibrary, 'slug') ) }}" class="raedMore ">{{ __('home.seeAll.moreDetails') }} <i class="fa fa-chevron-left "></i></a>
                    </div>
                </div>
            @endforeach    
            </div>
            <div id="thumbs" class="owl-carousel owl-theme">
            @foreach($pestLibraries as $pestLibrary)
                <div class="item">
                    <img src="{{ config("app.baseUrl").$pestLibrary->image }}" alt=" {{ $pestLibrary->image_alt }}">
                    <div class="overlay "></div>
                    <div class="info_thumbs ">
                        <h6> {{ getLocalizableColumn($pestLibrary, 'name') }} </h6>
                    </div>
                </div>
            @endforeach    
            </div>
        </div>
        <div class="padding-80 mt-4">
            <a href="{{ url(app()->getLocale() .'/pest-libraries' ) }}" class="mr-auto btn-border d-block">
            {{ __('home.seeAll.seeAllPestLibraries') }}
                    <i class="fa fa-chevron-left "></i>
                </a>
        </div>
    </section>

    <!-- <section class="library "></section> -->
    @if(app()->getLocale() == 'ar')
    <section id="articles" class="article">
        <h3 class="title_1">{{ __('home.latestArticles') }}<img class="dots w-100 " src="{{ asset('/assets/img/Dots.svg')}}" alt=" ">
        </h3>
        <div class="container-fluid">
            <div class="row services">
                <div class="col-lg-7 col-md-12">
                    <div class="gallery-slider-for">
                        <div class="slider-item">
                            <div class="item">
                                <div class="article-img">
                                    <img src="{{ config("app.baseUrl").$latestBlog->image }}" alt=" {{ $latestBlog->image_alt }}">
                                    <article>
                                        <a href="{{ url(app()->getLocale() .'/blog/'.$latestBlog->slug) }}"><h4>{{ $latestBlog->name }}</h4></a>
                                        <p>{{ date('d-m-Y', strtotime($latestBlog->created_at)) }}</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="gallery-slider-nav">
                    @foreach($blogs as $blog)
                        <div class="slider-item d-flex">
                            <div class="item_thumb">
                                <a href="{{ url(app()->getLocale() .'/blog/'.$blog->slug) }}">
                                    <img src="{{ config("app.baseUrl").$blog->image }}" alt=" {{ $blog->image_alt }}">
                                </a>
                            </div>
                            <div class="article_info">
                                <a href="{{ url(app()->getLocale() .'/blog/'.$blog->slug) }}"><h4>{{ $blog->name }}</h4></a>
                                <p class="mb-3 ">{!! charsLimit(strip_tags($blog->description_ar), 200) !!}</p>
                                <p class="m-0">
                                {{ date('d-m-Y', strtotime($blog->created_at)) }}
                                </p>
                            </div>
                        </div>
                    @endforeach    
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
                    <a href="{{ url(app()->getLocale().'/blog') }}" class="mr-auto btn-border d-block">
                    {{ __('home.seeAll.seeAllArticles') }}
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @else
    <br><br>
    @endif
    <section id="contact">
        <div class="right-section ">
            <h3 class="web ">{{ __('home.contactUsSection.happyContact') }}</h3>
            <h3 class="mob text-center">{{ __('home.contactUsSection.saveServiceForYouMob') }}</h3>
            <div class="all-items">
                <div class="item d-flex">
                    <img src="{{ asset('/assets/img/contact/icon1.svg')}}" alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.safe_active') }}</h4>
                        <p>{{ __('home.contactUsSection.safe_active_desc') }}</p>
                    </div>
                </div>
                <div class="item d-flex ">
                    <img src="{{ asset('/assets/img/contact/icon2.svg')}} " alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.guarantee') }}</h4>
                        <p>{{ __('home.contactUsSection.guarantee_desc') }}</p>
                    </div>
                </div>
                <div class="item d-flex ">
                    <img src="{{ asset('/assets/img/contact/icon3.svg')}} " alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.suitableService') }}</h4>
                        <p>{{ __('home.contactUsSection.suitableService_desc') }}</p>
                    </div>
                </div>
                <div class="item d-flex ">
                    <img src="{{ asset('/assets/img/contact/icon4.svg')}} " alt=" ">
                    <div>
                        <h4>{{ __('home.contactUsSection.professionalService') }}</h4>
                        <p>{{ __('home.contactUsSection.professionalService_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="d-flex call-loction ">
                <div>
                    <h4><img src="{{ asset('/assets/img/noun_call.svg')}} " alt=" "> {{ __('home.orderService.usePhone') }}</h4>
                    <p>{{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}</p>
                </div>
                <div>
                    <h4><img src="{{ asset('/assets/img/noun_place_1989108.svg')}} " alt=" "> {{ __('home.contactUsSection.address') }} </h4>
                    <p>{{ getLocalizableColumn($settings, 'location') }}</p>
                </div>
            </div>
        </div>
        <h3 class="mob ">{{ __('home.contactUsSection.happyContact') }}</h3>
        <div class="form">
        @if (\Session::has('msg'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('msg') !!}</li>
                </ul>
            </div>
        @endif
            <form action="{{ url(app()->getLocale() .'/contact') }}" method="post">
                @csrf
                <label for="fname">{{ __('home.contactUsSection.contactForm.name') }}</label>
                <input required type="text" name="fname" id="fname" class="form-control">
                <label for="phone ">{{ __('home.contactUsSection.contactForm.mobile') }}</label>
                <input required type="phone"  name="phone" id="phone" class="form-control">
                <label for="email ">{{ __('home.contactUsSection.contactForm.email') }}</label>
                <input required type="email" name="email" id="email" class="form-control">
                <label for="msg">{{ __('home.contactUsSection.contactForm.topic') }}</label>
                <textarea required id="msg"  name="topic" class="form-control" rows="4" cols="50"></textarea>
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
@section('scripts')
<script>
    function scrollContactUs(){
        $('html,body').animate({
        scrollTop: $("#contact").offset().top},
        '2000');
    }

  function getServiceLink(selected){
      var option = document.getElementById('serviceLink');
      option.href = "{{ url(app()->getLocale() .'/services')}}" + "/" + selected.value;
  }  
</script>
@endsection