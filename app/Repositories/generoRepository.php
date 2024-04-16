<?php

namespace App\Repositories;

use App\Models\genero;
use App\Repositories\BaseRepository;

/**
 * Class generoRepository
 * @package App\Repositories
 * @version March 27, 2024, 5:13 pm UTC
*/

class generoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'GeNombre'
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
        return genero::class;
    }
}
