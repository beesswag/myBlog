<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use DB;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentControlller extends Controller
{
    public function edit(Request $request)
    {
        $comments = $request->input('comments');
        DB::update('update comments set comment = ? where id = ?',[$comments ,$request->id]);
         return redirect()->back();
    }

    public function showComments($id){
        $post = DB::select('select * from comments where id = ?',[$id]);
        return view('updateComment',['comments'=>$comments]);
    }
}
