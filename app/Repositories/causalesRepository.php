<?php

namespace App\Repositories;

use App\Models\causales;
use App\Repositories\BaseRepository;

/**
 * Class causalesRepository
 * @package App\Repositories
 * @version May 22, 2024, 6:25 am UTC
*/

class causalesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'CaTipificacion',
        'CaNombre'
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
        return causales::class;
    }
}
