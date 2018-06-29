<?php

namespace WatchBlog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // one comment belongs to one post
    public function post(){
        return $this->belongsTo('WatchBlog\Post');
    }
}
