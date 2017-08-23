<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
// http://carbon.nesbot.com/docs

class Post extends Model
{

    // a post belongs to one user
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    // a post belongs to one category
    public function category(){
        return $this->belongsTo('App\Category');
    }

    // category() is the method, and we have access to all the elements in our DB
    // {{$post->category->name}} in our view category is not the method but the property
    // and name is the key from our DB table


    // change format of created_at / timestamps
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d/m/Y'); //Change the format to whichever you desire
    }

    // one post has many comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
        // (Comment::class) is like  :  (App\Comment)
    }
    
}


