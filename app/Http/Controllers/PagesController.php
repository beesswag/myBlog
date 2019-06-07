<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Comment;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addnewpost(){
        return view('pages.addpost');
    }

    public function storepost(Request $request){
        $newpost = new Post;
        $newpost->user_id = Auth::id();
        $newpost->post = $request->post;
        $newpost->save();
        return redirect()->back()->with('success', 'New Post added');
    }

    public function deletepost($id){

      //  $post=>DB::delete(SELECT * FROM Post where id = ? [$id]);
      // return redirect()-> back();
      $post = Post::find($id);
      $post->delete();
      return redirect()->back();

    }

    public function show($id){
        $post = DB::select('select * from posts where id = ?',[$id]);
        return view('pages.update',['post'=>$post]);
    }
    public function editPost(Request $request){
        $post = $request->input('post');
        DB::update('update posts set post = ? where id = ?',[ $post ,  $request->id]);
        return redirect()->back();
    }

    public function viewall(){
        $memberspost = Post::orderBy('id', 'desc')->get();
        $postcomment = Comment::orderBy('id','desc')->get();
        return view('pages.viewallposts')->with('memberspost', $memberspost)->with('postcomment', $postcomment);
    }

    // public function store(Request $request){
    //     $comment = $request->input('comment');
    //     $user_id = Auth::id();
    //     $post = Post::findorfail($request->post_id);
    //     $pos = $request->post_id;
    //     $comm = new Comment();
    //     $comm->comment =$comment;
    //     $comm->user_id =$user_id;
    //     $comm->post_id =$pos;
    //     $comm->save();
    //     return redirect()->back();
    //   }
  
    //   public function viewComments(){
    //     $postcomment = Comment::orderBy('id','desc')->get();
    //     return view('pages.viewallposts')->with('postcomment', $postcomment);
    // }

}