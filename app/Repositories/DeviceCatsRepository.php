<?php

namespace App\Repositories;

use App\Models\DeviceCats;
use InfyOm\Generator\Common\BaseRepository;

class DeviceCatsRepository extends BaseRepository
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
        return DeviceCats::class;
    }
}
