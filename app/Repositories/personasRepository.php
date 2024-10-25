<?php

namespace App\Repositories;

use App\Models\personas;
use App\Repositories\BaseRepository;

/**
 * Class personasRepository
 * @package App\Repositories
 * @version May 21, 2024, 6:23 am UTC
*/

class personasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
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
