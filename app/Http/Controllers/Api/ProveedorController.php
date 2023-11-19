<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedor = Proveedor::all();
        return response()->json($proveedor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'Nombre' =>'required',
            'Contacto' =>'required',
            'Telefono' =>'required',
            'Direccion' =>'required'
        ]);

        $proveedor = Proveedor::create($validateData);

        return response()->json($proveedor, 201);
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
    public function update(Request $request, $ProveedorID)
    {
        $proveedor = Proveedor::find($ProveedorID);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'Nombre' =>'required',
            'Contacto' =>'required',
            'Telefono' =>'required',
            'Direccion' =>'required'
        ]);

        $proveedor->update($validatedData);
        return response()->json($proveedor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ProveedorID)
    {
        $proveedor = Proveedor::find($ProveedorID);
        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        $proveedor->delete();
        return response()->json(['message' => 'Proveedor eliminado con éxito'], 200);
    }
}
