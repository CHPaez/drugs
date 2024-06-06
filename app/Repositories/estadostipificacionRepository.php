<?php

namespace App\Repositories;

use App\Models\estadostipificacion;
use App\Repositories\BaseRepository;

/**
 * Class estadostipificacionRepository
 * @package App\Repositories
 * @version May 22, 2024, 6:03 am UTC
*/

class estadostipificacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'EtNombre'
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
        return estadostipificacion::class;
    }
}
