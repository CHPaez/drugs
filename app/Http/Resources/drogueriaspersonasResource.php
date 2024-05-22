<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class drogueriaspersonasResource extends JsonResource
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
            'DpAsociado' => $this->DpAsociado,
            'DpDrogueria' => $this->DpDrogueria,
            'DpPersona' => $this->DpPersona,
            'DpEstadoPersona' => $this->DpEstadoPersona,
            'DpTipoAsociado' => $this->DpTipoAsociado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
