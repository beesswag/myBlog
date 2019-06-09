<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

use Illuminate\Support\Facades\Auth;
use App\Post;
use DB;

class CommentControlller extends Controller
{
    //
    public function deleteComment($id){
        $usr_id = Auth::id();
        DB::delete('delete from comments where id = ? and user_id = ?',[$id , $usr_id]);
        return redirect()->back();
    }
    public function store(Request $request){
        $post = Post::findorfail($request->post_id);
      $comment = $request->input('comment');
      $user_id = Auth::id();
      $pos = $request->post_id;

      $comm = new Comment();
      $comm->comment =$comment;
      $comm->user_id =$user_id;
      $comm->post_id =$pos;
      $comm->save();
      return redirect()-> back();
    }

    public function viewComments(){
      $postcomment = Comment::orderBy('id','desc')->get();
      return view('pages.viewallposts')->with('postcomment', $postcomment);
  }
}
