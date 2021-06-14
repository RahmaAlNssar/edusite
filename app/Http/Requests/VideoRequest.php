<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title'         => 'required|min:3|max:190|',
            'desc'          => 'required|string|min:5',
            'file'          => 'required_without:url|nullable|mimes:mp4,mov,ogg|file|max:100000',
            'url'           => 'required_without:file|nullable|url',
            'type'          => 'required|in:file,url',
            'course_id'     => 'required|exists:courses,id'
        ];
    }
}
