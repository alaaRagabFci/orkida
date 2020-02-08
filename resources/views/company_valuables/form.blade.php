<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">الأيكون</span>
    <span class="fileupload-exists">تغير</span>
    <input type="file" name="icon" required/></span>
        <span class="fileupload-preview"></span>
        <a href="#" required class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
        <span class="help-block with-errors errorName"></span>
    </div>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">العنوان</label>
    <input type="text" name="title_ar" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input type="text" name="title_en" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">الوصف</label>
    <textarea rows="2" cols="30" name="desc_ar" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea rows="2" cols="30" name="desc_en" class="form-control" required></textarea>
</div>
