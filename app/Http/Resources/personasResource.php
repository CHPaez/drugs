<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class personasResource extends JsonResource
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
            'PeTipoAsociado' => $this->PeTipoAsociado,
            'PeTipoIdentificacion' => $this->PeTipoIdentificacion,
            'PeNumeroIdentificacion' => $this->PeNumeroIdentificacion,
            'PeGenero' => $this->PeGenero,
            'PeNombre' => $this->PeNombre,
            'PeApellido' => $this->PeApellido,
            'PeCorreo' => $this->PeCorreo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
