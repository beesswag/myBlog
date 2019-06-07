<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use DB;

class CommentControlller extends Controller
{
    //
    public function deleteComment($id){
        $usr_id = Auth::id();
        DB::delete('delete from comments where id = ? and user_id = ?',[$id , $usr_id]);
        return redirect()->back();

    }

}
