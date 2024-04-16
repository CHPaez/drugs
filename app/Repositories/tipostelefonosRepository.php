<?php

namespace App\Repositories;

use App\Models\tipostelefonos;
use App\Repositories\BaseRepository;

/**
 * Class tipostelefonosRepository
 * @package App\Repositories
 * @version April 4, 2024, 1:52 am UTC
*/

class tipostelefonosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'TtTipo'
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
        return tipostelefonos::class;
    }
}
