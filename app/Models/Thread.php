<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;
    protected $table = 'thread';

    public $timestamps = false;

    /**
    * user
    * This function is used in order to get the related user. 
    * @return {User}
    */
   
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
    * post
    * This function is used in order to get the related post. 
    * @return {Post}
    */
   
    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }
}
