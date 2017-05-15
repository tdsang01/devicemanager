<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DeviceCats
 * @package App\Models
 * @version May 5, 2017, 5:25 pm UTC
 */
class DeviceCats extends Model
{

    public $table = 'device_cats';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'quantity' => 'numeric|digits_between:1,4'
    ];

    
}
