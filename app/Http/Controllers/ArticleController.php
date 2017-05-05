<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\LoaiTin;
use App\Tintuc;
use App\Comment;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    //bla
    public  function table(){
            $article = Tintuc::orderBy('id','DESC')->paginate(5);
        return view('admin.article.TableArticle',['article'=>$article]);

    }
    public  function getcreate(){
        $category = Theloai::all();
        $posttype = LoaiTin::all();

        return view('admin.article.CreateArticle',['category'=>$category,'posttype'=>$posttype]);

    }
    public  function postcreate(ArticleRequest $request){
        $article = new Tintuc();
        $article->TieuDe = $request->input("title");
        $article->TieuDeKhongDau = changeTitle($request->input("title"));
        $article->idLoaiTin = $request->input("posttype");
        $article->TomTat =  $request->input("description");
        $article->NoiDung = $request->input("content");
        $article->SoLuotXem = 0;
        $article->NoiBat = $request->input("important");
//        dd($request->file('image'));
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
            $article->Hinh = $hinh;
        }
        else{
            $article->Hinh = "";
        }

        $article->save();
        return redirect('admin/article/create')->with('notification','Thêm mới thành công');

    }
    public function  getupdate($id){
        $category = Theloai::all();
        $posttype = LoaiTin::all();
        $article = Tintuc::find($id);
        return view('admin.article.EditArticle',['article'=>$article,'category'=>$category,'posttype'=>$posttype]);

    }
    public  function postupdate(Request $request,$id){
        $article = Tintuc::find($id);
        $this->validate($request,[
            'posttype' => 'required',
            'title' => 'required|min:3',
            'description'=> 'required',
            'content'=>'required'

        ],[
            'posttype.required'=>'Ban chưa chọn loại tin',
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
            'description.required'=>'bạn chưa nhập tóm tắt',
            'content.required'=>'Bạn nhưa nhập nội dung',

        ]);
        $article->TieuDe = $request->input("title");
        $article->TieuDeKhongDau = changeTitle($request->input("title"));
        $article->idLoaiTin = $request->input("posttype");
        $article->TomTat =  $request->input("description");
        $article->NoiDung = $request->input("content");
        $article->NoiBat = $request->input("important");
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
            if(file_exists("upload/News/".$article->Hinh)){
                unlink("upload/News/".$article->Hinh);
            }

            $article->Hinh = $hinh;
        }


        $article->save();
        return redirect('admin/article/table');


    }
    public  function destroy($id){
        $article = Tintuc::find($id);
        $article->delete();
        return redirect('admin/article/table')->with('notification','xóa thành công');


    }

}
