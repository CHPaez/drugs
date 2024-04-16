<?php

namespace App\Repositories;

use App\Models\paises;
use App\Repositories\BaseRepository;

/**
 * Class paisesRepository
 * @package App\Repositories
 * @version April 3, 2024, 1:26 am UTC
*/

class paisesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'PaNombre'
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
        return paises::class;
    }
}
