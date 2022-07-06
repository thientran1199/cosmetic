<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' =>'required|unique:slides,title',
            'description' =>'required',
            'image' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title không được để trống',
            'title.unique' => 'Title đã tồn tại',
            'description.required' => 'Description không được để trống',
            'image.required' => 'Image không được để trống',
        ];
    }
}
