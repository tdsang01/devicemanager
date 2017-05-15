<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsTo(\App\Models\Roles::class, 'role', 'id');
    }
    public static $rulesCreate = [
    		'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',   
            'password' => 'required|min:6',
            'phone' => 'required|digits_between:10,15|numeric',
    ];
    public static $rulesUpdate = [
    		'name' => 'required|max:255',
            'email' => 'required|email|max:255',   
            'password' => 'required|min:6',
            'phone' => 'required|digits_between:10,15|numeric',
    ];
}
