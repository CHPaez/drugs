<?php

namespace App\Repositories;

use App\Models\horarios;
use App\Repositories\BaseRepository;

/**
 * Class horariosRepository
 * @package App\Repositories
 * @version May 22, 2024, 7:05 am UTC
*/

class horariosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Id',
        'HoNombre'
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
        return horarios::class;
    }
}
