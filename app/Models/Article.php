<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;

    protected $table = 'article';
    protected $guarded = array();
    
    public $timestamps = true;

    const DRAFT = 0;
    const PUBLISHED = 1;


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

     /**
    * takePublished
    * This function is used in order to get the n latest article published. 
    * @return {Article}
    */
    public static function takePublished($n)
    {
        return Article::orderBy('created_at', 'desc')->where('state', self::PUBLISHED)->take($n)->get();
    }

    /**
    * published
    * This function is used in order to get all the articles published paginated. 
    * @return {Article}
    */
    public static function published($n)
    {
        return Article::orderBy('created_at', 'desc')->where('state', self::PUBLISHED)->paginate($n);
    }

     /**
    * allPublished
    * This function is used in order to get all the articles published. 
    * @return {Article}
    */
    public static function allPublished()
    {
        return Article::orderBy('created_at', 'desc')->where('state', self::PUBLISHED)->get();
    }


    /**
    * isPublished
    * This function is used to know if an article is published. 
    * @return boolean
    */
    public function isPublished()
    {
        if ($this->state == self::PUBLISHED)
        {
            return true;
        }

        return false;
    }

     /**
    * isDraft
    * This function is used to know if an article is draft. 
    * @return boolean
    */
    public function isDraft()
    {
        if ($this->state == self::DRAFT)
        {
            return true;
        }
        
        return false;
    }

}
