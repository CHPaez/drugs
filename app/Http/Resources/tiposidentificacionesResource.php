<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class tiposidentificacionesResource extends JsonResource
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
            'Tiid' => $this->Tiid,
            'TiNombre' => $this->TiNombre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
