<?php

namespace App\Repositories;

use App\Models\DeviceStatuses;
use InfyOm\Generator\Common\BaseRepository;

class DeviceStatusesRepository extends BaseRepository
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
        return DeviceStatuses::class;
    }
}
