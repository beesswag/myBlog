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

<<<<<<< HEAD

=======
    public function deletepost($id){

      //  $post=>DB::delete(SELECT * FROM Post where id = ? [$id]);
      // return redirect()-> back();
      $post = Post::find($id);
      $post->delete();
      return redirect()->back();

    }
>>>>>>> 85627f3b3c7cdc1e9c84805b67a0fd64458832cc
}
