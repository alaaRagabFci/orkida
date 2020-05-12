@extends('Front.layouts')
@section('title',__('home.footer.privacy'))
@section('meta')
<meta name="keywords" content="{{ __('home.meta.about.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.about.description') }}">
@endsection
@section('content')
    <!-- start content of page -->
    <div class="wrapper_content">
        <section class="beardcamp">
            <div class="beardcamp_img">
                <img src="{{ asset('/assets/img/Bg.png')}}">
                <div class="beardcamp_info">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 web">
                                <div class="right_text">
                                    <h3 class="mb-0"> {{ __('home.footer.privacy') }} </h3>
                                    <div class="web">
                                        <nav aria-label="breadcrumb no-bg">
                                            <ol class="breadcrumb no-bg p-0 mb-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                                </li>
                                                <li class="breadcrumb-item active" aria-current="page">{{ __('home.footer.privacy') }}</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 text-center">
                                <div class="center_text">
                                    <p> {{ __('home.privacy.privacyInstructure') }} </p>
                                    <h4> {{ __('home.about.aboutCompanyTitle') }} </h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="left_text">
                                    <a href="{{ url(app()->getLocale() .'/contact-us') }}"> {{ __('home.orderService.order') }}  <i class="fa fa-shopping-cart mr-2"></i></a>
                                </div>
                            </div>
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
                                    <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> {{ __('home.footer.policy') }} </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bg-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="title_dots"> {{ __('home.footer.privacy') }} <img class="dots w-100" src="{{ asset('/assets/img/Dots.svg')}}" alt="">
                                    </h3>
                                    <p>{{ getLocalizableColumn($about, 'privacy') }}</p>
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