<?php

namespace App\Repositories;

use App\Models\Histories;
use InfyOm\Generator\Common\BaseRepository;

class HistoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_device',
        'id_borrower',
        'date',
        'id_periodstart',
        'id_periodend',
        'id_lender'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Histories::class;
    }
}
