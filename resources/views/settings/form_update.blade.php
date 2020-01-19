<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">اللوجو</span>
    <span class="fileupload-exists">تغير</span>
    <input type="file" name="logo"/></span>
        <span class="fileupload-preview"></span>
        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
        <span class="help-block with-errors errorName"></span>
    </div>
</div>

<div class="form-group" style="display:none;">
    <label for="exampleInputFile">pic path</label>
    <input type="text" name="logo" id="logo">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">الموقع</label>
    <input type="text" name="location_ar" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">location</label>
    <input type="text" name="location_en" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">latitude</label>
    <input type="text" name="latitude" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">longitude</label>
    <input type="text" name="longitude" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">البريد الألكتروني</label>
    <input type="text" name="site_email" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">الفيس بوك</label>
    <input type="url" name="facebook_url" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">تويتر</label>
    <input type="url" name="twitter_url" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">الأنستجرام</label>
    <input type="url" name="instagram_url" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">اليوتيوب</label>
    <input type="url" name="youtube_url" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">بنترست</label>
    <input type="url" name="pinterest_url" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">لينكد ان</label>
    <input type="url" name="linkedin_url" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>









