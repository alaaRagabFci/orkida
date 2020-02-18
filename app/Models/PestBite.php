<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PestBite extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = ['image', 'pest_type_ar', 'pest_type_en', 'insect_bites_ar', 'insect_bites_en', 'notes_ar', 'notes_en'];
    public $timestamps  = false;
}
