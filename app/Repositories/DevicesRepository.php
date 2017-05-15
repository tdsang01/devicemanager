<?php

namespace App\Repositories;

use App\Models\Devices;
use InfyOm\Generator\Common\BaseRepository;

class DevicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'quantity',
        'id_classroom',
        'id_devicecat',
        'id_devicelocation'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Devices::class;
    }
}
