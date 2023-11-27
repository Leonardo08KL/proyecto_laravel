<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Resources\ProductoResource;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Store a newly created resource in storage.
     */

    //Método para insertar un nuevo producto
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'Nombre' => 'required|max:100',
            'Descripcion' => 'required|max:100',
            'Precio' => 'required',
            'Stock' => 'required',
            'imagen' => 'required'
        ]);

        $modeloproducto = Producto::create($validateData);

        return new ProductoResource($modeloproducto);
    }

    //Método para obtener todos los productos
    public function index()
    {
        $productos = Producto::all();
        return ProductoResource::collection($productos);
    }

    /**
     * Display the specified resource.
     */
    public function show($ProductoID)
    {
        //
        $producto = Producto::find($ProductoID);
        if (!$producto){
            return response() ->json(['message' => 'Producto no encontrado']);
        }
        
        //Si el producto existe, devuelve los datos utilizando ProductoResource
        return new ProductoResource($producto);
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
            'Nombre' =>'required|max:100',
            'Descripcion' =>'required|max:100',
            'Precio' =>'required',
            'Stock' =>'required',
            'imagen' => 'required'

        ]);

        $producto->update($validatedData);
        return new ProductoResource($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ProductoID)
    {
        $producto = Producto::find($ProductoID);
        if (!$producto) {
            return new ProductoResource(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return new ProductoResource($producto);
    }
}
