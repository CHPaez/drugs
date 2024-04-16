<?php

namespace App\Repositories;

use App\Models\historialllamadas;
use App\Repositories\BaseRepository;

/**
 * Class historialllamadasRepository
 * @package App\Repositories
 * @version April 4, 2024, 1:23 am UTC
*/

class historialllamadasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'HlUsuario',
        'HlFechaRegistro'
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
        return historialllamadas::class;
    }
}
