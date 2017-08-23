<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // one comment belongs to one post
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
