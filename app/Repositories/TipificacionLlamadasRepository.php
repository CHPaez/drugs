<?php

namespace App\Repositories;

use App\Models\tipificacionllamadas;
use App\Repositories\BaseRepository;

/**
 * Class tipificacionllamadasRepository
 * @package App\Repositories
 * @version May 23, 2024, 7:41 am UTC
*/

class tipificacionllamadasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'TlUser',
        'TlCodigoAsociado',
        'TlDrogueria',
        'TlPersonaContacto',
        'TlTelefonoContacto',
        'TlTelefonoWhatsapp',
        'TlPrograma',
        'TlCausal',
        'TlEstadoTipificacion',
        'TIObservaciones'
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
        return tipificacionllamadas::class;
    }
}
