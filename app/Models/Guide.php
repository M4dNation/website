<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
	use SoftDeletes;
    protected $table = 'guide';

    public $timestamps = false;
}