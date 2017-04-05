<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;

class AjaxController extends Controller
{
    public  function getPostType($idCategory){
        $posttype = LoaiTin::where('idTheLoai',$idCategory)->get();
        foreach ($posttype as $value){
                echo "<option value='".$value->id."'>".$value->Ten."</option>";
        }
    }
}
