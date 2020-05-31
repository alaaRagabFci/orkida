@extends('Front.layouts')
@section('title',__('home.meta.pestBites.title'))
@section('meta')
<meta name="keywords" content="{{ __('home.meta.pestBites.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.pestBites.description') }}">
@endsection
@section('content')
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
                            <li class="breadcrumb-item active" aria-current="page"> {{ __('home.menu.pestBites') }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg-info mt-4 no-padding-with-col other-pest-bites">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 pr-0">
                                        <!-- <a href="pest_control_details.html"> -->
                                            <h1 class="title-pest-details"> {{ __('home.menu.pestBites') }} </h1>
                                        <!-- </a> -->
                                    </div>
                                    <!-- <div class="col-lg-6 align-end">
                                        <div class="share-links web">
                                            <img src="assets/img/pest-library/noun_Share_1571617.svg">
                                            <span> مشاركة المحتوي : </span>
                                            <div class="social-meida mr-3">
                                                <ul>
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
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        @foreach($pestBites as $pestBite)
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="bg-pink">{{ getLocalizableColumn($pestBite, 'pest_type') }}</th>
                                                    <th scope="col">{{ __('home.pestBites.sting_appearance') }}</th>
                                                    <th scope="col">{{ __('home.pestBites.insect_bites') }}</th>
                                                    <th scope="col">{{ __('home.pestBites.notes') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data-column="{{ getLocalizableColumn($pestBite, 'pest_type') }}" class="fisrt-td" scope="row">
                                                        <img class="w-100" src="{{ config("app.baseUrl").$pestBite->image }}">
                                                    </td>
                                                    <td data-column="{{ __('home.pestBites.sting_appearance') }}">
                                                        <ul class="table_list">
                                                            <li> {{ getLocalizableColumn($pestBite, 'sting_appearance') }} </li>
                                                        </ul>
                                                    </td>
                                                    <td data-column="{{ __('home.pestBites.insect_bites') }}">
                                                        <ul class="table_list">
                                                            <li> {{ getLocalizableColumn($pestBite, 'insect_bites') }} </li>
                                                        </ul>
                                                    </td>
                                                    <td data-column="{{ __('home.pestBites.notes') }}">
                                                        {!! charsLimit(strip_tags(getLocalizableColumn($pestBite, 'notes')), 2000) !!}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
                                                        <button type="submit" class="btn btn-form-contact mt-4 w-100">اشترك</button>
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
            </div>
        </div>
    </section>
</div>
@endSection