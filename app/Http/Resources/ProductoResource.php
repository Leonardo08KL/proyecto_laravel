<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
        'ProductoID' => $this->ProductoID,
        'Nombre' => $this->Nombre,
            'Descripcion' => $this->Descripcion,
            'Precio' => $this->Precio,
            'Stock' => $this->Stock,
            'imagen' => $this->imagen
    ];
    }
}
