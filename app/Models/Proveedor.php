<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    
    use HasFactory;
    protected $table = 'proveedor';
    protected $primaryKey = 'ProveedorID';

    protected $fillable = [
        'Nombre',
        'Contacto',
        'Telefono',
        'Direccion'
    ];
}
