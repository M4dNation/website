<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    public function parent()
    {
        return Category::where('id', $this->parent_id)->firstOrFail();
    }

    public function children()
    {
        return Category::where('parent_id', $this->id)->get();
    }

    public function threads()
    {
        return $this->hasMany('App\Models\Thread');
    }

    public function lastThread()
    {
        return $this->hasOne('App\Models\Thread')->latest();
    }

    public function firstThread()
    {
        return $this->hasOne('App\Models\Thread');
    }

    public function allWithLastThread()
    {
        return $this->with('lastThread')->get();
    }

    public function allWithFirstThread()
    {
        return $this->with('firstThread')->get();
    }
}
