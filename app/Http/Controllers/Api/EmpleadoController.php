<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Store a newly created resource in storage.
     */
     // Método para insertar un nuevo empleado
     public function store(Request $request)
     {
         $request->validate([
             'Nombre' => 'required|max:100',
             'Apellido' => 'required|max:100',
             'Posicion' => 'required|max:100',
             'FechaContratacion' => 'required|date'
         ]);
 
         $empleado = Empleado::create($request->all());
 
         return response()->json($empleado, 201);
     }
 
     // Método para obtener todos los empleados
     public function index()
     {
         $empleados = Empleado::all();
         return response()->json($empleados);
     }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
