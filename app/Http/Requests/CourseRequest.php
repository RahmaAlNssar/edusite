<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title'         => 'required|min:5|max:190',
            'price'         => 'required|numeric|min:0',
            'discount'      => 'required|numeric|min:0|max:100',
            'description'   => 'required|min:5|string',
            'category_id'   => 'required|size:1|exists:categories,id',
            'user_id'       => 'required|size:1|exists:users,id',
            'image'         => 'required_without:id|mimes:jpg,jpeg,png'
        ];
    }
}
