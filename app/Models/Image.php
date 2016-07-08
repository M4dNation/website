<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'image';
    protected $guarded = array();

    public $timestamps = true;

    public static function byName($name)
    {
    	return Image::orderBy('created_at', 'desc')->where('name', $name)->first(); 
    }
}