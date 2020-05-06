@extends('Front.layouts')
@section('title',__('home.meta.contact.title'))
@section('meta')
<meta name="keywords" content="{{ __('home.meta.contact.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.contact.description') }}">
@endsection
@section('content')
    <!-- start content of page -->
    <div class="wrapper_content">
        <section class="beardcamp">
            <div class="beardcamp_img">
                <img src="{{ asset('/assets/img/contact-us/Bg.png')}}">
                <div class="beardcamp_info">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 web">
                                <div class="right_text">
                                    <h3 class="mb-0"> {{ __('home.meta.contact.title') }} </h3>
                                    <nav aria-label="breadcrumb no-bg">
                                        <ol class="breadcrumb no-bg p-0 mb-0">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page"> {{ __('home.meta.contact.title') }} </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-6 text-center">
                                <div class="center_text postion-25">
                                    <h4> {{ __('home.about.contactWithUs') }} </h4>
                                    <p class="small-text"> {{ __('home.about.earliestTime') }} </p>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4 col-md-4 text-left">
                                <div class="left_text">
                                    <i href="#"> طلب الخدمة  <i class="fa fa-shopping-cart mr-2"></i></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-info">
            <div class="container-fluid">
                <div class="row mobile">
                    <div class="col-lg-12 col-md-4">
                        <div class="beardcamp_info_other pb-0">
                            <nav aria-label="breadcrumb no-bg">
                                <ol class="breadcrumb no-bg p-0 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">{{ __('home.menu.index') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> {{ __('home.meta.contact.title') }} </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="bg-info bg-info-without-margin no-bg no-shadow p-0">
                    <!-- contact -->
                    <section class="contact-about">
                        <img class="shield-img" src="{{ asset('/assets/img/new/noun_Phone_2717579.svg')}} " alt=" ">
                        <div class="container-fluid m-0 p-0">
                            <div class="row">
                                <div class="contact-about-body m-0">
                                    <!-- <div class="title ">
                                        <h1> تواصل معنا لطلب الخدمة </h1>
                                        <p>ارسل لنا رسالة و سوف نقوم بالاتصال بك في اقرب وقت ممكن</p>
                                    </div> -->
                                    <div class="col-lg-6 offset-3">
                                    @if (\Session::has('msg'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('msg') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                    <form class="" action="{{ url(app()->getLocale() .'/contact') }}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="label-name"> {{ __('home.contactUsSection.contactForm.name') }} </label>
                                                <input type="text" required name="fname" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="label-name"> {{ __('home.contactUsSection.contactForm.mobile') }} </label>
                                                <input type="text" required name="phone" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="label-name"> {{ __('home.contactUsSection.contactForm.email') }} </label>
                                                <input type="text" required name="email" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="label-name"> {{ __('home.orderService.selectService') }} </label>
                                                <select name="topic" required class="form-control nice-select">
                                                @foreach($pestControls as $pestControl)
                                                    <option value="{{ getLocalizableColumn($pestControl, 'slug') }}">{{ getLocalizableColumn($pestControl, 'name') }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group m-auto">
                                                <button type="submit" class="btn btn-form-contact mt-4">{{ __('home.contactUsSection.contactForm.sendBtn') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="other-contact mt-5 ">
                                        <p> {{ __('home.orderService.usePhone') }} </p>
                                        <a href="tel:{{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}" class="phone"> <i class="fa fa-phone"></i> {{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }} </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 m-0 p-0">
                                    <div class="maps">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d950645.7063804097!2d38.650631850006825!3d21.45046841509912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2sJeddah%20Saudi%20Arabia!5e0!3m2!1sen!2seg!4v1585557532995!5m2!1sen!2seg"
                                            width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="maps-info-bg">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="logo-contact d-flex justify-content-center">
                                                    <img src="{{ asset('/assets/img/logo2.png')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="maps-info-list">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{ asset('/assets/img/contact-us/icons/outline-phone-24px.svg')}}"> {{ count($sitePhones) > 0 ? $sitePhones[0]->phone : '01000000000' }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{ asset('/assets/img/contact-us/icons/email-ico.svg')}}"> {{ $settings->site_email }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{ asset('/assets/img/contact-us/icons/outline-place-24px.svg')}}"> {{ getLocalizableColumn($settings, 'location') }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 p-0 m-0">
                                    <div class="newsPapper-bg">
                                        <div class="row">
                                            <div class="col-lg-4 align-center">
                                                <div class="newsPapper">
                                                    <div class="title-news">
                                                        <h1> {{ __('home.subscriptions.subscribeContact') }} </h1>
                                                        <form>
                                                            <div class="form-group">
                                                                <label class="label-name"> {{ __('home.subscriptions.emailPlaceHolder') }} </label>
                                                                <input type="text" class="form-control" placeholder="">
                                                            </div>
                                                            <div class="form-group m-auto text-center">
                                                                <button type="submit" class="btn btn-form-contact mt-4 w-100">{{ __('home.subscriptions.subscribeBtn') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="image">
                                                    <img src="{{ asset('/assets/img/contact-us/icons/art.png')}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 align-center">
                                                <div class="social-meida">
                                                    <p> {{ __('home.footer.followUs') }} </p>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <!-- end content of page -->
@endSection