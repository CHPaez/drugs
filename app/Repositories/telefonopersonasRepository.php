<?php

namespace App\Repositories;

use App\Models\telefonopersonas;
use App\Repositories\BaseRepository;

/**
 * Class telefonopersonasRepository
 * @package App\Repositories
 * @version April 4, 2024, 1:59 am UTC
*/

class telefonopersonasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'TePersona',
        'TeTipo',
        'TeIndicativo',
        'TeTelefono'
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
        return telefonopersonas::class;
    }
}
