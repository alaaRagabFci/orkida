<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['name', 'description', 'image', 'sort','meta_title', 'image_alt',
                           'service_id', 'slug', 'is_active', 'meta_description'];
    public $timestamps  = false;

    public function getService()
    {
        return $this->belongsTo('App\Models\Service','service_id','id');
    }
}
