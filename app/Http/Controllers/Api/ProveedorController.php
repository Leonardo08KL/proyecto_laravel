<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Resources\ProveedorResource;


class ProveedorController extends Controller
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
            'Contacto' => 'required|max:100',
            'Telefono' => 'required|max:100',
            'Direccion' => 'required|max:100'
        ]);

        $modeloproveedor = Proveedor::create($validatedData);
        return new ProveedorResource($modeloproveedor);
    }

    // Método para obtener todos los Proveedors
    public function index()
    {
        $proveedor = Proveedor::all();
        return ProveedorResource::collection($proveedor);
    }
    /**
     * Display the specified resource.
     */
    public function show($ProveedorID)
    {
        //
        $proveedor = Proveedor::find($ProveedorID);
        if (!$proveedor) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
    
        // Si el empleado existe, devuelve los datos utilizando el EmpleadoResource.
        return new ProveedorResource($proveedor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ProveedorID)
    {
        $proveedor = Proveedor::find($ProveedorID);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'Nombre' => 'required|max:100',
            'Contacto' => 'required|max:100',
            'Telefono' => 'required|max:100',
            'Direccion' => 'required|max:100'
        ]);

        $proveedor->update($validatedData);
        return new ProveedorResource($proveedor);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ProveedorID)
    {
        $proveedor = Proveedor::find($ProveedorID);
        if (!$proveedor) {
            return new ProveedorResource(['message' => 'Proveedor no encontrado'], 404);
        }

        $proveedor->delete();
        return new ProveedorResource($proveedor);
    }
}