<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePestBiteRequest extends FormRequest
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
            // 'image'    =>'sometimes|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG,GIF,gif,webp,WEBP,svg,SVG',
            'pest_type_ar'=>'required',
            'pest_type_en'=>'required',
            'sting_appearance_ar'=>'required',
            'sting_appearance_en'=>'required',
            'insect_bites_ar'=>'required',
            'insect_bites_en'=>'required',
            'notes_ar'=>'required',
            'notes_en'=>'required',
        ];
    }
}
