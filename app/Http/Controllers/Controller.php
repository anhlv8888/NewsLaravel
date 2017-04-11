<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->CheckLogin();
    }
    function CheckLogin(){
        if (Auth::check()){
            dd(Auth::check());
            view()->share('userlogin',Auth::user());
//            return view("admin.layout.main",['user_login'=>Auth::user()]);
        }
    }
}
