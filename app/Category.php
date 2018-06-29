<?php

namespace WatchBlog;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Category extends Model
{
  use CrudTrait;

    protected $table = 'categories';
    // use the table categories when working with this model Category
    protected $fillable = ['name'];

    public function posts() {
        return $this->hasMany('WatchBlog\Post');
        //one to many relationship : one category can have many posts
    }
    public function user() {
        return $this->belongsTo('WatchBlog\User');
    }
}
