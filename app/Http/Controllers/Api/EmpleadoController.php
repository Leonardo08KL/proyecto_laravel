<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Http\Resources\EmpleadoResource;


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
        $validatedData = $request->validate([
            'Nombre' => 'required|max:100',
            'Apellido' => 'required|max:100',
            'Posicion' => 'required|max:100',
            'FechaContratacion' => 'required|date'
        ]);

        $modeloempleado = Empleado::create($validatedData);
        return new EmpleadoResource($modeloempleado);
    }

    // Método para obtener todos los empleados
    public function index()
    {
        $empleados = Empleado::all();
        return EmpleadoResource::collection($empleados);
    }
    /**
     * Display the specified resource.
     */
    public function show($EmpleadoID)
    {
        //
        $empleado = Empleado::find($EmpleadoID);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
    
        // Si el empleado existe, devuelve los datos utilizando el EmpleadoResource.
        return new EmpleadoResource($empleado);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $EmpleadoID)
    {
        $empleado = Empleado::find($EmpleadoID);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'Nombre' => 'required|max:100',
            'Apellido' => 'required|max:100',
            'Posicion' => 'required|max:100',
            'FechaContratacion' => 'required|date'
        ]);

        $empleado->update($validatedData);
        return new EmpleadoResource($empleado);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($EmpleadoID)
    {
        $empleado = Empleado::find($EmpleadoID);
        if (!$empleado) {
            return new EmpleadoResource(['message' => 'Empleado no encontrado'], 404);
        }

        $empleado->delete();
        return new EmpleadoResource($empleado);
    }
}