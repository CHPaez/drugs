<?php

namespace App\Http\Requests\API;

use App\Models\droguerias_personas;
use InfyOm\Generator\Request\APIRequest;

class Updatedroguerias_personasAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = droguerias_personas::$rules;
        
        return $rules;
    }
}
