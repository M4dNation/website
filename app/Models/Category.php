<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'category';

    public $timestamps = false;

    /**
    * parent
    * This function is used in order to get the parent category, if any. 
    * @return {Category}
    */
   
    public function parent()
    {
        return Category::where('id', $this->parent_id)->first;
    }

    /**
    * children
    * This function is used in order to get children of current category.
    * @return {LaravelCollection => Category}
    */
   
    public function children()
    {
        return Category::where('parent_id', $this->id)->get();
    }

    /**
    * threads
    * This function is used in order to get all related threads.
    * @return {LaravelCollection => Thread}
    */
   
    public function threads()
    {
        return $this->hasMany('App\Models\Thread');
    }

    /**
    * lastThread
    * This function is used in order to get the last thread of this category.
    * @return {Thread}
    */
   
    public function lastThread()
    {
        return $this->hasOne('App\Models\Thread')->latest();
    }

    /**
    * firstThread
    * This function is used in order to get the first thread of this category.
    * @return {Thread}
    */
   
    public function firstThread()
    {
        return $this->hasOne('App\Models\Thread');
    }
}
