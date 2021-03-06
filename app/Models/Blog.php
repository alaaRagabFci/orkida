<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['name', 'description_ar', 'image', 'sort','meta_title', 'image_alt',
                           'article_id', 'slug', 'is_active', 'meta_description', 'keywords'];

    public function getArticleType()
    {
        return $this->belongsTo('App\Models\ArticleType','article_id','id');
    }
}
