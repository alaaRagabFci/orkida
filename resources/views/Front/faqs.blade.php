@extends('Front.layouts')
@section('title',__('home.meta.faqs.title'))
@section('meta')
<meta name="keywords" content="{{ __('home.meta.faqs.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.faqs.description') }}">
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
                                        @if(count($query) > 0)
                                        <h2> {{ __('home.faqs.CommonQuestionBelong') . $query['category']}} </h2>
                                        @else
                                        <h2> {{ __('home.faqs.CommonQuestions') }} </h2>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <ul class="faq-list mt-5">
                                @forelse($commonQuestions as $commonQuestion)
                                <li>
                                    <img src="{{ asset('/assets/img/faq/Polygon1.svg')}}">
                                    <a href="{{ url(app()->getLocale().'/faqs/'.getLocalizableColumn($commonQuestion, 'slug')) }}">{{ getLocalizableColumn($commonQuestion, 'question') }}</a>
                                </li>
                                @empty
                                <li>
                                    <img src="{{ asset('/assets/img/faq/Polygon1.svg')}}">
                                    <a href="#">{{ __('home.faqs.noQuestionFound') }}</a>
                                </li>
                                @endforelse
                            </ul>
                            <div class="dropdown-divider"></div>
                            <div class="row">
                                <div class="contact-about-body pb-0 mb-0 no-bg pt-2">
                                    <div class="title mb-4">
                                        <h1> {{ __('home.faqs.askQuestion') }} </h1>
                                        <p>{{ __('home.faqs.fillFormMsg') }}</p>
                                    </div>
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
                                                <label class="label-name"> {{ __('home.contactUsSection.contactForm.question') }} </label>
                                                <textarea type="text" required name="topic" rows="5" class="form-control" placeholder=""></textarea>
                                            </div>
                                            <div class="form-group m-auto text-center">
                                                <button data-toggle="modal" data-target="#openModel" type="submit" class="btn btn-form-contact mt-4">{{ __('home.contactUsSection.contactForm.sendBtn') }}</button>
                                            </div>
                                        </form>

                                    </div>
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
                                        @if(count($query) > 0)
                                        <a class="{{ $query['category'] == getLocalizableColumn($category, 'category') ? 'categorySelected' : ''  }}" href="{{ url(app()->getLocale().'/faqs?category='.getLocalizableColumn($category, 'category')) }}"> {{ getLocalizableColumn($category, 'category') }} </a>
                                        @else
                                        <a href="{{ url(app()->getLocale().'/faqs?category='.getLocalizableColumn($category, 'category')) }}"> {{ getLocalizableColumn($category, 'category') }} </a>
                                        @endif
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