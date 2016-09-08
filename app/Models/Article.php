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
    * byNumberLabelLocal
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
    public function byNumberLabel($numberLabel)
    {
        return Article::where('number_label', $numberLabel)->get();
    }


    /**
    * byNumberLabelLocal
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
    public function byNumberLabelLocal($numberLabel, $lang)
    {
        return Article::where('number_label', $numberLabel)->where('lang', $lang)->first();
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
    * takePublished
    * This function is used in order to get the n latest article published. 
    * @return {Article}
    */
    public static function takePublishedLocal($n, $lang)
    {
        return Article::orderBy('created_at', 'desc')->where('state', self::PUBLISHED)->where('lang', $lang)->take($n)->get();
    }

    /**
    * published
    * This function is used in order to get all the articles published paginated. 
    * @return {Article}
    */
    public static function published($n)
    {
        return (Article::orderBy('created_at', 'desc')->where('state', self::PUBLISHED)->paginate($n));
    }

     /**
    * publishedLocal
    * This function is used in order to get all the articles published of your current language paginated. 
    * @return {Article}
    */
    public static function publishedLocal($n, $lang)
    {
        return (Article::orderBy('created_at', 'desc')->where('state', self::PUBLISHED)->where('lang', $lang)->paginate($n));
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
    * allPublished
    * This function is used in order to get all the articles published in your current language. 
    * @return {Article}
    */
    public static function allPublishedLocal($lang)
    {
        return Article::orderBy('created_at', 'desc')->where('state', self::PUBLISHED)->where('lang', $lang)->get();
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
    * lastArticleNumber
    * This function is used to know the last article number. 
    * @return boolean
    */
    public function lastNumberLabel()
    {
        return Article::max('number_label');        
    } 

    /**
    * previousArticleLocal
    * This function is used to know the last article number. 
    * @return boolean
    */
    public function previousArticleLocal($numberLabel, $lang)
    {
        return Article::orderBy('number_label', 'desc')->where('number_label','<', $numberLabel)->where('lang', $lang)->first();       
    } 

      /**
    * nextArticleLocal
    * This function is used to know the last article number. 
    * @return boolean
    */
    public function nextArticleLocal($numberLabel, $lang)
    {
        return Article::orderBy('number_label', 'desc')->where('number_label','>', $numberLabel)->where('lang', $lang)->first();          
    } 

    /**
    * publish
    * This function is used to know the last article number. 
    * @return boolean
    */
    public function publish($numberLabel)
    {
        return Article::where('number_label', $numberLabel)->update(['state' => '1']);
    } 

    /**
    * publish
    * This function is used to know the last article number. 
    * @return boolean
    */
    public function draft($numberLabel)
    {
        return Article::where('number_label', $numberLabel)->update(['state' => '0']);
    } 


}
