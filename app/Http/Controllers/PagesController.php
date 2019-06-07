<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class PagesController extends Controller
{
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
        return view('pages.viewallposts')->with('memberspost', $memberspost);
    }
}

