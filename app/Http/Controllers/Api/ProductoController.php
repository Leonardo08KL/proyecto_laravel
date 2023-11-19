<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::all();
        return response()->json($producto);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'Nombre' =>'required',
            'Descripcion' =>'required',
            'Precio' =>'required',
            'Stock' =>'required'
        ]);

        $producto = Producto::create($validateData);

        return response()->json($producto, 201);
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
    public function update(Request $request, $ProductoID)
    {
        $producto = Producto::find($ProductoID);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'Nombre' =>'required',
            'Descripcion' =>'required',
            'Precio' =>'required',
            'Stock' =>'required'
        ]);

        $producto->update($validatedData);
        return response()->json($producto, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ProductoID)
    {
        $producto = Producto::find($ProductoID);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return response()->json(['message' => 'Producto eliminado con éxito'], 200);
    }
}
