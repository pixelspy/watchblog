<?php

namespace WatchBlog;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
// http://carbon.nesbot.com/docs

use Backpack\CRUD\CrudTrait;


class Post extends Model
{
  use CrudTrait;

  protected $table = 'posts';
  protected $fillable = ['title', 'body', 'user_id', 'cover_image', 'category_id']; // what i want to fill



    // a post belongs to one user
    public function user(){
        return $this->belongsTo('WatchBlog\User');
    }

    // a post belongs to one category
    public function category(){
        return $this->belongsTo('WatchBlog\Category');
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
        return $this->hasMany('WatchBlog\Comment');
        // (Comment::class) is like  :  (WatchBlog\Comment)
    }

}
