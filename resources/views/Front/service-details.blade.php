@extends('Front.layouts')
@section('title', getLocalizableColumn($serviceDetails, 'name'))
@section('meta')
<meta name="keywords" content="{{ getLocalizableColumn($serviceDetails, 'keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ getLocalizableColumn($serviceDetails, 'meta_description') }}">
<meta property="og:url" content="http://orkidapest.com/"/>
<meta property="og:title" content="{{ getLocalizableColumn($serviceDetails, 'meta_title') }}"/>
<meta property="og:image" content="{{ config("app.baseUrl").$serviceDetails->image }}"/>
<meta property="og:site_name" content="Orkida pest"/>
<meta property="og:description" content="{{ getLocalizableColumn($serviceDetails, 'meta_description') }}"/>
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
                <img src="{{ asset('/assets/img/pest-control/Bg.png')}}">
                <div class="beardcamp_info">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="right_text">
                                    <h3 class="mb-0"> {{ getLocalizableColumn($serviceDetails, 'name') }} </h3>
                                    <div class="web">
                                        <nav aria-label="breadcrumb no-bg">
                                            <ol class="breadcrumb no-bg p-0 mb-0">
                                                <li class="breadcrumb-item">
                                                <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                <a href="{{ url(app()->getLocale() .'/services/')}}">{{ __('home.services') }}</a>
                                                </li>
                                                <!-- @if($serviceDetails->id != 19)
                                                <li class="breadcrumb-item">
                                                    {{ getLocalizableColumn($serviceDetails->getCategory, 'name') }}
                                                </li>
                                                @endif -->
                                                <li class="breadcrumb-item active" aria-current="page"> {{ getLocalizableColumn($serviceDetails, 'name') }} </li>
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
                                    <li class="breadcrumb-item">
                                    <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($pestControlObj, 'slug') )}}">{{ __('home.services') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                    <a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($pestControlObj, 'slug') )}}"> {{ getLocalizableColumn($serviceDetails->getCategory, 'name') }} </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> {{ getLocalizableColumn($serviceDetails, 'name') }} </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        @if($serviceDetails->id == 19)
                        <div class="bg-info no-padding-with-col">
                        @if(count($subServices) > 0)
                            <h2 class="title-pest-details"> {{ __('home.service.types') }} {{ getLocalizableColumn($serviceDetails, 'name') }} {{ __('home.service.other') }} </h2>
                            <div class="row">
                            @foreach($subServices as $subService)
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="blocks">
                                        <img src="{{ config("app.baseUrl").$subService->image }}" alt=" {{ $subService->image }}">
                                        <h3><a href="{{ url(app()->getLocale() .'/services/'.getLocalizableColumn($subService, 'slug') )}}"> {{ getLocalizableColumn($subService, 'name') }} </a></h3>
                                    </div>
                                </div>
                            @endforeach  
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="blocks-border">
                                        <img src="{{ asset('/assets/img/pest-library/noun_Bug_1675490.png')}}">
                                        <h3><a href="{{ url(app()->getLocale() .'/pest-libraries') }}">{{ __('home.menu.otherPests') }} </a></h3>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                {!! getLocalizableColumn($serviceDetails, 'description') !!}
                            </div>
                        </div>
                        @else
                        <div class="bg-info no-padding-with-col">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        @if(count($subServices) > 0)
                                        <div class="col-lg-6 pr-0">
                                            <h2 class="title-pest-details"> {{ __('home.service.types') }} {{ getLocalizableColumn($serviceDetails, 'name') }} {{ __('home.service.other') }} </h2>
                                        </div>
                                        @endif
                                        <div class="col-md-6 align-center">
                                            <div class="share-links">
                                                <img src="{{ asset('/assets/img/pest-library/noun_Share_1571617.svg')}}">
                                                <span> {{ __('home.service.shareContent') }}  : </span>
                                                <div id="share" class="mr-3">
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
                                        @foreach($subServices as $subService)
                                        <div class="col-lg-3 col-6">
                                            <div class="block-img">
                                                <img class="img" src="{{ config("app.baseUrl").$subService->image }}" alt=" {{ $subService->image }}">
                                                <h3 class="blockImg-title"> {{ getLocalizableColumn($subService, 'name') }} </h3>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            {!! getLocalizableColumn($serviceDetails, 'description') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- @if(count($tags) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tagsBlock">
                                    <h3> {{ __('home.service.tags') }} </h3>
                                    <ul>
                                        @foreach($tags as $tag)
                                        <li>
                                            <a href="javascript:;">
                                                <img src="{{ asset('/assets/img/pest-library/noun_Cockroach_3235082.svg')}}"> {{ $tag->tag }}
                                            </a>

                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif -->
                        @if(app()->getLocale() == 'ar' && count($relatedArticles) > 0)
                        <div class="articels-box">
                            <h3 class="mb-4"> {{ __('home.service.relatedArticles') }} </h3>
                            <div class="row">
                                @forelse($relatedArticles as $relatedArticle)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="image-area">
                                            <img class="card-img-top" src="{{ config("app.baseUrl").$relatedArticle->blog->image }}" alt=" {{ $relatedArticle->blog->image_alt }}">
                                            <div class="card-img-overlay">
                                                <p class="card-title-overlay">
                                                    <img src="{{ asset('/assets/img/pest-library/noun_Cockroach_323508.svg')}}"> {{ $relatedArticle->blog->getArticleType->category }}
                                                </p>
                                            </div>
                                            <h3 class="card-title">
                                            {{ $relatedArticle->blog->name }}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                            {!! strip_tags(charsLimit($relatedArticle->blog->description_ar, 150)) !!}
                                            </p>
                                            <span class="date"> {{ date('d-m-Y', strtotime($relatedArticle->blog->created_at)) }} </span>
                                            <a href="{{ url(app()->getLocale() .'/blog/'.$relatedArticle->blog->slug)}}" class="read-more">  {{ __('home.menu.readMore') }} <i class="fa fa-angle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h3>{{ __('home.service.noArticlesFound') }}</h3>
                                @endforelse
                                @if(count($relatedArticles) > 0)
                                <div class="w-100">
                                <a href="{{ url(app()->getLocale().'/blog') }}" class="ml-3 mr-auto btn-border d-block">
                                    {{ __('home.seeAll.seeAllArticles') }}
                                        <i class="fa fa-chevron-left "></i>
                                </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @else
                        <h3>{{ __('home.service.noArticlesFound') }}</h3>
                        @endif
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
                                        <input type="text" name="fname" required class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-name"> {{ __('home.contactUsSection.contactForm.mobile') }} </label>
                                        <input type="text" name="phone" required class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-name"> {{ __('home.contactUsSection.contactForm.email') }} </label>
                                        <input type="text" name="email" required class="form-control" placeholder="">
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
                                        <button type="submit" class="btn btn-form-contact mt-4 w-100">{{ __('home.contactUsSection.contactForm.sendBtn') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ads">
                            <img src="{{ asset('/assets/img/pest-library/img@2x.png')}}">
                            <div class="ads-info text-center">
                                <h1> {{ __('home.service.discount') }}  </h1>
                                <h2> {{ __('home.service.discountValue') }}  </h2>
                                <p> {{ __('home.service.onAllServices') }}  </p>
                                <p> {{ __('home.service.monthEnd') }}  </p>
                                <div class="text-center order">
                                <a href="{{ url(app()->getLocale() .'/contact-us') }}"> {{ __('home.orderService.order') }}  <i class="fa fa-shopping-cart mr-2"></i></a>
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
@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.2.1/jssocials.min.js"></script>
<script>
            $("#share").jsSocials({
                showLabel: false,
                showCount: false,
                shareIn: "popup",
                shares: ["twitter","linkedin", "pinterest", "facebook"]
            });
</script>
@endsection