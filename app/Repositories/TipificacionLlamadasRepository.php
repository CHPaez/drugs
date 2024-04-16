<?php

namespace App\Repositories;

use App\Models\tipificacionllamadas;
use App\Repositories\BaseRepository;

/**
 * Class tipificacionllamadasRepository
 * @package App\Repositories
 * @version April 4, 2024, 9:04 pm UTC
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
        'TlPersona'
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
