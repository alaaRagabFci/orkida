<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            'question_ar'=>'required',
            'question_en'=>'required',
            'description_en'=>'required',
            'description_en'=>'required',
            'question_category_id'=>'required',
            'slug_ar'=>'required',
            'slug_en'=>'required',
        ];
    }
}
