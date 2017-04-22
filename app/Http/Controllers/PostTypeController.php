<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\LoaiTin;
use App\Http\Requests\PostTypeRequest;

class PostTypeController extends Controller
{

    public  function table(){
        $posttype = LoaiTin::paginate(7);
    //    dd($posttype);
        return view('admin.posttype.TablePostType',['posttype'=>$posttype]);

    }
    public  function getcreate(){
        $category = Theloai::all();
        return view('admin.posttype.CreatePostType',['category'=> $category]);

    }
    public  function postcreate(PostTypeRequest $request){
        $loaitin = new LoaiTin();
        $loaitin->Ten = title_case($request->input('name'));
        $loaitin->idTheLoai = $request->input('category');
        $loaitin->TenKhongDau = changeTitle($request->input('name'));
        $loaitin->save();
        return redirect('admin/posttype/create')->with('notification','Bạn Đã Thêm Thành Công');
    }
    public function  getupdate($id){
        $posttype = LoaiTin::find($id);
        $category = Theloai::all();
        return view('admin.posttype.EditPostType',['posttype'=>$posttype , 'category'=>$category]);

    }
    public  function postupdate(PostTypeRequest $request,$id){
        $this->validate($request,[
            'name' => 'required|min:3|max:100',
            'category'=> 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên loại tin',
            'name.min' => 'Tên loại tin phải có độ dài từ 3 cho đến 100 ký tự',
            'name.max' => 'Tên  loại tin phải có độ dài từ 3 cho đến 100 ký tự',
            'category.required'=>'Bạn chưa chọn thể loại'
        ]);
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = title_case($request->input('name'));
        $loaitin->idTheLoai = $request->input('category');
        $loaitin->TenKhongDau = changeTitle($request->input('name'));
        $loaitin->save();
        return redirect('admin/posttype/table');
    }
    public  function destroy($id){
        $category = LoaiTin::find($id);
        $category->delete();
        return redirect('admin/posttype/table')->with('notification','Xóa Thành Công');

    }

}
