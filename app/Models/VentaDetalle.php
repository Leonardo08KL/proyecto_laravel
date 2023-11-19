<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    use HasFactory;
    protected $table = 'venta_detalle';
    protected $primaryKey = 'DetalleVentaID';

    protected $fillable = [
        'Cantidad',
        'PrecioUnitario'
    ];
}
