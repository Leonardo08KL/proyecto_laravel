<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VentaDetalleResource extends JsonResource
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
            'DetalleVentaID' => $this->DetalleVentaID,
            'Fecha' => $this->Fecha,
            'Descripcion' => $this->Descripcion,
            'Cantidad' => $this->Cantidad,
            'Precio' => $this->Precio,
            'EmpleadoID' => $this->EmpleadoID,
            'ProductoID' => $this->ProductoID,
            'imagen' => $this->producto->imagen
        ];
    }
}
