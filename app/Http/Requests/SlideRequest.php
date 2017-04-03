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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'content' => 'required',
            'image' => 'required',
        ];
    }
    public  function  messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên ',
            'content.required' => 'Bạn chưa nhập nội dung ',
            'image.required' => 'Bạn chưa có hình ảnh ',
        ];
    }
}
