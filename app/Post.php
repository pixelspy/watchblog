<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    //protected $table = 'othername';
    // Primary key
    //public $primaryKey = 'itemid';
    // Timestamps
    //public $timestamps = 'true';

    
    // a post has relationship with one user
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
