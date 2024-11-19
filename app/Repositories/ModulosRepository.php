<?php

namespace App\Repositories;

use App\Models\Administracion\Modulos;
use App\Repositories\BaseRepository;

/**
 * Class asociadosRepository
 * @package App\Repositories
 * @version March 28, 2024, 12:20 am UTC
*/

class ModulosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'MoNombre'
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
        return Modulos::class;
    }
}
