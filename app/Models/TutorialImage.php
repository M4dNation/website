<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialImage extends Model
{
    protected $table = 'tutorial_image';

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
    * tutorial
    * This function is used in order the related tutorial. 
    * @return {Tutorial}
    */
   
    public function Tutorial()
    {
    	return $this->hasOne('App\Models\Tutorial');
    }
}