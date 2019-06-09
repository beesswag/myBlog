<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use DB;
use App\Comment;
<<<<<<< HEAD

use Illuminate\Support\Facades\Auth;
=======
use Auth;
use Illuminate\Http\Request;
>>>>>>> fd37a727aa5f226567097a6883b21d01a811b907
use App\Post;

class CommentControlller extends Controller
{
    //
<<<<<<< HEAD
    public function deleteComment($id){
        $usr_id = Auth::id();
        DB::delete('delete from comments where id = ? and user_id = ?',[$id , $usr_id]);
        return redirect()->back();
    }
=======

>>>>>>> fd37a727aa5f226567097a6883b21d01a811b907
    public function store(Request $request){
        $post = Post::findorfail($request->post_id);
      $comment = $request->input('comment');
      $user_id = Auth::id();
      $pos = $request->post_id;
<<<<<<< HEAD

      $comm = new Comment();
=======
      $comm = new Comment(); 
>>>>>>> fd37a727aa5f226567097a6883b21d01a811b907
      $comm->comment =$comment;
      $comm->user_id =$user_id;
      $comm->post_id =$pos;
      $comm->save();
      return redirect()->route('viewall');
    }

    public function loadEditPage($id)
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

    public function viewallmyComments(){
      $mycomment = Comment::orderBy('id', 'desc')->get();
      $memberspost = Post::orderBy('id', 'desc')->get();
      return view('pages.viewmycomments')->with('mycomment', $mycomment)->with('memberspost', $memberspost);   
    }

  //   public function viewall(){
  //     $memberspost = Post::orderBy('id', 'desc')->get();
  //     $postcomment = Comment::orderBy('id','desc')->get();
  //     return view('pages.viewallposts')->with('memberspost', $memberspost)->with('postcomment', $postcomment);
  // }
}
