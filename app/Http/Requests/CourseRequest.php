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
            'price'         => 'required|numeric',
            'discount'      => 'required|int',
            'description'   => 'required',
            'category_id'   => 'required|exists:categories,id',
            'user_id'       => 'required|exists:users,id',
            'image'         =>'required|mimes:jpg,jpeg,png'
        ];
    }
}
