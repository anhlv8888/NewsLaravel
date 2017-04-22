<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Slide;
use App\Tintuc;
use App\LoaiTin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class PageController extends Controller
{
    public function __construct()
    {
        $category = Theloai::all()->take(8);
        $slide = Slide::all()->sortByDesc('created_at')->take(5);
        $article = Tintuc::all()->where('NoiBat',1)->sortByDesc('created_at');
        $article1 = Tintuc::all()->where('NoiBat',1)->sortByDesc('SoLuotXem');

//        dd($article);
        view()->share('category',$category);
        view()->share('article',$article);
        view()->share('article1',$article1);
        view()->share('slide',$slide);
    }

    public function home(){
        return view('client.pages.home');
    }
    public  function  category($idCate){
        $cate1 = Theloai::find($idCate);
        $posttype1 = LoaiTin::where('idTheLoai',$idCate)->get();
        return view('client.pages.category',['cate1'=>$cate1,'posttype1'=>$posttype1]);
    }
    public function posttype($idCate){
        $cate1 = Theloai::find($idCate);
        $posttype1 = LoaiTin::where('idTheLoai',$idCate)->get();
        return view('client.pages.category',['cate1'=>$cate1,'posttype1'=>$posttype1]);
    }

}
