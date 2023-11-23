<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProveedorResource extends JsonResource
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
            'ProveedorID' => $this->ProveedorID,
            'Nombre' => $this->Nombre,
            'Contacto' => $this->Contacto,
            'Telefono' => $this->Telefono,
            'Direccion' => $this->Direccion,
        ];
    }
}
