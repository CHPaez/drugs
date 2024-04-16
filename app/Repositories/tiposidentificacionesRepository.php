<?php

namespace App\Repositories;

use App\Models\tiposidentificaciones;
use App\Repositories\BaseRepository;

/**
 * Class tiposidentificacionesRepository
 * @package App\Repositories
 * @version March 27, 2024, 4:28 am UTC
*/

class tiposidentificacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Tiid',
        'TiNombre'
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
        return tiposidentificaciones::class;
    }
}
