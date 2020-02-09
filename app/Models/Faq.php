<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question_ar', 'question_en', 'description_ar', 'description_en', 'question_category_id', 'is_active'];
    public function getCategory()
    {
        return $this->belongsTo('App\Models\QuestionCategory','question_category_id','id');
    }
    public $timestamps  = false;
}
