<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class drogueriasResource extends JsonResource
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
            'DrTipoDrogueria' => $this->DrTipoDrogueria,
            'DrCodigo' => $this->DrCodigo,
            'DrNombre' => $this->DrNombre,
            'DrTipoIdentificacion' => $this->DrTipoIdentificacion,
            'DrIdentificacion' => $this->DrIdentificacion,
            'DrCiudad' => $this->DrCiudad,
            'DrDireccion' => $this->DrDireccion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
