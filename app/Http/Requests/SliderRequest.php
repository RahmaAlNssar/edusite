<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'name'          => 'required|string|min:3|max:50|unique:sliders,name,' . $this->id,
            'title'         => 'required|string|min:3|max:100',
            'desc'          => 'required|string|min:3|max:100',
            'image'         => 'required_without:id|mimes:jpg,jpeg,png',
        ];
    }
}
