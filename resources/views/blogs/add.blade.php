@extends('admin_layouts.inc')
@section('title','أضافة مقال جديده')
@section('breadcrumb','المقالات')
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
                        <span class="caption-subject font-green-haze sbold uppercase">مقالاتنا</span>
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
                    <form id="form_sample_1" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('adminpanel/blogs') }}" data-toggle="validator">
                        <div class="form-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-3">القسم</label>
                                <div class="col-md-4">
                                    <select required  class="form-control" name="article_id">
                                        <option selected value="">أختر القسم </option>
                                        @foreach($articleTypes as $article)
                                            <option value="{!! $article->id !!}">{!! $article->category !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">صورة المقال</label>
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
                                <label class="control-label col-md-3">العنوان</label>
                                <div class="col-md-4">
                                    <input type="text" value="{{ old('name') }}" name="name" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">الوصف</label>
                                <div class="col-md-8">
                                    <textarea rows="5" cols="53" name="description_ar" class="" required>{{ old('description_ar') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">slug</label>
                                <div class="col-md-4">
                                <textarea rows="5" cols="53" name="slug" class="" required>{{ old('slug') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Image alt</label>
                                <div class="col-md-4">
                                <textarea rows="5" cols="53" name="image_alt" class="" required>{{ old('image_alt') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">الكلمة الأفتتاحيه</label>
                                <div class="col-md-4">
                                <textarea rows="5" cols="53" name="keywords" class="" required>{{ old('keywords') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Meta title</label>
                                <div class="col-md-4">
                                <textarea rows="5" cols="53" name="meta_title" class="" required>{{ old('meta_title') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Meta description</label>
                                <div class="col-md-4">
                                <textarea rows="5" cols="53" name="meta_description" class="" required>{{ old('meta_description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">تفعيل</label>
                                <div class="col-md-4">
                                <input data-onstyle="danger" checked type="checkbox" name="is_active"  data-toggle="toggle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Meta tags</label>
                                <div class="col-md-4">
                                <input type="text" value="{{ old('tags') }}" name="tags" class="form-control input-large" required  data-role="tagsinput">
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
