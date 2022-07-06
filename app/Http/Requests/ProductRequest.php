<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'name' =>'required|unique:products,name',
            'category_id' =>'required',
            'price' =>'required',
            'feature_image_path' =>'required',
            'image_path' =>'required',
            'content' =>'required',
        ];
    }
    public function messages()

    {
        return [
            //
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'category_id.required' => 'Danh mục không được để trống',
            // 'category_id.unique' => 'Danh mục đã tồn tại',
            'price.required' => 'Giá không được để trống',
            // 'price.unique' => 'Giá đã tồn tại',
            'feature_image_path.required' => 'Ảnh này không được để trống',
            // 'feature_image_path.unique' => 'Ảnh này đã tồn tại',
            'image_path.required' => 'Vui lòng chọn ảnh này',
            // 'image_path.unique' => 'Giá đã tồn tại',
            'content.required' => 'Content không được để trống',
        ];
    }
}
