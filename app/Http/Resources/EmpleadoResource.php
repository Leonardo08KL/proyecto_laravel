<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpleadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
       return [
        'EmpleadoID' => $this->EmpleadoID,
        'Nombre' => $this->Nombre,
            'Apellido' => $this->Apellido,
            'Posicion' => $this->Posicion,
            'FechaContratacion' => $this->FechaContratacion
    ];
    }
}
