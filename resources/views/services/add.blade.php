@extends('admin_layouts.inc')
@section('title','أضافة خدمه جديده')
@section('breadcrumb','خدمات')
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
                        <span class="caption-subject font-green-haze sbold uppercase">خدماتنا</span>
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
                    <form id="form_sample_1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('adminpanel/services') }}" data-toggle="validator">
                        <div class="form-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-3">القسم</label>
                                <div class="col-md-4">
                                <select  required  class="form-control" name="category_id">
                                    <option selected value="">أختر القسم </option>
                                    @foreach($categories as $category)
                                        <option value="{!! $category->id !!}">{!! $category->name_ar !!}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">صورة الخدمه</label>
                                <div class="col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{ asset('/admin_ui/default-thumbnail_1.jpg')}}" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                <span class="btn default btn-file">
                                 <span class="fileinput-new"> أختر الصوره </span>
                                <span class="fileinput-exists"> تغير </span>
                                <input required type="file" name="image" required> </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">الخدمة الرئيسيه</label>
                                <div class="col-md-4">
                                    <select  class="form-control" name="sub_service">
                                        <option selected value="">بدون خدمه رئيسيه </option>
                                        @foreach($services as $service)
                                            <option value="{!! $service->id !!}">{!! $service->name_ar !!}</option>
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
                                    <label class="control-label col-md-3">العنوان</label>
                                    <div class="col-md-8">
                                        <input type="text" value="{{ old('name_ar') }}" name="name_ar" required class="form-control input-lg">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الوصف</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="description_ar" class="form-control ckeditor" required>{{ old('description_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">slug ar</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="slug_ar" class="" required>{{ old('slug_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الكلمة الأفتتاحيه</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="keywords_ar" class="" required>{{ old('keywords_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta title ar</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="meta_title_ar" class="" required>{{ old('meta_title_ar') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta description ar</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="meta_description_ar" class="" required>{{ old('meta_description_ar') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta tags ar</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{ old('tags_ar') }}" name="tags_ar" class="form-control input-large" required  data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_1_2">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Title</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{ old('name_en') }}" name="name_en" required class="form-control input-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description</label>
                                        <div class="col-md-8">
                                            <textarea rows="2" cols="30" name="description_en" class="form-control" required>{{ old('description_en') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">slug en</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="slug_en" class="" required>{{ old('slug_en') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الكلمة الأفتتاحيه</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="keywords_en" class="" required>{{ old('keywords_en') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta title en</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="meta_title_en" class="" required>{{ old('meta_title_en') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta description en</label>
                                        <div class="col-md-4">
                                            <textarea rows="3" cols="53" name="meta_description_en" class="" required>{{ old('meta_description_en') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta tags en</label>
                                        <div class="col-md-8">
                                            <input type="text" value="{{ old('tags_en') }}" name="tags_en" class="form-control input-large" required  data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">هاتف الخدمة</label>
                                <div class="col-md-4">
                                <input type="text" name="phone" value="{{ old('phone') }}" required class="form-control">
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
