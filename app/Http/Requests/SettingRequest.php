<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'config_key' => 'required|unique:settings,config_key',
            'config_value' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'config_key.required' => 'Không được để trống',
            'config_key.unique' => 'Đã tồn tại',
            'config_value.required' => 'Không được để trống',
        ];
    }
}
