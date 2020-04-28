<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitePhone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'site_phones';
    protected $fillable = ['phone'];
}
