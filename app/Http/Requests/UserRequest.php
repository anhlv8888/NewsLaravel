<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Ban chưa nhập tên người dùng',
            'name.min'=>"Tên người dùng có ít nhất 3 ký tự",
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dang email',
            'email.unique'=>'Tiêu đề đã tồn tại',
            'password.required'=>'bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 kí tự và tối đa 23 kí tự',
            'password.max'=>'Mật khẩu có ít nhất 3 kí tự và tối đa 23 kí tự',
            'passwordAgain.required'=>'Bạn nhưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Nhập khẩu nhập lại chưa khớp'
        ];
    }
}
