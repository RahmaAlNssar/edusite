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
            'price'         => 'nullable|numeric|min:0',
            'discount'      => 'nullable|numeric|min:0|max:99',
            'start_date'    => 'required_with:discount|nullable|date|after_or_equal:' . date('Y-m-d'),
            'end_date'      => 'required_with:discount|nullable|date|after_or_equal:start_date',
            'description'   => 'required|min:5|string',
            'category_id'   => 'required|exists:categories,id',
            'user_id'       => 'required|exists:users,id',
            'image'         => 'required_without:id|mimes:jpg,jpeg,png',
            'visibility'    => 'required|in:0,1',
        ];
    }
}
