<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Http\Resources\VentaResource;

class VentaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Fecha' => 'required',
            'Total' => 'required'
        ]);

        $venta = Venta::create($validatedData);

        return new VentaResource($venta);
    }

    // Método para obtener todos los empleados
    public function index()
    {
        $venta = Venta::all();
        return VentaResource::collection($venta);
    }
    /**
     * Display the specified resource.
     */
    public function show($VentaID)
    {
        //
        $venta = Venta::find($VentaID);
        if (!$venta){
            return response()->json(['message' => 'Venta no encontrado'], 404);
        }

        return new VentaResource($venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $VentaID)
    {
        $venta = Venta::find($VentaID);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'Fecha' => 'required',
            'Total' => 'required'
        ]);

        $venta->update($validatedData);
        return new VentaResource($venta);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($VentaID)
    {
        $venta = Venta::find($VentaID);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrado'], 404);
        }

        $venta->delete();
        return new VentaResource($venta);
    }
}
