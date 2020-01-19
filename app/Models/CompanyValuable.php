<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyValuable extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company_valuables';
    protected $fillable = ['title_ar', 'title_en', 'description_ar', 'description_en', 'icon'];
    public $timestamps  = false;
}
