<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputPassword1">الهاتف</label>
    <input type="text" name="phone" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>