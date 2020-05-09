@extends('Front.layouts')
@section('title',__('home.meta.404.title'))
@section('meta')
<meta name="keywords" content="{{ __('home.meta.404.keywords') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="{{ __('home.meta.404.description') }}">
@endsection
@section('content')
    <!-- start content of page -->
    <div class="wrapper_content">
        <div class="beardcamp_info_other">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-white">
                            <div class="ImgError">
                                <img class="d-block text-center" src="{{ asset('/assets/img/404/404.svg')}}">
                                <strong>{{ __('home.404.pageError') }} </strong>
                                <p>{{ __('home.404.reEnter') }} </p>
                                <a href="{{ url('/') }}" class="backBtn mb-4">{{ __('home.404.backHome') }} </a>

                                <div class="img-overlay">
                                    <img src="{{ asset('/assets/img/404/Elements.svg')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content of page -->
@endSection