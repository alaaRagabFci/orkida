<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="hidden" name="relationId" value="{{ $relationId }}">
<input type="hidden" name="type" value="{{ $type }}">
<div class="form-group">
    <label for="exampleInputPassword1">Meta tags</label>
    <input type="text" name="tags" class="form-control input-large" required  data-role="tagsinput">
    <span class="help-block with-errors errorName"></span>
</div>
