<?php

namespace App\Repositories;

use App\Models\ciudades;
use App\Repositories\BaseRepository;

/**
 * Class ciudadesRepository
 * @package App\Repositories
 * @version April 3, 2024, 7:08 am UTC
*/

class ciudadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'CiuDepartamento',
        'CiuCiudad'
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
        return ciudades::class;
    }
}
