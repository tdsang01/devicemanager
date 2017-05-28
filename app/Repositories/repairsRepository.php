<?php

namespace App\Repositories;

use App\Models\Repairs;
use InfyOm\Generator\Common\BaseRepository;

class RepairsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_device',
        'id_reporter',
        'date_report',
        'id_repairer',
        'date_repair',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Repairs::class;
    }
}
