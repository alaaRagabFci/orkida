@extends('Front.layouts')
@section('title', $tag)
@section('meta')
<meta name="keywords" content="شركة اوركيدا, شركة اوركيدا لمكافحة الحشرات,شركات مكافحة حشرات بجدة ">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="شركة اوركيدا, شركة اوركيدا لمكافحة الحشرات,شركات مكافحة حشرات بجدة ">
@endsection
@section('content')
<div class="wrapper_content">
    <section class="beardcamp">
        <div class="beardcamp_img">
            <img src="{{ asset('/assets/img/new/Bg.png')}}">
            <img class="Shield" src="{{ asset('/assets/img/new/Shield.svg')}}">
            <div class="beardcamp_info">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="right_text">
                                <h3 class="mb-0"> {{ __('home.menu.blog') }} </h3>
                                <nav aria-label="breadcrumb no-bg">
                                    <ol class="breadcrumb no-bg p-0 mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{ __('home.menu.blog') }} </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 text-center">
                            <div class="center_text">
                                <!-- <p> عن شركتنا </p>
                                    <h4> اوركيدا لمكافحة الحشرات </h4> -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 text-left">
                            <div class="left_text">
                                <a href="{{ url(app()->getLocale() .'/contact-us') }}"> {{ __('home.orderService.order') }} <i class="fa fa-shopping-cart mr-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-info">
        <div class="container-fluid">
            <div class="bg-info bg-info-without-margin p-0 no-bg no-shadow">
                <!-- services -->
                <section id="services">
                    <div class="container-fluid p-0">
                        <div class="row services">
                            @foreach($relatedArticles as $relatedArticle)
                            <div class="col-lg-4">
                                <section class="backdrop ">
                                    <div class="overlay_filter "></div>
                                    <a href="{{ url(app()->getLocale() .'/blog/'.$relatedArticle->blog->slug )}}">
                                        <img src="{{ config("app.baseUrl").$relatedArticle->blog->image }}" alt=" {{ $relatedArticle->blog->image_alt }}">
                                        <h3 class="mb-0 w-100">{{ $relatedArticle->blog->name }}</h3>
                                    </a>
                                    <div class="info_text ">
                                        <h6 class="text-center "> {{ $relatedArticle->blog->name }} </h6>
                                        <small class="text-center "> {!! charsLimit(strip_tags($relatedArticle->blog->description_ar), 240) !!} 
                                        </small>
                                    </div>
                                    <div class="more ">
                                        <a href="{{ url(app()->getLocale() .'/blog/'.$relatedArticle->blog->slug )}}"> {{ __('home.menu.readMore') }} </a>
                                    </div>
                                </section>
                            </div>
                            @endforeach
                        </div>
                        <div class="main-pagination d-flex justify-content-center">
                            <nav>
                            {{ $relatedArticles->links() }}
                            </nav>
                        </div>
                    </div>
                </section>
            </div>
    </section>
    <section class="contact-about ">
        <img class="shield-img " src="{{ asset('/assets/img/new/noun_Phone_2717579.svg')}} " alt=" ">
        <div class="container-fluid ">
            <div class="row ">
                <div class="contact-about-body ">
                    <div class="title ">
                        <h1> {{ __('home.about.contactWithUs') }} </h1>
                        <p class="text">{{ __('home.about.earliestTime') }}</p>
                    </div>
                    <div class="col-lg-6 offset-3 ">
                        @if (\Session::has('msg'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('msg') !!}</li>
                            </ul>
                        </div>
                        @endif
                        <form class="mt-5" action="{{ url(app()->getLocale() .'/contact') }}" method="post">
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
            </div>
        </div>
    </section>
</div>
@endSection