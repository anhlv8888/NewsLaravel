<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public  function table(){
        $user = User::all();
        return  view("admin.user.TableUser", ['user'=>$user]);
    }
    public  function getcreate(){
        return view("admin.user.CreateUser");
    }
    public  function postcreate(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->level =  $request->input('level');
        $user->save();
        return redirect('admin/user/create')->with('notification','Thêm mới thành công');
    }
    public function  getupdate($id){
        $user = User::find($id);
        return view('admin.user.EditUser',['user'=>$user]);

    }
    public  function postupdate(Request $request,$id){
        $this->validate($request,[
            'name' => "required|min:3",
        ],[
            'name.required'=>'Bạn chưa nhập Họ Tên',
            'name.min'=>'Họ tên có ít nhất 3 kí tự',
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->level =  $request->input('level');
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
        return redirect('admin/user/table');
    }
    public  function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/table')->with('notification','Xóa thành công');
    }
    public  function getloginAdmin(){
        return view('admin.user.login');
    }
    public function postloginAdmin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:23'
        ],[
            'email.required'=>'Please input email',
            'password.required'=>'Please input password',
            'password.min'=>'Password không được nhỏ hơn 3 và lớn hơn 23 ký tự',
            'password.max'=>'Password không được nhỏ hơn 3 và lớn hơn 23 ký tự',

        ]);
        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect('admin/category/table');
        }
        else{
            return redirect('admin/login')->with('notification','Mail or password ');
        }

    }
    public function getlogout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
