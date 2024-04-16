<?php

namespace App\Repositories;

use App\Models\tiposasociados;
use App\Repositories\BaseRepository;

/**
 * Class tiposasociadosRepository
 * @package App\Repositories
 * @version March 27, 2024, 4:23 am UTC
*/

class tiposasociadosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Taid',
        'TaNombre'
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
        return tiposasociados::class;
    }
}
