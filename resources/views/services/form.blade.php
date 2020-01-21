<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputFile">القسم</label>
    <select required  class="form-control" name="category_id">
        <option selected value="">أختر القسم </option>
        @foreach($categories as $category)
            <option value="{!! $category->id !!}">{!! $category->name_ar !!}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">صورة الخدمة</span>
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
    <label for="exampleInputPassword1">الوصف</label>
    <textarea rows="2" cols="30" name="description_ar" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea rows="2" cols="30" name="description_en" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">هاتف الخدمة</label>
    <input type="text" name="phone" required class="form-control">
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
    <label for="exampleInputPassword1">slug ar</label>
    <input type="text" name="slug_ar" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">slug en</label>
    <input type="text" name="slug_en" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">تفعيل</label>
    <input data-onstyle="danger" id="isActive" checked type="checkbox" name="is_active"  data-toggle="toggle">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Meta tags</label>
    <input type="text" name="tags" class="form-control input-large" required  data-role="tagsinput">
    <span class="help-block with-errors errorName"></span>
</div>
