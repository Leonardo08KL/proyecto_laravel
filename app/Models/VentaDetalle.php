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
        'Fecha',
        'Descripcion',
        'Cantidad',
        'Precio',
        'EmpleadoID',
        'ProductoID'
    ];

    public function Empleado(){
        return $this->hasOne(Empleado::class, 'EmpleadoID', 'EmpleadoID');
    }
    public function Producto(){
        return $this->hasOne(Producto::class, 'ProductoID', 'ProductoID');
    }
}