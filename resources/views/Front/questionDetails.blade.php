@extends('Front.layouts')
@section('title',__('home.meta.faqs.title'))
@section('meta')
<meta name="keywords" content="{{ getLocalizableColumn($question, 'slug') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.faqQuestion.description') }}">
@endsection
@section('content')
    <!-- start content of page -->
    <div class="wrapper_content">
        <div class="beardcamp_info_other">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-4">
                        <nav aria-label="breadcrumb no-bg">
                            <ol class="breadcrumb no-bg p-0 mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">{{ __('home.menu.index') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> {{ __('home.footer.faqsCommon') }} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <section class="faq">
                    <div class="row">
                        <div class="col-lg-9 col-md-6">
                            <div class="bg-white Questions">
                                <div class="row">
                                    <div class="col-md-6 text-center d-block">
                                        <img src="{{ asset('/assets/img/faq/Elements.svg')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="big-text">
                                            <h1> {{ __('home.faqs.most') }} </h1>
                                        </div>
                                        <div class="mid-text">
                                            <h2> {{ __('home.faqs.CommonQuestionBelong') }} </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="Answer">
                                    <div class="Ask d-flex">
                                        <h1> {{ __('home.faqs.q') }} <span class="colemn">:</span> </h1>
                                        <h6> {{ getLocalizableColumn($question, 'question') }} </h6>
                                    </div>
                                    <div class="Ans d-flex">
                                        <h1> {{ __('home.faqs.a') }} </h1>
                                        <p>{{ getLocalizableColumn($question, 'description') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="category-list">
                            <div class="title-list">
                                    <h1> {{ __('home.faqs.categories') }} </h1>
                                    <ul class="">
                                        <li>
                                            @foreach($categories as $category)
                                            <a href="{{ url(app()->getLocale().'/faqs?category='.getLocalizableColumn($category, 'category')) }}"> {{ getLocalizableColumn($category, 'category') }} </a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- end content of page -->
@endSection