<?php

namespace WatchBlog;

use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use CrudTrait;
    use HasRoles;

    use Notifiable;
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // a user has many posts
    public function posts(){
        return $this->hasMany('WatchBlog\Post');
    }
    public function comments(){
        return $this->hasMany('WatchBlog\Comment');
    }


}
