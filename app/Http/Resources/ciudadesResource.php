<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ciudadesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Id' => $this->Id,
            'CiuDepartamento' => $this->CiuDepartamento,
            'CiuCiudad' => $this->CiuCiudad,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
