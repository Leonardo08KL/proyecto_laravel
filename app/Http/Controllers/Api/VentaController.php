<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Fecha' => 'required',
            'Total' => 'required'
        ]);

        $venta = Venta::create($validatedData);

        return response()->json($venta, 201);
    }

    // Método para obtener todos los empleados
    public function index()
    {
        $venta = Venta::all();
        return response()->json($venta);
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
        return response()->json($venta, 200);
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
        return response()->json(['message' => 'Venta eliminado con éxito'], 200);
    }
}
