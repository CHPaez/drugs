<?php

namespace App\Repositories;

use App\Models\datosadicionales;
use App\Repositories\BaseRepository;

/**
 * Class datosadicionalesRepository
 * @package App\Repositories
 * @version May 22, 2024, 7:09 am UTC
*/

class datosadicionalesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'DaNombre'
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
        return datosadicionales::class;
    }
}
