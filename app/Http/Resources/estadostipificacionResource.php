<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class estadostipificacionResource extends JsonResource
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
            'EtNombre' => $this->EtNombre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
