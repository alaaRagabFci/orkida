@extends('Front.layouts')
@section('title',__('home.meta.pestLibraries.title'))
@section('meta')
<meta name="keywords" content="{{ __('home.meta.pestLibraries.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.pestLibraries.description') }}">
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
                            <div class="right_text">
                                <h3 class="mb-0"> {{ __('home.menu.pestLibrary') }} </h3>
                                <nav aria-label="breadcrumb no-bg">
                                    <ol class="breadcrumb no-bg p-0 mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('home.menu.pestLibrary') }}</li>
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
                                    <a href="#"> طلب الخدمة  <i class="fa fa-shopping-cart mr-2"></i></a>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bg-info no-padding-with-col">
                        <div class="row">
                            @foreach($pestLibraries as $pestLibrary)
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="blocks">
                                    <img src="{{ config("app.baseUrl").$pestLibrary->image }}" alt=" {{ $pestLibrary->image_alt }}">
                                    <h3><a class="name-link" href="{{ url(app()->getLocale() .'/pest-libraries/'.getLocalizableColumn($pestLibrary, 'slug') ) }}"> {{ getLocalizableColumn($pestLibrary, 'name') }} </a></h3>
                                </div>
                            </div>
                            @endforeach
                            @if(count($page) == 0)
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="blocks-border">
                                    <a href="{{ url(app()->getLocale() .'/pest-libraries?page=2')}}">
                                        <img src="{{ asset('/assets/img/pest-library/noun_Bug_1675490.png')}}">
                                        <h3><a href="{{ url(app()->getLocale() .'/pest-libraries?page=2')}}">{{ __('home.menu.otherPests') }}</a></h3>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-0 m-0">
                            <div class="newsPapper-bg mt-0 mb-4">
                                <div class="row">
                                    <div class="col-lg-5 align-center">
                                        <div class="newsPapper">
                                            <div class="title-news">
                                                <h1> {{ __('home.subscriptions.subscribeContact') }} </h1>
                                                <form>
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
                                    <div class="col-lg-7">
                                        <div class="image pest-library">
                                            <img class="w-none" src="{{ asset('/assets/img/contact-us/icons/art.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-info pest-library">
                        <div class="social-meida">
                            <h6> {{ __('home.menu.contactUs') }} </h6>
                            <ul>
                                <li class="facebook">
                                    <a href="{{ $settings->facebook_url }}" title="facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="twitter">
                                    <a href="{{ $settings->twitter_url }}" title="twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="instagram">
                                    <a href="{{ $settings->instagram_url }}" title="instagram"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="youtube">
                                    <a href="{{ $settings->youtube_url }}" title="youtube"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="newsPapper">
                            @if (\Session::has('msg'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('msg') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <form class="mt-4" action="{{ url(app()->getLocale() .'/contact') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="label-name"> {{ __('home.contactUsSection.contactForm.name') }} </label>
                                    <input type="text" required name="fname" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="label-name"> {{ __('home.contactUsSection.contactForm.mobile') }} </label>
                                    <input type="text" required name="phone" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="label-name"> {{ __('home.contactUsSection.contactForm.email') }} </label>
                                    <input type="text" required name="email" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="label-name"> اختار نوع الخدمة </label>
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
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end content of page -->
@endSection