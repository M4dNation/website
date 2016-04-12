<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorial extends Model
{
	use SoftDeletes;
    protected $table = 'tutorial';

    public $timestamps = false;
}