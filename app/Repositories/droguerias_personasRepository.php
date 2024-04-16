<?php

namespace App\Repositories;

use App\Models\droguerias_personas;
use App\Repositories\BaseRepository;

/**
 * Class droguerias_personasRepository
 * @package App\Repositories
 * @version April 2, 2024, 8:44 pm UTC
*/

class droguerias_personasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'DrAsociado',
        'DrPersona',
        'DrCodigo',
        'DrNombre',
        'DrTipoIdentificacion',
        'DrCiudad',
        'DrDireccion'
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
        return droguerias_personas::class;
    }
}
