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

    public function edit($id){
        $post = Post::find($id);
        return view('pages.editpost')->with('post', $post);
    }

    public function update(Request $request, $id){
        $request -> validate([
            'post' => 'required|min:5',
        ]); 
        $post = Post::find($id);
        $post->post = $request->post;
        $post->save();
        return redirect()->route('home')->with('success', 'Updated');
    }

    public function viewAll(){
        $memberspost = Post::orderBy('id', 'desc')->get();
        return view('pages.viewallposts')->with('memberspost', $memberspost);
    }

    public function show($id){
        return Post::find($id);
    }
}

