<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputPassword1">القسم</label>
    <input type="text" name="category" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label class="control-label">slug</label>
    <input type="text" name="slug" required class="form-control">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">تفعيل</label>
    <input data-onstyle="danger" id="isActive" type="checkbox" name="is_active"  data-toggle="toggle">
</div>