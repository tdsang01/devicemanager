<?php

namespace App\Repositories;

use App\Models\Roles;
use InfyOm\Generator\Common\BaseRepository;

class RolesRepository extends BaseRepository
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
        return Roles::class;
    }
}
