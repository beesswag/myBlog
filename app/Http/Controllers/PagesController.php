<?php

namespace App\Http\Controllers;

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
}
