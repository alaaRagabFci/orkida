<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'description_ar', 'description_en', 'image', 'sort',
        'image_title', 'image_alt', 'category_id', 'phone', 'slug_ar', 'slug_en', 'is_active'];
    public $timestamps  = false;

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
