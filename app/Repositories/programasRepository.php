<?php

namespace App\Repositories;

use App\Models\programas;
use App\Repositories\BaseRepository;

/**
 * Class programasRepository
 * @package App\Repositories
 * @version May 22, 2024, 5:55 am UTC
*/

class programasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'PrNombre'
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
        return programas::class;
    }
}
