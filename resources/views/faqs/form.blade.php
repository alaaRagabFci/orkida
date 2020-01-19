<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputPassword1">السؤال</label>
    <input type="text" name="question_ar" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Question</label>
    <input type="text" name="question_en" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">الأجابه</label>
    <textarea rows="2" cols="30" name="answer_ar" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Answer</label>
    <textarea rows="2" cols="30" name="answer_en" class="form-control" required></textarea>
</div>
