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
  protected $fillable = [
    'title',
    'body',
    'user_id',
    'cover_image',
    'category_id'
  ]; // what i want to fill
    // a post belongs to one user
    public function user(){
        return $this->belongsTo('WatchBlog\User');
    }
    // a post belongs to one category
    public function category(){
        return $this->belongsTo('WatchBlog\Category');
    }
    // one post has many comments
    public function comments()
    {
        return $this->hasMany('WatchBlog\Comment');
        // (Comment::class) is like  :  (WatchBlog\Comment)
    }
    public function tags() {
      return $this->belongsToMany('WatchBlog\Tag');
    }
    // change format of created_at / timestamps
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d/m/Y');
        //Change the format to whichever you desire
    }

}
