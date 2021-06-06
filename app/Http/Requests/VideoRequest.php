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
        $video = isset($this->id) ? '' : 'required|';
        return [
            'title'         => 'required|min:3|max:190|',
            'description'   => 'required|string|min:5',
            'video'         => 'required_without:id|mimes:mp4,mov,ogg|file|max:1000000',
            'course_id'     => 'required|exists:courses,id'
        ];
    }
}
