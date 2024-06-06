<?php

namespace App\Repositories;

use App\Models\inscritos;
use App\Repositories\BaseRepository;

/**
 * Class inscritosRepository
 * @package App\Repositories
 * @version May 22, 2024, 9:09 am UTC
*/

class inscritosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'InTipificacion',
        'InPersonaInscrita',
        'InFechaPrograma',
        'InHorario',
        'InModalidad',
        'InCiudad',
        'InDatosAdicionales',
        'InObservaciones'
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
        return inscritos::class;
    }
}
