<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  App\Theloai;
class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:TheLoai,Ten|min:3|max:100',

        ];
    }
    public function messages()
    {
       return [
           'name.required' => 'Bạn chưa nhập tên thể loại',
           'name.unique' => 'Ten The loại Đã Tồn tại',
           'name.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
           'name.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',

       ];
    }
}
