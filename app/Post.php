<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    // Table Name
    //protected $table = 'othername';
    // Primary key
    //public $primaryKey = 'itemid';
    // Timestamps
    //public $timestamps = 'true';

    
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


    // change formate of created_at / timestamps
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('d/m/Y'); //Change the format to whichever you desire
    }
}


