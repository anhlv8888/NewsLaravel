<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Slide;
use App\Tintuc;
use App\LoaiTin;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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
        if (Auth::check()){

                view()->share('loginUser',Auth::user());
            }

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
        if (Auth::attempt(['username'=>$request->input('username'),'password'=>$request->input('password')])){
            return redirect('/');
        }else{
            return redirect('loginClient')->with('notification','Username or Password Wrong !!!')->withInput();
        }
    }
    public function postRegisterClient(UserRequest $request){
        $user = new User;
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->level =  0;
        $user->save();
        return redirect('loginClient')->with('notification1','Thêm mới thành công');
    }
    public function getlogoutClient(){
        Auth::logout();
        return redirect('/');
    }
    public function getUserClient($idUser){
        $user  = User::find($idUser);
        return view('client.pages.user',['user'=>$user]);
    }
    public function postUserClient($idUser,Request $request){
        $this->validate($request,[
            'name' => "required|min:3",
            'email' => "required",
        ],[
            'name.required'=>'Bạn chưa nhập Họ Tên',
            'email.required'=>'Bạn chưa nhập Email',
            'name.min'=>'Họ tên có ít nhất 3 kí tự',
        ]);
        $user = User::find($idUser);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->changePassword == "on"){
            $this->validate($request,[
                'password' => "required|min:3|max:32",
                'passwordAgain' => "required|same:password",
            ],[
                'password.required'=>'bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 3 kí tự và tối đa 23 kí tự',
                'password.max'=>'Mật khẩu có ít nhất 3 kí tự và tối đa 23 kí tự',
                'passwordAgain.required'=>'Bạn nhưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Nhập khẩu nhập lại chưa khớp'
            ]);
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        return redirect("userClient/$idUser")->with('notification','Update successfully...');

    }
    public function postSearch(Request $request){
        $keyword =  $request->input('search');
        $result = Tintuc::where('TieuDe','like',"%$keyword%")->orWhere('NoiDung','like',"%$keyword%")
            ->orWhere('TomTat','like',"%$keyword%")->take(20)->paginate(5);
//        dd($article);
        return view('client.pages.search',['result'=>$result,'keyword'=>$keyword]);
    }

}
