<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'image_validate' => 'nullable|max:2048|image|mimes:jpeg,jpg,png'
        ];
    }


    public function messages()
    {
        return [
            'image_validate.max' => 'Kích thước ảnh quá lớn phải không được quá 2M',
            'image_validate.image' => 'File không thuộc định dạng hình ảnh',
            'image_validate.mimes' => 'File không thuộc jpeg,jpg,png',
        ];
    }
}
