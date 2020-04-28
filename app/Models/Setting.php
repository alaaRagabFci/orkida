<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['youtube_url', 'facebook_url', 'twitter_url', 'linkedin_url', 'instagram_url', 'pinterest_url', 'location_ar', 'location_en', 'logo', 'site_email', 'latitude', 'longitude'];
}
