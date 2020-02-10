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
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject font-green-haze sbold uppercase">الأسئله الشائعه</span>
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
                                <label class="control-label col-md-3">القسم</label>
                                <div class="col-md-4">
                                    <select required  class="form-control" name="question_category_id">
                                        <option selected value="">أختر القسم </option>
                                        @foreach($categories as $category)
                                            <option value="{!! $category->id !!}">{!! $category->category_ar !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                        <label class="control-label col-md-3">السؤال</label>
                                        <div class="col-md-4">
                                            <input type="text" value="{{ old('question_ar') }}" name="question_ar" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الأجابه</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="description_ar" class="form-control" required>{{ old('description_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">slug ar</label>
                                        <div class="col-md-4">
                                            <input type="text" value="{{ old('slug_ar') }}" name="slug_ar" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_1_2">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Question</label>
                                        <div class="col-md-4">
                                            <input type="text" value="{{ old('question_en') }}" name="question_en" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">answer</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="description_en" class="form-control" required>{{ old('description_en') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">slug en</label>
                                        <div class="col-md-4">
                                            <input type="text" value="{{ old('slug_en') }}" name="slug_en" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">شائع</label>
                                <div class="col-md-4">
                                    <input data-onstyle="danger" checked type="checkbox" name="is_common"  data-toggle="toggle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">تفعيل</label>
                                <div class="col-md-4">
                                    <input data-onstyle="danger" checked type="checkbox" name="is_active"  data-toggle="toggle">
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