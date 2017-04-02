<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public  function table(){
        $category = Theloai::all();
//        dd($category);
        return view('admin.category.categorytable',['category'=>$category]);

    }
    public  function getcreate(){
        return view('admin.category.CreateCategory');

    }
    public  function postcreate(CategoryRequest $request){
        $category = new Theloai();
        $category->Ten = $request->input('name');
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
        $category = Theloai::find($id);
        $category->Ten = $request->input('name');
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
