<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Comment;

class CommentController extends Controller
{
    public function destroy($id,$idArticle){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/article/update/'.$idArticle)->with('notification','Xóa bình luận thành công ');
    }
}
