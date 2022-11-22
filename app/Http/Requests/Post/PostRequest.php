<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'image_validate' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên bài đăng',
            'image.required' => 'Ảnh không được để trống',
            'description.required' => 'Miêu tả không được để trống',
            'content.required' => 'Miêu tả chi tiết không được để trống',
            'image_validate.max' => 'Kích thước ảnh quá lớn phải không được quá 2M',
            'image_validate.image' => 'File không thuộc định dạng hình ảnh',
            'image_validate.mimes' => 'File không thuộc jpeg,jpg,png',
        ];
    }
}
