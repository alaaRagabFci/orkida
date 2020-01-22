<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputFile">الخدمة</label>
    <select required  class="form-control" name="service_id">
        <option selected value="">أختر الخدمه </option>
        @foreach($services as $service)
            <option value="{!! $service->id !!}">{!! $service->name_ar !!}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">صورة نوع الخدمة</span>
    <span class="fileupload-exists">تغير</span>
    <input type="file" name="image" required/></span>
        <span class="fileupload-preview"></span>
        <a href="#" required class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
        <span class="help-block with-errors errorName"></span>
    </div>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">العنوان</label>
    <input type="text" name="name_ar" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input type="text" name="name_en" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">image title</label>
    <input type="text" name="image_title" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Image alt</label>
    <textarea rows="2" cols="30" name="image_alt" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">تفعيل</label>
    <input data-onstyle="danger" id="isActive" checked type="checkbox" name="is_active"  data-toggle="toggle">
</div>
