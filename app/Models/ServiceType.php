<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service_types';
    protected $fillable = ['name_ar', 'name_en', 'image', 'sort',
        'image_title', 'image_alt', 'service_id', 'is_active'];
    public $timestamps  = false;

    public function getService()
    {
        return $this->belongsTo('App\Models\Service','service_id','id');
    }
}
