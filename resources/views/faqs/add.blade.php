@extends('admin_layouts.inc')
@section('title','أضافة سؤال')
@section('breadcrumb','الأسئله الشائعه')
@section('styles')
    <link href="{{ asset('/admin_ui/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_ui/assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">الأسئله الشائعه</span>
                    </div>
                </div>
                <div class="portlet-body">
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                                <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('msg'))
                        <div class="alert alert-success" align="center">
                            <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                            <h4>{{session('msg')}}</h4>
                        </div>
                    @endif
                    <!-- BEGIN FORM-->
                    <form id="form_sample_1" class="form-horizontal" method="POST" action="{{ url('adminpanel/faqs') }}" data-toggle="validator">
                        <div class="form-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-3"></label>
                                <div class="portlet-title tabbable-line">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab">العربي</a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab">الانجليزي</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">السؤال والأجابه</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="description_ar" class="form-control" required>{{ old('description_ar') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_1_2">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Question & answer</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="description_en" class="form-control" required>{{ old('description_en') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/admin_ui/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin_ui/assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
@endsection