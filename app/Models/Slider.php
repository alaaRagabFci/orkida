<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title_ar', 'title_en', 'image', 'image_alt'];
    public $timestamps  = false;
}
