<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VentaDetalle;
use App\Http\Resources\VentaDetalleResource;

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
            'Fecha' => 'required',
            'Descripcion' => 'required',
            'Cantidad' => 'required',
            'Precio' => 'required',
            'EmpleadoID' => 'required',
            'ProductoID' => 'required'
        ]);

        $ventadetalle = VentaDetalle::create($validatedData);

        return new VentaDetalleResource($ventadetalle);
    }

    // Método para obtener todos los ventadetalles
    public function index()
    {
        $ventadetalles = VentaDetalle::all();
        return VentaDetalleResource::collection($ventadetalles);
    }
    /**
     * Display the specified resource.
     */
    public function show($DetalleVentaID)
    {
        $venta = VentaDetalle::find($DetalleVentaID);
        if (!$venta){
            return response()->json(['message' => 'Venta no encontrado'], 404);
        }

        return new VentaDetalleResource($venta);
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
            'Fecha' => 'required',
            'Descripcion' => 'required',
            'Cantidad' => 'required',
            'Precio' => 'required',
            'EmpleadoID' => 'required',
            'ProductoID' => 'required'
        ]);

        $ventadetalle->update($validatedData);
        return new VentaDetalleResource($ventadetalle);
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
        return new VentaDetalleResource($ventadetalle);
    }
}
