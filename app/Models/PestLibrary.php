<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PestLibrary extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pest_libraries';
    protected $fillable = ['name_ar', 'name_en', 'description_ar', 'description_en', 'image', 'sort',
                           'meta_title_ar', 'image_alt','slug_ar', 'slug_en', 'is_active', 'meta_description_ar', 'sub_pest',
                            'keywords_ar', 'keywords_en', 'meta_title_en', 'meta_description_en'];
}
