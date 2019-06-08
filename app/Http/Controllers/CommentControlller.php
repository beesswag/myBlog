<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use DB;
use App\Comment;
use Auth;
use Illuminate\Http\Request;
use App\Post;

class CommentControlller extends Controller
{
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

      return redirect()-> back();

    }
    public function load($id)
    {
            $comment = DB::select('select * from comments where id = ?',[$id]);
            return view('pages.updateComment',['comments'=>$comment]);
    }
  public function editComment(Request $request)
  {
    $comment = $request->input('comment');
    DB::update('update comments set comment = ? where id = ?',[ $comment ,  $request->id]);
    return redirect()->back();
  }
    public function viewComments(){
      $postcomment = Comment::orderBy('id','desc')->get();
      return view('pages.viewallposts')->with('postcomment', $postcomment);
  }
}
