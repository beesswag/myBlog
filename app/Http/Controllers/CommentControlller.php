<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\Post;
use DB;

class CommentControlller extends Controller
{

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
      return redirect()->route('viewall');
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
