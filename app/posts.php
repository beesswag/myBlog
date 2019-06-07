<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public function comment{
      return $this->hasMany('App\Comment');
    }
}
