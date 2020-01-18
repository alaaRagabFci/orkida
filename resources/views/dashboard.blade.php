@extends('admin_layouts.inc')

@section('title','لوحة التحكم')
@section('header','لوحة التحكم')
@section('head_description','الأحصائيات, الأشكال البيانيه والتقرير')
@section('breadcrumb','لوحة التحكم')
@section('content')
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <a href="{{ url('messages') }}">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="{{ $messages }}"></span>
                                        </h3>
                                        <small>الرسايل</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fab fa-facebook-messenger"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: {{ $messages }}%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">{{ $messages }}%</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-number"> {{ $messages }}% </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <a href="{{ url('blogs') }}">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
                                        <span data-counter="counterup" data-value="{{ $blogs }}"></span>
                                        </h3>
                                        <small>المدونات</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-blog"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: {{ $blogs }}%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">{{ $blogs }}%</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-number"> {{ $blogs }}% </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <a href="{{ url('services') }}">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                          <span data-counter="counterup" data-value="{{ $services }}"></span>
                                        </h3>
                                        <small>الخدمات</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-server"></i>
                                    </div>
                                </div>
                                 <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: {{ $services }}%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">{{ $services }}%</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-number"> {{ $services }}% </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <a href="{{ url('orders') }}">
                            <div class="dashboard-stat2 bordered">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-purple-soft">
                                            <span data-counter="counterup" data-value="{{ $orders }}"></span>
                                        </h3>
                                        <small>الطلبات</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fab fa-first-order"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: {{ $orders }}%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">{{ $orders }}%</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-number"> {{ $orders }}% </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                    <!-- END PAGE BASE CONTENT -->
@endsection