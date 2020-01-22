<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['name', 'description', 'image', 'sort','image_title', 'image_alt',
                           'service_id', 'slug_ar', 'slug_en', 'is_active'];
    public $timestamps  = false;

    public function getService()
    {
        return $this->belongsTo('App\Models\Service','service_id','id');
    }
}
