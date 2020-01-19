<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['ads1', 'ads2', 'ads3'];
    public $timestamps  = false;
}
