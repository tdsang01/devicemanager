<?php

namespace App\Repositories;

use App\Models\Classrooms;
use InfyOm\Generator\Common\BaseRepository;

class ClassroomsRepository extends BaseRepository
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
        return Classrooms::class;
    }
}
