<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'=>'required',
            // 'image'    =>'sometimes|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG,GIF,gif,webp,WEBP,svg,SVG',
            'name_ar'=>'required',
            'name_en'=>'required',
            'meta_title_ar'=>'required',
            'meta_title_en'=>'required',
            'keywords_ar'=>'required',
            'keywords_en'=>'required',
            'meta_description_ar'=>'required',
            'meta_description_en'=>'required',
            'phone'=>'numeric',
            'slug_ar'=>'required',
            'slug_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
        ];
    }
}
