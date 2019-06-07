<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use DB;
use App\Comment;
use Auth;
use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Post;
use DB;

class CommentControlller extends Controller
{
<<<<<<< HEAD
    public function edit(Request $request)
    {
        $comments = $request->input('comments');
        DB::update('update comments set comment = ? where id = ?',[$comments ,$request->id]);
         return redirect()->back();
    }

    public function showComments($id){
        $post = DB::select('select * from comments where id = ?',[$id]);
        return view('updateComment',['comments'=>$comments]);
=======
    //

    public function store(Request $request){
      $comment = $request->input('comment');
      $user_id = Auth::id();
      $post = Post::findorfail($request->post_id);
      $pos = $request->post_id;
      $comm = new Comment();
      $comm->comment =$comment;
      $comm->user_id =$user_id;
      $comm->post_id =$pos;
      $comm->save();
>>>>>>> 802fb3935bf76acc99bc073b76ac15ea8e7fc02a
    }
}
