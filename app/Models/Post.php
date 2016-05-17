<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $table = 'post';

    public $timestamps = false;

    /**
    * thread
    * This function is used in order to get the related thread. 
    * @return {Thread}
    */
   
    public function thread()
    {
        return $this->belongsTo('App\Models\Thread');
    }

    /**
    * user
    * This function is used in order to get the related user. 
    * @return {User}
    */
   
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
