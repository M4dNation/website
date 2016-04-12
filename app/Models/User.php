<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'image_id', 
        'username', 
        'email', 
        'password', 
        'quote', 
        'm4dnation_role',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = 
    [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
      $this->attributes['password'] = bcrypt($password);
    }
}
