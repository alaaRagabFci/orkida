<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about_us';
    protected $fillable = ['description_ar', 'description_en', 'vision_ar', 'vision_en', 'goal_ar', 'goal_en',
                           'video', 'home_title_ar', 'home_description_ar', 'home_title_en', 'home_description_en',
                           'privacy_ar', 'privacy_en', 'policy_ar', 'policy_en'];
    public $timestamps  = false;
}
