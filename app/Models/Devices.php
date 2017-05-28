<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Devices
 * @package App\Models
 * @version May 5, 2017, 5:30 pm UTC
 */
class Devices extends Model
{

    public $table = 'devices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'id_classroom',
        'id_devicecat',
        'id_devicelocation',
        'id_devicestatus',
        'date_entry',
        'date_using',
        'date_warranty'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'id_classroom' => 'integer',
        'id_devicecat' => 'integer',
        'id_devicelocation' => 'integer',
        'id_devicestatus' => 'integer',
        'date_entry' => 'string',
        'date_using' => 'string',
        'date_warranty' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function devicecat(){
        return $this->belongsTo(\App\Models\DeviceCats::class, 'id_devicecat','id');
    }

    public function devicelocation(){
        return $this->belongsTo(\App\Models\DeviceLocation::class, 'id_devicelocation','id');
    }

    public function classroom(){
        return $this->belongsTo(\App\Models\Classrooms::class, 'id_classroom','id');
    }

    public function devicestatus(){
        return $this->belongsTo(\App\Models\DeviceStatuses::class, 'id_devicestatus','id');
    }

    public static function changeStatus($id, $status){
        DB::table('devices')->where('id', $id)->update(['id_devicestatus' => $status]);
    }
}
