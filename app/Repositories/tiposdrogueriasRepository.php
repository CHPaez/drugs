<?php

namespace App\Repositories;

use App\Models\tiposdroguerias;
use App\Repositories\BaseRepository;

/**
 * Class tiposdrogueriasRepository
 * @package App\Repositories
 * @version April 9, 2024, 5:13 pm UTC
*/

class tiposdrogueriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'TdNombre'
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
        return tiposdroguerias::class;
    }
}
