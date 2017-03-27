<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTypeRequest extends FormRequest
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
            'name' => 'required|unique:LoaiTin,Ten|min:3|max:100',
            'category'=> 'required',
        ];
    }
    public function  messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên loại tin',
            'name.unique' => 'Ten loại tin Đã Tồn tại',
            'name.min' => 'Tên loại tin phải có độ dài từ 3 cho đến 100 ký tự',
            'name.max' => 'Tên  loại tin phải có độ dài từ 3 cho đến 100 ký tự',
            'category.required'=>'Bạn chưa chọn thể loại'
        ];
    }
}
