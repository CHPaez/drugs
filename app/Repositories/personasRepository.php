<?php

namespace App\Repositories;

use App\Models\personas;
use App\Repositories\BaseRepository;

/**
 * Class personasRepository
 * @package App\Repositories
 * @version March 27, 2024, 6:52 pm UTC
*/

class personasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'PeTipoAsociado',
        'PeTipoIdentificacion',
        'PeNumeroIdentificacion',
        'PeGenero',
        'PeNombre',
        'PeApellido',
        'PeCorreo'
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
        return personas::class;
    }
}
