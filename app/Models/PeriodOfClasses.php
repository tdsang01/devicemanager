<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PeriodOfClasses
 * @package App\Models
 * @version May 5, 2017, 5:32 pm UTC
 */
class PeriodOfClasses extends Model
{

    public $table = 'period_of_classes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'timestart',
        'timeend'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'timestart' => 'string',
        'timeend' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'name' => 'required',
        // 'timestart' => 'required',
        // 'timeend' => 'required'
    ];

    
}
