<?php

namespace App\Repositories;

use App\Models\estadospersonas;
use App\Repositories\BaseRepository;

/**
 * Class estadospersonasRepository
 * @package App\Repositories
 * @version April 2, 2024, 7:15 pm UTC
*/

class estadospersonasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'EsEstado'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return estadospersonas::class;
    }
}
