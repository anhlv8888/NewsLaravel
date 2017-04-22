<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public  function table(){
//        $category = Theloai::all();
        $category = Theloai::paginate(7);
//        dd($category);
        return view('admin.category.categorytable',['category'=>$category]);

    }
    public  function getcreate(){
        return view('admin.category.CreateCategory');

    }
    public  function postcreate(CategoryRequest $request){
        $category = new Theloai();
        $name = $request->input('name');
        $category->Ten = title_case($name);
        $category->TenKhongDau = changeTitle($request->input('name'));
//        echo changeTitle($request->input('name'));
        $category->save();

        return redirect('admin/category/create')->with('notification','Thêm Thành Công');
    }
    public function  getupdate($id){
        $category = Theloai::find($id);
        return view('admin.category.EditCategory',['category'=>$category]);

    }
    public  function postupdate(CategoryRequest $request,$id){
//        $this->validate($request,[
//            'name' => 'required|min:3|max:100',
//        ],[
//            'name.required' => 'Bạn chưa nhập tên thể loại',
//            'name.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
//            'name.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
//
//        ]);
        $category = Theloai::find($id);
        $category->Ten = title_case($request->input('name'));
        $category->TenKhongDau = changeTitle($request->input('name'));
        $category->save();
        return redirect('admin/category/table');

    }
    public  function destroy($id){
        $category = Theloai::find($id);
        $category->delete();
        return redirect('admin/category/table')->with('notification','Xóa Thành Công');
    }
}
