<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideRequest;
class SlideController extends Controller
{
    public  function table(){
        $slide = Slide::all();
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
                return redirect('admin/article/create')->with('error','Bạn chỉ được lấy đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
//            dd($hinh);
            while (file_exists("upload/News".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/News",$hinh);
            $slide->Hinh = $hinh;
        }
        else{
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect("admin/slide/create")->with('notification','Thêm Thành Công');
    }
    public function  getupdate($id){

    }
    public  function postupdate(SlideRequest $request,$id){


    }
    public  function destroy($id){

    }
}
