<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VentaResource extends JsonResource
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
            'VentaID' => $this->VentaID,
            'Fecha' => $this->Fecha,
            'Total' => $this->Total,
            'imagen' => $this->imagen
        ];
    }
}
