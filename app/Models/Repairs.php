<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Repairs
 * @package App\Models
 * @version May 24, 2017, 2:52 pm UTC
 */
class Repairs extends Model
{
    use SoftDeletes;

    public $table = 'repairs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_device',
        'id_reporter',
        'date_report',
        'id_repairer',
        'date_repair',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_device' => 'integer',
        'id_reporter' => 'integer',
        'date_report' => 'string',
        'id_repairer' => 'integer',
        'date_repair' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

     public function device(){
        return $this->belongsTo(\App\Models\Devices::class, 'id_device', 'id');
    }

    public function reporter(){
        return $this->belongsTo(\App\User::class, 'id_reporter', 'id');
    }

    public function repairer(){
        return $this->belongsTo(\App\User::class, 'id_repairer', 'id');
    }
}
