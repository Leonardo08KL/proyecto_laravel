<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = "solicitudes";
    protected $fillable = [
        'titulo_corto',
        'descripcion',
        'estado_solicitud_id'
    ];
    public function estadoSolicitud()
    {
        return $this->hasOne(EstadoSolicitud::class, 'id', 'estado_solicitud_id');
    }
}
