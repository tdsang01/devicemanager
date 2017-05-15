<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Histories
 * @package App\Models
 * @version May 5, 2017, 5:51 pm UTC
 */
class Histories extends Model
{

    public $table = 'histories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_device',
        'id_borrower',
        'date',
        'id_periodstart',
        'id_periodend',
        'id_lender'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_device' => 'integer',
        'id_borrower' => 'integer',
        'date' => 'string',
        'id_periodstart' => 'integer',
        'id_periodend' => 'integer',
        'id_lender' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    	'id_device' => 'required|exists:devices,id',
    ];

    public function device(){
        return $this->belongsTo(\App\Models\Devices::class, 'id_device', 'id');
    }

    public function borrower(){
        return $this->belongsTo(\App\User::class, 'id_borrower', 'id');
    }

    public function lender(){
        return $this->belongsTo(\App\User::class, 'id_lender', 'id');
    }

    public function periodofclassstart(){
        return $this->belongsTo(\App\Models\PeriodOfClasses::class, 'id_periodstart', 'id');
    }

    public function periodofclassend(){
        return $this->belongsTo(\App\Models\PeriodOfClasses::class, 'id_periodend', 'id');
    }
}
