<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_types';
    protected $fillable = ['category', 'slug', 'is_active'];
    public $timestamps  = false;
}
