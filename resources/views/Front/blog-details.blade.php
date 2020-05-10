@extends('Front.layouts')
@section('title', $blog->name)
@section('meta')
<meta name="keywords" content="{{ $blog->keywords }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ $blog->meta_description }}">
<meta property="og:url" content="http://orkidapest.com/" />
<meta property="og:title" content="$blog->meta_title" />
<meta property="og:image" content="{{ config("app.baseUrl").$blog->image }}" />
<meta property="og:site_name" content="Orkida pest" />
<meta property="og:description" content="{{ $blog->meta_description }}" />
@endsection
@section('styles')
<link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/jssocials.css')}}" />
<link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/jssocialsflat.css')}}" />
@endsection
@section('content')

<!-- start content of page -->
<div class="wrapper_content">
    <section class="section-info beardcamp_info_other">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-4">
                    <nav aria-label="breadcrumb no-bg">
                        <ol class="breadcrumb no-bg p-0 mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url(app()->getLocale() .'/blog' ) }}">{{ __('home.menu.blog') }}</a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page"> {{ $blog->name }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="bg-info mt-4 no-padding-with-col">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hero">
                                    <img class="w-100" src="{{ config("app.baseUrl").$blog->image }}" alt=" {{ $blog->image_alt }}">
                                    <div class="card-img-overlay">
                                        <p class="card-title-overlay">
                                            <img src="{{ asset('/assets/img/blog/Cleaning-light.svg')}}"> {{ $blog->getArticleType->category }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pr-0">
                                        <div class="with-Border">
                                            <h1 class="title-pest-details mb-sm-0"> {{ $blog->name }} </h1>
                                            <div class="more-links web">
                                                <ul>
                                                    <li>
                                                        <img src="{{ asset('/assets/img/blog/noun_Pencil_2159875.svg')}}">
                                                        <span class="title"> بواسطة : <span class="subtitle"> HESHAM </span> </span>
                                                    </li>
                                                    <li>
                                                        <img src="{{ asset('/assets/img/blog/noun_Calendar_2750395.svg')}}">
                                                        <span class="title"> بتاريخ : <span class="subtitle"> {{ date('d-m-Y', strtotime($blog->created_at)) }} </span> </span>
                                                    </li>
                                                    <li>
                                                        <img src="{{ asset('/assets/img/blog/noun_View_1255401.svg')}}">
                                                        <span class="title"> المشاهدات : <span class="subtitle"> {{ $blog->viewers }} </span> </span>
                                                    </li>
                                                    <li>
                                                        <img src="{{ asset('/assets/img/blog/noun_update_699650.svg')}}">
                                                        <span class="title"> أخر تحديث : <span class="subtitle"> {{ date('d-m-Y', strtotime($blog->updated_at)) }} </span> </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="more-links mobile">
                                                <ul class="row">
                                                    <li class="col-6 p-0">
                                                        <img src="{{ asset('/assets/img/blog/noun_Pencil_2159875.svg')}}">
                                                        <span class="title"> بواسطة : <span class="subtitle"> HESHAM MAHMOUD </span> </span>
                                                    </li>
                                                    <li class="col-6 p-0">
                                                        <img src="{{ asset('/assets/img/blog/noun_Calendar_2750395.svg')}}">
                                                        <span class="title"> بتاريخ : <span class="subtitle"> {{ date('d-m-Y', strtotime($blog->created_at)) }} </span> </span>
                                                    </li>
                                                    <li class="col-6 p-0">
                                                        <img src="{{ asset('/assets/img/blog/noun_View_1255401.svg')}}">
                                                        <span class="title"> المشاهدات : <span class="subtitle"> {{ $blog->viewers }} </span> </span>
                                                    </li>
                                                    <li class="col-6 p-0">
                                                        <img src="{{ asset('/assets/img/blog/noun_update_699650.svg')}}">
                                                        <span class="title"> أخر تحديث : <span class="subtitle"> {{ date('d-m-Y', strtotime($blog->updated_at)) }} </span> </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="share-links web justify-content-start">
                                            <img src="{{ asset('/assets/img/pest-library/noun_Share_1571617.svg')}}">
                                            <span> مشاركة المحتوي : </span>
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

                                <div class="row ">
                                    <div class="col-12 p-0">
                                        {!! $blog->description_ar !!}
                                        @if (\Session::has('msg'))
                                        <div class="alert alert-success">
                                            <ul>
                                                <li>{!! \Session::get('msg') !!}</li>
                                            </ul>
                                        </div>
                                        @endif
                                        @if (!\Session::has('msg'))
                                        <div class="text-center rate">
                                            <h6 class="font-weight-bold"> هل كان الموضع مفيد؟ </h6>
                                            <a href="#" data-toggle="modal" data-target="#openModelYes">
                                                <img src="{{ asset('/assets/img/blog/Like.svg')}}"> نعم
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#openModelNo">
                                                <img src="{{ asset('/assets/img/blog/dislike.svg')}}"> لا
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @if(count($tags) > 0)
                    <div class="row ">
                        <div class="col-md-12 ">
                            <div class="tagsBlock">
                                <h3> علامات </h3>
                                <ul>
                                    @foreach($tags as $tag)
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('/assets/img/blog/Cleaning.svg')}}"> {{ $tag->tag }}
                                        </a>

                                    </li>
                                    @endforeach
                                </ul> 
                            </div> 
                        </div> 
                    </div> 
                    @endif
                    @if(count($relatedArticles) > 0)
                    <div class="articels-box">
                        <h3 class="mb-4 "> مقالات ذات صلة </h3>
                        <div class="row ">
                        @foreach($relatedArticles as $relatedArticle)
                            <div class="col-lg-4 col-md-6 ">
                                <div class="card ">
                                    <div class="image-area ">
                                        <img class="card-img-top " src="{{ config("app.baseUrl").$relatedArticle->blog->image }}" alt=" {{ $relatedArticle->blog->image_alt }}">
                                        <div class="card-img-overlay ">
                                            <p class="card-title-overlay ">
                                                <img src="{{ asset('/assets/img/pest-library/noun_Cockroach_323508.svg')}} "> {{ $relatedArticle->blog->getArticleType->category }}
                                            </p>
                                        </div>
                                        <h3 class="card-title ">
                                        {{ $relatedArticle->blog->name }}
                                        </h3>
                                    </div>
                                    <div class="card-body ">
                                        <p class="card-text ">
                                        {!! charsLimit(strip_tags($relatedArticle->blog->description_ar), 70) !!}
                                        </p>
                                        <span class="date "> {{ date('d-m-Y', strtotime($relatedArticle->blog->updated_at)) }} </span>
                                        <a href="{{ url(app()->getLocale() .'/blog/'.$relatedArticle->blog->slug) }}" class="read-more "> قراءة المزيد <i class="fa fa-angle-left "></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach    
                            <div class="w-100 ">
                                <a href="{{ url(app()->getLocale() .'/blog' )}}">
                                <button class="mr-auto ml-3 btn-border d-block ">
                                    مشاهدة جميع المقالات
                                    <i class="fa fa-chevron-left "></i>
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <h3>{{ __('home.service.noArticlesFound') }}</h3>
                    @endif
                        </div>
                        <div class="col-lg-3 ">
                            <div class="bg-info no-bg no-shadow mt-0 pr-0 pl-0 pest-library mobile">
                                <h6 class="title-wdight"> احدث المقالأت </h6>
                                <div class="articels-box wdight">
                                    @foreach($latestArticles as $latestArticle)
                                    <div class="media">
                                        <div class="article-img">
                                            <a href="{{ url(app()->getLocale() .'/blog/'.$latestArticle->slug) }}">
                                                <img src="{{ config("app.baseUrl").$latestArticle->image }}"></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="blog.html">
                                                <h1>{{ $latestArticle->name }}</h1>
                                            </a>
                                            <p class="m-0 w-100">
                                                <span> {{ date('d-m-Y', strtotime($latestArticle->updated_at)) }} </span>
                                                <a href="{{ url(app()->getLocale() .'/blog/'.$latestArticle->slug) }}"> قراءة المزيد <i class="fa fa-angle-left"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <div class="bg-info no-bg no-shadow mt-0 pr-0 pl-0 pest-library mobile">
                                <h6 class="title-wdight"> الأكثر قراءة </h6>
                                <div class="articels-box wdight">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="image-area">
                                                    <a href="#"><img class="card-img-top" src="assets/img/services/Img4.png"></a>
                                                </div>
                                                <div class="card-body p-0">
                                                    <a href="#">
                                                        <div class="card-title ">
                                                            النمل الأبيض و طرق التخلص منه
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="image-area">
                                                    <a href="#"><img class="card-img-top" src="assets/img/services/Img1.png"></a>
                                                </div>
                                                <div class="card-body p-0">
                                                    <a href="#">
                                                        <div class="card-title ">
                                                            النمل الأبيض و طرق التخلص منه
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="image-area">
                                                    <a href="#"><img class="card-img-top" src="assets/img/services/Img2.png"></a>
                                                </div>
                                                <div class="card-body p-0">
                                                    <a href="#">
                                                        <div class="card-title ">
                                                            النمل الأبيض و طرق التخلص منه
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="image-area">
                                                    <a href="#"><img class="card-img-top" src="assets/img/services/Img3.png"></a>
                                                </div>
                                                <div class="card-body p-0">
                                                    <a href="#">
                                                        <div class="card-title">
                                                            النمل الأبيض و طرق التخلص منه
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="bg-info mt-4 pest-library web sidebar">
                                <h6 class="title-wdight"> احدث المقالأت </h6>
                                <div class="articels-box wdight">
                                @foreach($latestArticles as $latestArticle)
                                    <div class="card no-bg no-shadow">
                                        <div class="image-area">
                                            <img class="card-img-top" src="{{ config("app.baseUrl").$latestArticle->image }}">
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="card-title ">
                                            {{ $latestArticle->name }}
                                            </div>
                                            <p class="card-text ">
                                            {!! charsLimit(strip_tags($blog->description_ar), 70) !!}
                                            </p>
                                            <span class="date "> {{ date('d-m-Y', strtotime($latestArticle->updated_at)) }} </span>
                                            <a href="{{ url(app()->getLocale() .'/blog/'.$latestArticle->slug) }}" class="read-more "> قراءة المزيد <i class="fa fa-angle-left "></i></a>
                                        </div>
                                    </div>
                                @endforeach    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
<!-- end content of page -->


<!-- Start Model  -->
<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="openModelYes" tabindex="-1" role="dialog" aria-labelledby="openModelYesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mb-3">
                <form class="evaluation" method="post" action="{{ url(app()->getLocale().'/user-opinion') }}">
                    @csrf
                    <input type="hidden" value="1" name="is_benefit">
                    <div class="form-group">
                        <label class="label-name color-dark"> هل لديك مقترحات لتحسين تجربتك أكثر ؟ </label>
                        <textarea required name="content" type="text" rows="5" class="form-control" placeholder="أبدا الكتابه هنا ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label-name color-dark"> البريد الأليكتروني <span class="text-danger">*</span> </label>
                        <input type="text" required name="email" class="form-control" placeholder="أبدا الكتابه هنا ...">
                    </div>
                    <div class="form-group">
                        <label class="label-name color-dark"> الأسم <span class="text-danger">*</span></label>
                        <input type="text " required name="name" class="form-control " placeholder="أبدا الكتابه هنا ...">
                    </div>
                    <!-- <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                الإشتراك بقائمة بريد موضوع
                            </label>
                        </div>
                    </div> -->
                    <div class="form-group m-auto text-center ">
                        <button type="submit" class="btn btn-form-contact mt-4 ">أرسال</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Start Model  -->
<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="openModelNo" tabindex="-1" role="dialog" aria-labelledby="openModelNoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mb-3">
                <div class="title" id="modal-body-title">
                    <h3> نأسف لذلك ! </h3>
                    <p> لماذا كان المقال غير مفيد؟ </p>
                </div>
                <form class="evaluation" method="post" action="{{ url(app()->getLocale().'/user-opinion') }}">
                    @csrf
                    <div id="first_form">
                        <input type="hidden" value="0" name="is_benefit">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="content" id="exampleRadios1" value="المقال لا يحتوي على المعلومات التي أبحث عنها.">
                                <label class="form-check-label" for="exampleRadios1">
                                    المقال لا يحتوي على المعلومات التي أبحث عنها.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="content" id="exampleRadios2" value="المقال يحتوي على معلومات خاطئة.">
                                <label class="form-check-label" for="exampleRadios2">
                                    المقال يحتوي على معلومات خاطئة.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check" id="click-check">
                                <input class="form-check-input" type="radio" name="content" id="exampleRadios3" value="سبب آخر.">
                                <label class="form-check-label" for="exampleRadios3">
                                    سبب آخر.
                                </label>
                            </div>
                        </div>
                        <div class="form-group show-textarea hide">
                            <textarea name="topic" type="text" rows="5" class="form-control" placeholder="أبدا الكتابه هنا ..."></textarea>
                        </div>
                        <div class="form-group m-auto text-center ">
                            <button type="button" id="continue" class="btn btn-form-contact mt-4 ">متابعة</button>
                        </div>
                    </div>

                    <div class="evaluation hide" id="secand_form">
                        <div class="form-group">
                            <label class="label-name color-dark"> البريد الأليكتروني <span class="text-danger">*</span> </label>
                            <input type="text" required name="email" class="form-control" placeholder="أبدا الكتابه هنا ...">
                        </div>
                        <div class="form-group">
                            <label class="label-name color-dark"> الأسم <span class="text-danger">*</span></label>
                            <input type="text " required name="name" class="form-control " placeholder="أبدا الكتابه هنا ...">
                        </div>
                        <!-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    الإشتراك بقائمة بريد موضوع
                                </label>
                            </div>
                        </div> -->
                        <div class="form-group m-auto text-center ">
                            <button type="submit" id="send" class="btn btn-form-contact mt-4 ">أرسال</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


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