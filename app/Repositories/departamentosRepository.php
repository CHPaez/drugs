<?php

namespace App\Repositories;

use App\Models\departamentos;
use App\Repositories\BaseRepository;

/**
 * Class departamentosRepository
 * @package App\Repositories
 * @version April 3, 2024, 5:27 am UTC
*/

class departamentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'DepPais',
        'DepDepartamento'
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
        return departamentos::class;
    }
}
