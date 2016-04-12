<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $table = 'article_image';

    /**
    * image
    * This function is used in order to get the related image. 
    * @return {Image}
    */
   
    public function image()
    {
    	return $this->hasOne('App\Models\Image');
    }

    /**
    * article
    * This function is used in order the related article. 
    * @return {Article}
    */
   
    public function article()
    {
    	return $this->hasOne('App\Models\Article');
    }
}
