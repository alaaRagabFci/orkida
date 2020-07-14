@extends('Front.layouts')
@section('title', 'بحث')
@section('meta')
<meta name="keywords" content="شركة اوركيدا, شركة اوركيدا لمكافحة الحشرات,شركات مكافحة حشرات بجدة">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="شركة اوركيدا, شركة اوركيدا لمكافحة الحشرات,شركات مكافحة حشرات بجدة">
@endsection
@section('content')
<!-- start content of page -->
<div class="wrapper_content">
    <section class="beardcamp">
        <div class="beardcamp_img">
            <img src="{{ asset('/assets/img/pest-library/Bg.png')}}">
            <div class="beardcamp_info">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="right_text mobile-text">
                                <h3 class="mb-0"> نتائج البحث</h3>
                                <nav aria-label="breadcrumb no-bg">
                                    <ol class="breadcrumb no-bg p-0 mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 text-center">
                            <!-- <div class="center_text">
                                    <p> عن شركتنا </p>
                                    <h4> اوركيدا لمكافحة الحشرات </h4>
                                </div> -->
                        </div>
                        <div class="col-lg-4 col-md-4 text-left">
                            <!-- <div class="left_text">
                                    <a class="no-bg no-shadow web postion_top color-dark" href="#"> قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-info blogs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bg-info mt-4 pest-library mobile search-blog">
                        <h6 class="title-wdight"> البحث في المدونة </h6>
                        <form action="{{ url(app()->getLocale() .'/blog') }}" method="get">
                            <!-- @csrf -->
                            <div class="form-group mb-0 ">
                                <div class="input-group-prepend ">
                                    <div class="input-group-text ">
                                        <button class="no-bg no-border" type="submit"><img src="{{ asset('/assets/img/blog/noun_Search_2680509.svg')}} "></button>
                                    </div>
                                </div>
                                <input type="text " required name="searchText" class="form-control " id=" " placeholder=" ">
                            </div>
                        </form>
                    </div>

                    <div class="search-title">
                        <h3> {{ __('home.search.serviceSearchText') }} </h3>
                    </div>
                    <div class="bg-info mt-4 no-shadow border p-0">
                        <div class="row">
                            @forelse($servicesResult as $service)
                            <div class="col-lg-5 col-md-6 pr-0">
                                <div class="image-area">
                                    <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($service, 'slug') )}}">
                                        <img class="card-img-top" src="{{ config("app.baseUrl").$service->image }}" alt=" {{ $service->image }}">
                                        <div class="card-img-overlay">
                                            <p class="card-title-overlay">
                                                <img src="{{ asset('/assets/img/pest-library/noun_Cockroach_323508.svg')}}"> {{ getLocalizableColumn($service->getCategory, 'name') }}
                                            </p>
                                        </div>
                                    </a>
                                    <div class="overlay"></div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <h3 class="card-body">
                                    <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($service, 'slug') )}}">
                                        <h3 class="card-title">
                                            {{ getLocalizableColumn($service, 'name') }}
                                        </h3>
                                    </a>
                                    <p class="card-text">
                                        {!! charsLimit(strip_tags(getLocalizableColumn($service, 'description')), 240) !!} </p>
                                    <span class="date"> {{ date('d-m-Y', strtotime($service->created_at)) }} </span>
                                    <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($service, 'slug') )}}" class="read-more"> {{ __('home.menu.readMore') }} <i class="fa fa-angle-left"></i></a>
                            </div>
                            @empty
                            <span>{{ __('home.service.noServicesFoundSearch') }}</span>
                            @endforelse
                        </div>
                    </div>

                    <div class="search-title">
                        <h3> {{ __('home.search.librarySearchText') }} </h3>
                    </div>
                    <div class="bg-info mt-4 no-shadow border p-0">
                        <div class="row">
                            @forelse($pestLibrariesResult as $pestLibrary)
                            <div class="col-lg-5 col-md-6 pr-0">
                                <div class="image-area">
                                    <a href="blog_details.html">
                                        <img class="card-img-top" src="{{ config("app.baseUrl").$pestLibrary->image }}" alt=" {{ $pestLibrary->image_alt }}">
                                        <div class="card-img-overlay">
                                            <p class="card-title-overlay">
                                                <img src="{{ asset('/assets/img/pest-library/noun_Cockroach_323508.svg')}}"> {{ __('home.menu.pestLibrary') }}
                                            </p>
                                        </div>
                                    </a>
                                    <div class="overlay"></div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <h3 class="card-body">
                                    <a href="blog_details.html">
                                        <h3 class="card-title">
                                        {{ getLocalizableColumn($pestLibrary, 'name') }}
                                        </h3>
                                    </a>
                                    <p class="card-text">
                                    {!! charsLimit(strip_tags(getLocalizableColumn($pestLibrary, 'description')), 240) !!}
                                    </p>
                                    <span class="date"> {{ date('d-m-Y', strtotime($pestLibrary->created_at)) }} </span>
                                    <a href="{{ url(app()->getLocale() .'/pest-libraries/'.getLocalizableColumn($pestLibrary, 'slug') ) }}" class="read-more"> {{ __('home.seeAll.moreDetails') }} <i class="fa fa-angle-left"></i></a>
                            </div>
                            @empty
                            <span>{{ __('home.service.noLibraryFoundSearch') }}</span>
                            @endforelse
                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="bg-info mt-4 pest-library web">
                        <h6 class="title-wdight"> البحث في المدونة </h6>
                        <form action="{{ url(app()->getLocale() .'/blog') }}" method="get">
                            <!-- @csrf -->
                            <div class="form-group mb-0 ">
                                <div class="input-group-prepend ">
                                    <div class="input-group-text ">
                                        <button class="no-bg no-border" type="submit"> <img src="{{ asset('/assets/img/blog/noun_Search_2680509.svg')}} "></button>
                                    </div>
                                </div>
                                <input type="text " required name="searchText" class="form-control " id=" " placeholder=" ">
                            </div>
                        </form>
                    </div>
                    <div class="bg-info mt-4 pest-library ">
                        <h6 class="title-wdight"> الاقسام </h6>
                        <ul class="list ">
                            @foreach($articleTypes as $articleType)
                            <li>
                                <a href="{{ url(app()->getLocale() .'/categories/'.$articleType->slug) }}">
                                    <img src="{{ asset('/assets/img/blog/noun_Cockroach_323508.svg')}} "> {{ $articleType->category }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-info mt-4 pest-library ">
                        <div class="social-meida ">
                            <h6> تواصل معنا </h6>
                            <ul>
                                <li class="facebook">
                                    <a href="{{ $settings->facebook_url }}" title="facebook"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li class="twitter">
                                    <a href="{{ $settings->twitter_url }}" title="twitter"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="instagram">
                                    <a href="{{ $settings->instagram_url }}" title="instagram"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li class="youtube">
                                    <a href="{{ $settings->youtube_url }}" title="youtube"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-divider "></div>
                        <div class="newsPapper ">
                            @if (\Session::has('msg'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('msg') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <form class="mt-4 " action="{{ url(app()->getLocale() .'/contact') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="label-name "> {{ __('home.contactUsSection.contactForm.name') }} </label>
                                    <input type="text " required name="fname" class="form-control " placeholder=" ">
                                </div>
                                <div class="form-group">
                                    <label class="label-name"> {{ __('home.contactUsSection.contactForm.mobile') }} </label>
                                    <input type="text " required name="phone" class="form-control" placeholder=" ">
                                </div>
                                <div class="form-group">
                                    <label class="label-name"> {{ __('home.contactUsSection.contactForm.email') }} </label>
                                    <input type="text" required name="email" class="form-control" placeholder=" ">
                                </div>
                                <div class="form-group">
                                    <label class="label-name"> {{ __('home.orderService.selectService') }} </label>
                                    <select name="topic" required class="form-control nice-select">
                                        @foreach($pestControls as $pestControl)
                                        <option value="{{ getLocalizableColumn($pestControl, 'slug') }}">{{ getLocalizableColumn($pestControl, 'name') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ml-auto mr-auto mt-5 text-center">
                                    <button type="submit" class="btn btn-form-contact mt-4 w-100">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ads">
                        <img src="{{ asset('/assets/img/pest-library/img@2x.png')}}">
                        <div class="ads-info text-center">
                            <h1> {{ __('home.service.discount') }} </h1>
                            <h2> {{ __('home.service.discountValue') }} </h2>
                            <p> {{ __('home.service.onAllServices') }} </p>
                            <p> {{ __('home.service.monthEnd') }} </p>
                            <div class="text-center order">
                                <a href="{{ url(app()->getLocale() .'/contact-us') }}"> {{ __('home.orderService.order') }} <i class="fa fa-shopping-cart mr-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="ads-newPapper">
                        <div class="title-news text-center">
                            <h1> {{ __('home.subscriptions.subscribeContact') }} </h1>
                            <div class="image">
                                <img class="mb-5" src="{{ asset('/assets/img/contact-us/icons/art.png')}}">
                            </div>
                            <form class="mt-5">
                                <div class="form-group">
                                    <label class="label-name color-dark"> {{ __('home.subscriptions.emailPlaceHolder') }} </label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group m-auto text-center">
                                    <button type="submit" class="btn btn-form-contact mt-3 w-100">{{ __('home.subscriptions.subscribeBtn') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<!-- end content of page -->
@endSection