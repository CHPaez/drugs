<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class inscritosResource extends JsonResource
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
            'InTipificacion' => $this->InTipificacion,
            'InPersonaInscrita' => $this->InPersonaInscrita,
            'InFechaPrograma' => $this->InFechaPrograma,
            'InHorario' => $this->InHorario,
            'InModalidad' => $this->InModalidad,
            'InCiudad' => $this->InCiudad,
            'InDatosAdicionales' => $this->InDatosAdicionales,
            'InObservaciones' => $this->InObservaciones,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
