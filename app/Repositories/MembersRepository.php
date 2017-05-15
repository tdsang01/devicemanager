<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

class MembersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
