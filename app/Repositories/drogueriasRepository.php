<?php

namespace App\Repositories;

use App\Models\droguerias;
use App\Repositories\BaseRepository;

/**
 * Class drogueriasRepository
 * @package App\Repositories
 * @version April 9, 2024, 5:38 pm UTC
*/

class drogueriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'DrTipoDrogueria',
        'DrCodigo',
        'DrNombre',
        'DrTipoIdentificacion',
        'DrIdentificacion',
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
        return droguerias::class;
    }
}
