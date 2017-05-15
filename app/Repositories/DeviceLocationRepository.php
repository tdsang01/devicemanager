<?php

namespace App\Repositories;

use App\Models\DeviceLocation;
use InfyOm\Generator\Common\BaseRepository;

class DeviceLocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DeviceLocation::class;
    }
}
