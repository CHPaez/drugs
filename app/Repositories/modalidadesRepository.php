<?php

namespace App\Repositories;

use App\Models\modalidades;
use App\Repositories\BaseRepository;

/**
 * Class modalidadesRepository
 * @package App\Repositories
 * @version May 22, 2024, 7:07 am UTC
*/

class modalidadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
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
        return modalidades::class;
    }
}
