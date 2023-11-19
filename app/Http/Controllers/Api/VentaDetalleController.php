<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VentaDetalle;

class VentaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    // Método para insertar un nuevo ventadetalle
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Cantidad' => 'required',
            'PrecioUnitario' => 'required',
        ]);

        $ventadetalle = VentaDetalle::create($validatedData);

        return response()->json($ventadetalle, 201);
    }

    // Método para obtener todos los ventadetalles
    public function index()
    {
        $ventadetalles = VentaDetalle::all();
        return response()->json($ventadetalles);
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
    public function update(Request $request, $DetalleVentaID)
    {
        $ventadetalle = VentaDetalle::find($DetalleVentaID);
        if (!$ventadetalle) {
            return response()->json(['message' => 'ventadetalle no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'Cantidad' => 'required',
            'PrecioUnitario' => 'required',
        ]);

        $ventadetalle->update($validatedData);
        return response()->json($ventadetalle, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($DetalleVentaID)
    {
        $ventadetalle = VentaDetalle::find($DetalleVentaID);
        if (!$ventadetalle) {
            return response()->json(['message' => 'ventadetalle no encontrado'], 404);
        }

        $ventadetalle->delete();
        return response()->json(['message' => 'ventadetalle eliminado con éxito'], 200);
    }
}
