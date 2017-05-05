<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideRequest;
class SlideController extends Controller
{
    public  function table(){
        $slide = Slide::paginate(5);
//        dd($slide);
        return view('admin.slide.TableSlide' , ['slide'=>$slide]);

    }
    public  function getcreate(){
        return view('admin.slide.CreateSlide');


    }
    public  function postcreate(SlideRequest $request){
        $slide =  new Slide();
        $slide->Ten = $request->input('name');
        $slide->NoiDung = $request->input('content');
        $slide->link = $request->input('link');
//        dd($request->hasFile('image'));
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin//create')->with('error','Bạn chỉ được lấy đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
//            dd($hinh);
            while (file_exists("upload/slide".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/slide",$hinh);
            $slide->Hinh = $hinh;
        }
        else{
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect("admin/slide/create")->with('notification','Thêm Thành Công');
    }
    public function  getupdate($id){
        $slide = Slide::find($id);
//        dd($slide);
        return view('admin.slide.EditSlide' , ['slide'=>$slide]);

    }
    public  function postupdate(Request $request,$id){
        $slide = Slide::find($id);
        $this->validate($request,[
            'name' => 'required',
            'content' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên ',
            'content.required' => 'Bạn chưa nhập nội dung ',
        ]);
        $slide->Ten = $request->input('name');
//        dd($request->input('name'));
        $slide->NoiDung = $request->input('content');
        $slide->link = $request->input('link');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/slide/update/'.$id)->with('error','Bạn chỉ lấy đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/slide".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/slide/",$hinh);
            if(file_exists("upload/slide/".$slide->Hinh)){
                unlink("upload/slide/".$slide->Hinh);
            }
            $slide->Hinh = $hinh;
        }
        $slide->save();
        return redirect('admin/slide/table');



    }
    public  function destroy($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/table')->with('notification','Xoá thành công ');
    }
}
