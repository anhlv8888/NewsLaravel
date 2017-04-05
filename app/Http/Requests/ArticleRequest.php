<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'posttype' => 'required',
            'title' => 'required|min:3|unique:TinTuc,TieuDe',
            'description'=> 'required',
            'content'=>'required',
            'image'=>'required'

        ];
    }
    public function messages()
    {
        return [
            'posttype.required'=>'Ban chưa chọn loại tin',
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
            'title.unique'=>'Tiêu đề đã tồn tại',
            'description.required'=>'bạn chưa nhập tóm tắt',
            'content.required'=>'Bạn nhưa nhập nội dung',
            'image.required'=>'Chưa có hình ảnh'

        ];
    }
}
