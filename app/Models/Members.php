<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Members
 * @package App\Models
 * @version May 5, 2017, 5:20 pm UTC
 */
class Members extends Model
{

    public $table = 'members';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'phone' => 'integer',
        'role' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function roles(){
        return $this->belongsTo(\App\Models\Roles::class, 'role');
    }
}
