<?php

namespace App\Repositories;

use App\Models\indicativosciudades;
use App\Repositories\BaseRepository;

/**
 * Class indicativosciudadesRepository
 * @package App\Repositories
 * @version April 4, 2024, 1:49 am UTC
*/

class indicativosciudadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'IcCiudad',
        'IcIndicativo'
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
        return indicativosciudades::class;
    }
}
