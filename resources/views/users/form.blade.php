<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

<div class="form-group">
    <label for="exampleInputPassword1">أسم المستخدم</label>
    <input type="text" name="name" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">البريد الألكتروني</label>
    <input type="text" name="email" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputFile">Role</label>
    <select  class="form-control" name="role">
        <option value="Admin">Admin</option>
        <option value="Editor">Editor</option>
    </select>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">الرقم السري</label>
    <input type="password" name="password" class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>