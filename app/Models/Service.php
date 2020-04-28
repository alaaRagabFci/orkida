<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'description_ar', 'description_en', 'image', 'sort',
        'meta_title_ar', 'meta_description_ar', 'category_id', 'phone', 'slug_ar', 'slug_en', 'is_active', 'sub_service',
        'keywords_ar', 'keywords_en', 'meta_title_en', 'meta_description_en'];

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function getTags()
    {
        return $this->hasMany('App\Models\MetaTag');
    }
}
