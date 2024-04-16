<?php

namespace App\Repositories;

use App\Models\drogueriaspersonas;
use App\Repositories\BaseRepository;

/**
 * Class drogueriaspersonasRepository
 * @package App\Repositories
 * @version April 9, 2024, 5:09 pm UTC
*/

class drogueriaspersonasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'DpAsociado',
        'DpDrogueria',
        'DpPersona'
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
        return drogueriaspersonas::class;
    }
}
