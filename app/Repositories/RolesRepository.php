<?php

namespace App\Repositories;

use App\Models\Administracion\Roles;
use App\Repositories\BaseRepository;

/**
 * Class asociadosRepository
 * @package App\Repositories
 * @version March 28, 2024, 12:20 am UTC
*/

class RolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'Name'
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
        return Roles::class;
    }

    public function fill(Array $input){
        Roles::insert($input);
    }
}
