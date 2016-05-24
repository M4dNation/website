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
        'username', 
        'email', 
        'password', 
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

    /**
     * setPasswordAttribute
     * @param [string] $password User's password
     * This function is used whenever the password attribute is set to bcrypt it.
     */
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
    * last
    * This function is used in order to get the latest User. 
    * @return {User}
    */
   
    public static function last()
    {
        return User::orderBy('created_at', 'desc')->first();
    }

    /**
    * take
    * This function is used in order to get the n latest User. 
    * @return {User}
    */
   
    public static function take($n)
    {
        return User::orderBy('created_at', 'desc')->take($n)->get();
    }
}
