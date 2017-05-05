<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Comment;
use  App\Tintuc;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function destroy($id,$idArticle){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/article/update/'.$idArticle)->with('notification','Xóa bình luận thành công ');
    }
    public function  postCommentArticle($idArt,Request $request){
        if (Auth::guest()){
            return redirect("loginClient")->with('errorlogin','You have to login before comment, Please Login !!!');
        }else {
            $tintuc = Tintuc::find($idArt);
            $comment = new Comment();
            $comment->idTinTuc = $idArt;
            $comment->idUser = Auth::user()->id;
            $comment->NoiDung = $request->input('content');
            $comment->save();
            return redirect("$idArt/" . $tintuc->TieuDeKhongDau . '.htm');
        }


    }
}
