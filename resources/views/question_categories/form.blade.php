<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputPassword1">القسم</label>
    <input type="text" name="category_ar" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Category</label>
    <input type="text" name="category_en" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>