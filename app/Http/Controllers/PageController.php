<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Slide;
use App\Tintuc;
use App\LoaiTin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $posttype2 = LoaiTin::where('idTheLoai',$idCate)->get();
        $ctarticle = $cate1->tintuc->where('NoiBat',1)->sortByDesc('created_at');
//        dd($ctarticle);
        return view('client.pages.category',['cate1'=>$cate1,'posttype2'=>$posttype2,'ctarticle'=>$ctarticle]);
    }
    public function posttype($idCate,$category,$idPt){
        $cate1 = Theloai::find($idCate);
        $postype1 = LoaiTin::find($idPt);
        $posttype2 = LoaiTin::where('idTheLoai',$idCate)->get();
//        $ptarticle = Tintuc::all()->where('NoiBat',1)->sortByDesc('SoLuotXem')->take(4);
        $ptarticle = Tintuc::all()->where('idLoaiTin',$idPt)->sortBy('created_at')->take(5);
        $ctarticle = $cate1->tintuc->where('NoiBat',1)->sortByDesc('created_at');
//        dd($ptarticle);
        return view('client.pages.category',['cate1'=>$cate1,'postype1'=>$postype1,'posttype2'=>$posttype2,
            'ptarticle'=>$ptarticle,'ctarticle'=>$ctarticle]);
    }
    public function article($idArt,$article){
        $tintuc1 = Tintuc::where('TieuDeKhongDau',$article)->get();
        $tintuc2 = Tintuc::find($idArt);
//        dd($tintuc1->comment);
        return view('client.pages.article',['tintuc1'=>$tintuc1,'tintuc2'=>$tintuc2]);
    }
    public function getloginClient(){
        return view('client.pages.loginClient');
    }
    public function postloginClient(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:3|max:23'
        ],[
            'username.required'=>'Please input email',
            'password.required'=>'Please input password',
            'password.min'=>'Password không được nhỏ hơn 3 và lớn hơn 23 ký tự',
            'password.max'=>'Password không được nhỏ hơn 3 và lớn hơn 23 ký tự',

        ]);
        if (Auth::attempt(['name'=>$request->input('username'),'password'=>$request->input('password')])){
            return redirect('/');
        }else{
            return redirect('loginClient')->with('notification','Username or Password Wrong !!!');
        }
    }
    public function postRegisterClient(){

    }

}
