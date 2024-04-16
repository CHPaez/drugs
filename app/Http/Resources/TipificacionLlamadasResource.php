<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class tipificacionllamadasResource extends JsonResource
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
            'TlUser' => $this->TlUser,
            'TlCodigoAsociado' => $this->TlCodigoAsociado,
            'TlDrogueria' => $this->TlDrogueria,
            'TlPersona' => $this->TlPersona,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
