@extends('admin_layouts.inc')
@section('title','تعديل اللدغه')
@section('breadcrumb','أنواع اللدغات')
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
                        <span class="caption-subject font-green-haze sbold uppercase">اللدغات</span>
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
                    <form id="form_sample_1" class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('adminpanel/pest_bites/'.$bite->id) }}" data-toggle="validator">
                        <div class="form-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="control-label col-md-3">الصورة</label>
                                <div class="col-md-4">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="{{ config("app.baseUrl").$bite->image }}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                <span class="btn default btn-file">
                                 <span class="fileinput-new"> أختر الصوره </span>
                                <span class="fileinput-exists"> تغير </span>
                                <input type="file" name="image"> </span>
                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
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
                                        <label class="control-label col-md-3">مظهر اللدغه</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{ $bite->sting_appearance_ar }}" name="sting_appearance_ar" required class="form-control input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">نوع الحشرة</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{ $bite->pest_type_ar }}" name="pest_type_ar" required class="form-control input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الأعراض</label>
                                        <div class="col-md-8">
                                            <textarea rows="3" cols="30" name="insect_bites_ar" class="form-control" required>{{ $bite->insect_bites_ar }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">ملاحظات</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="notes_ar" class="form-control" required>{{ $bite->notes_ar }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_1_2">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sting appearence</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{ $bite->sting_appearance_en }}" name="sting_appearance_en" required class="form-control input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Pest type</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{ $bite->pest_type_en }}" name="pest_type_en" required class="form-control input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Insects</label>
                                        <div class="col-md-8">
                                            <textarea rows="3" cols="30" name="insect_bites_en" class="form-control" required>{{ $bite->insect_bites_en }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Notes</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="notes_en" class="form-control" required>{{ $bite->notes_en }}</textarea>
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
    <script>
        CKEDITOR.replace( 'notes_ar', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            language : 'ar'
        });

        CKEDITOR.replace( 'notes_en', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            language : 'en'
        });
    </script>
    <script src="{{ asset('/admin_ui/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin_ui/assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
@endsection
