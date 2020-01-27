<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
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
            'cateory_id'=>'required',
            'image'    =>'sometimes|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG',
            'name_ar'=>'required',
            'name_en'=>'required',
            'image_title'=>'required',
            'image_alt'=>'required',
            'phone'=>'required',
            'slug_ar'=>'required',
            'slug_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
        ];
    }
}
