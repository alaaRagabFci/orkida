@extends('Front.layouts')
@section('title', getLocalizableColumn($pestLibrary, 'name'))
@section('meta')
<meta name="keywords" content="{{ getLocalizableColumn($pestLibrary, 'keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ getLocalizableColumn($pestLibrary, 'meta_description') }}">
<meta property="og:url" content="http://orkidapest.com/" />
<meta property="og:title" content="{{ getLocalizableColumn($pestLibrary, 'meta_title') }}" />
<meta property="og:image" content="{{ config("app.baseUrl").$pestLibrary->image }}" />
<meta property="og:site_name" content="Orkida pest" />
<meta property="og:description" content="{{ getLocalizableColumn($pestLibrary, 'meta_description') }}" />
@endsection
@section('styles')
<link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/jssocials.css')}}" />
<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/jssocialsflat.css')}}" />
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
                                <h3 class="mb-0"> {{ getLocalizableColumn($pestLibrary, 'name') }} </h3>
                                <div class="web">
                                    <nav aria-label="breadcrumb no-bg">
                                        <ol class="breadcrumb no-bg p-0 mb-0">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ url(app()->getLocale() .'/pest-libraries')}}">{{ __('home.menu.pestLibrary') }}</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page"> {{ getLocalizableColumn($pestLibrary, 'name') }} </li>
                                        </ol>
                                    </nav>
                                </div>
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
            <div class="row mobile">
                <div class="col-lg-12 col-md-4">
                    <div class="beardcamp_info_other pb-0">
                        <nav aria-label="breadcrumb no-bg">
                            <ol class="breadcrumb no-bg p-0 mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url(app()->getLocale() .'/pest-libraries')}}">{{ __('home.menu.pestLibrary') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> {{ getLocalizableColumn($pestLibrary, 'name') }} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <!-- <div class="bg-info no-padding-with-col">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    @foreach($subPestLibraries as $subPestLibrary)
                                    <div class="col-lg-3 col-6">
                                        <div class="block-img">
                                            <img class="img" src="{{ config("app.baseUrl").$subPestLibrary->image }}" alt=" {{ $subPestLibrary->image_alt }}">
                                            <h3 class="blockImg-title"> {{ getLocalizableColumn($subPestLibrary, 'name') }} </h3>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="bg-info no-padding-with-col">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hero>">
                                    <img class="w-100" src="{{ config("app.baseUrl").$pestLibrary->image }}" alt=" {{ $pestLibrary->image_alt }}">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 pr-0">
                                        <h1 class="title-pest-details"> {{ getLocalizableColumn($pestLibrary, 'name') }} </h1>
                                    </div>
                                    <div class="col-lg-6 align-center">
                                        <div class="share-links">
                                            <img src="{{ asset('/assets/img/pest-library/noun_Share_1571617.svg')}}">
                                            <span> {{ __('home.share') }} : </span>
                                            <div id="share" class="social-meida mr-3">
                                                <!-- <ul>
                                                        <li>
                                                            <a href="#" title="facebook"><i class="fas fa-envelope"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="pinterest"><i class="fab fa-pinterest-p"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="facebook"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
                                                        </li>
                                                    </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    @foreach($subPestLibraries as $subPestLibrary)
                                    <div class="col-lg-3 col-md-6 col-6">
                                    <div class="blocks">
                                        <img src="{{ config("app.baseUrl").$subPestLibrary->image }}" alt=" {{ $subPestLibrary->image_alt }}">
                                        <h3><a href="{{ url(app()->getLocale() .'/pest-libraries/'.getLocalizableColumn($subPestLibrary, 'slug') )}}"> {{ getLocalizableColumn($subPestLibrary, 'name') }} </a></h3>
                                    </div>
                                </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                                <div class="row">
                                    <div class="col-12 p-0">
                                        {!! getLocalizableColumn($pestLibrary, 'description') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="tagsBlock">
                                    <h3> علامات </h3>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="assets/img/pest-library/noun_Cockroach_3235082.svg"> النمل الابيض
                                            </a>

                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="assets/img/pest-library/noun_Cockroach_3235082.svg"> مكافحة البعوض
                                            </a>

                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="assets/img/pest-library/noun_Cockroach_3235082.svg"> التخلص من الفئران
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="articels-box">
                            <h3 class="mb-4"> مقالات ذات صلة </h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="image-area">
                                            <img class="card-img-top" src="assets/img/services/Img2.png" alt="Card image cap">
                                            <div class="card-img-overlay">
                                                <p class="card-title-overlay">
                                                    <img src="assets/img/pest-library/noun_Cockroach_323508.svg"> مكافحة الحشرات
                                                </p>
                                            </div>
                                            <h3 class="card-title">
                                                النمل الأبيض و طرق التخلص منه
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                النمل الأبيض من أكثر خطورة وتزيد خطورته عن الحشرات والقوارض الأخرى،
                                            </p>
                                            <span class="date"> الثلاثاء 22 / 6 / 2019 </span>
                                            <a href="#!" class="read-more">  قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="image-area">
                                            <img class="card-img-top" src="assets/img/services/Img2.png" alt="Card image cap">
                                            <div class="card-img-overlay">
                                                <p class="card-title-overlay">
                                                    <img src="assets/img/pest-library/noun_Cockroach_323508.svg"> مكافحة الحشرات
                                                </p>
                                            </div>
                                            <h3 class="card-title">
                                                النمل الأبيض و طرق التخلص منه
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                النمل الأبيض من أكثر خطورة وتزيد خطورته عن الحشرات والقوارض الأخرى،
                                            </p>
                                            <span class="date"> الثلاثاء 22 / 6 / 2019 </span>
                                            <a href="#!" class="read-more">  قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="image-area">
                                            <img class="card-img-top" src="assets/img/services/Img2.png" alt="Card image cap">
                                            <div class="card-img-overlay">
                                                <p class="card-title-overlay">
                                                    <img src="assets/img/pest-library/noun_Cockroach_323508.svg"> مكافحة الحشرات
                                                </p>
                                            </div>
                                            <h3 class="card-title">
                                                النمل الأبيض و طرق التخلص منه
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                النمل الأبيض من أكثر خطورة وتزيد خطورته عن الحشرات والقوارض الأخرى،
                                            </p>
                                            <span class="date"> الثلاثاء 22 / 6 / 2019 </span>
                                            <a href="#!" class="read-more">  قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="image-area">
                                            <img class="card-img-top" src="assets/img/services/Img2.png" alt="Card image cap">
                                            <div class="card-img-overlay">
                                                <p class="card-title-overlay">
                                                    <img src="assets/img/pest-library/noun_Cockroach_323508.svg"> مكافحة الحشرات
                                                </p>
                                            </div>
                                            <h3 class="card-title">
                                                النمل الأبيض و طرق التخلص منه
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                النمل الأبيض من أكثر خطورة وتزيد خطورته عن الحشرات والقوارض الأخرى،
                                            </p>
                                            <span class="date"> الثلاثاء 22 / 6 / 2019 </span>
                                            <a href="#!" class="read-more">  قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="image-area">
                                            <img class="card-img-top" src="assets/img/services/Img2.png" alt="Card image cap">
                                            <div class="card-img-overlay">
                                                <p class="card-title-overlay">
                                                    <img src="assets/img/pest-library/noun_Cockroach_323508.svg"> مكافحة الحشرات
                                                </p>
                                            </div>
                                            <h3 class="card-title">
                                                النمل الأبيض و طرق التخلص منه
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                النمل الأبيض من أكثر خطورة وتزيد خطورته عن الحشرات والقوارض الأخرى،
                                            </p>
                                            <span class="date"> الثلاثاء 22 / 6 / 2019 </span>
                                            <a href="#!" class="read-more">  قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="image-area">
                                            <img class="card-img-top" src="assets/img/services/Img2.png" alt="Card image cap">
                                            <div class="card-img-overlay">
                                                <p class="card-title-overlay">
                                                    <img src="assets/img/pest-library/noun_Cockroach_323508.svg"> مكافحة الحشرات
                                                </p>
                                            </div>
                                            <h3 class="card-title">
                                                النمل الأبيض و طرق التخلص منه
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                النمل الأبيض من أكثر خطورة وتزيد خطورته عن الحشرات والقوارض الأخرى،
                                            </p>
                                            <span class="date"> الثلاثاء 22 / 6 / 2019 </span>
                                            <a href="#!" class="read-more">  قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <button class="mr-auto ml-3 btn-border d-block">
                                        مشاهدة جميع المقالات
                                        <i class="fa fa-chevron-left "></i>
                                    </button>
                                </div>
                            </div>
                        </div> -->
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
                    <div class="ads-newPapper">
                        <div class="title-news text-center">
                            <h1> {{ __('home.subscriptions.subscribeContact') }} </h1>
                            <div class="image">
                                <img class="mb-5" src="{{ asset('/assets/img/contact-us/icons/art.png')}}">
                            </div>
                            <form class="mt-5">
                                <div class="form-group">
                                    <label class="label-name"> {{ __('home.subscriptions.emailPlaceHolder') }} </label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group m-auto text-center">
                                    <button type="submit" class="btn btn-form-contact mt-3 w-100">اشترك</button>
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
@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.2.1/jssocials.min.js"></script>
<script>
    $("#share").jsSocials({
        showLabel: false,
        showCount: false,
        shareIn: "popup",
        shares: ["twitter", "linkedin", "pinterest", "facebook"]
    });
</script>
@endsection