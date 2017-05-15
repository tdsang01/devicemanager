<?php

namespace App\Repositories;

use App\Models\PeriodOfClasses;
use InfyOm\Generator\Common\BaseRepository;

class PeriodOfClassesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'timestart',
        'timeend'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PeriodOfClasses::class;
    }
}
