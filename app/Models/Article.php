<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;

    protected $table = 'article';

    public $timestamps = false;

    /**
    * user
    * This function is used in order to get the article's author. 
    * @return {User}
    */
   
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    /**
    * images
    * This function is used in order to get the article's images.
    * @return {LaravelCollection => Images}
    */
   
    public function images()
    {
    	return $this->belongsToMany('App\Models\Image');
    }

    /**
    * last
    * This function is used in order to get the latest article. 
    * @return {Article}
    */
   
    public static function last()
    {
    	return Article::orderBy('created_at', 'desc')->first();
    }

    /**
    * take
    * This function is used in order to get the n latest article. 
    * @return {Article}
    */
   
    public static function take($n)
    {
        return Article::orderBy('created_at', 'desc')->take($n)->get();
    }
}
