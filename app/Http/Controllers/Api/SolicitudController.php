<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudRequest;
use App\Http\Resources\SolicitudResource;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /*
        $modelSolicitud = new Solicitud();
        $modelSolicitud->titulo_corto = "Hola";
        $modelSolicitud->descripcion = "Descripcion";
        $modelSolicitud->save();
        */
        /*$modelSolicitud = Solicitud::find(1);
        $modelSolicitud->titulo_corto = "Nuevo valor titulo_corto";
        $modelSolicitud->descripcion = "Descripcion nueva";
        $modelSolicitud->save();*/
        $solicitudes = Solicitud::all();
        return  SolicitudResource::collection($solicitudes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SolicitudRequest $request)
    {

        $modeloSolicitud = Solicitud::create($request->all());
        return new SolicitudResource($modeloSolicitud);
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        return new SolicitudResource($solicitud);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SolicitudRequest $request, Solicitud $solicitud)
    {
        //$solicitud->titulo_corto =$request->get('titulo_corto');
        $solicitud->update($request->all()); //$solicitud->save();
        //print_r($request->all('titulo_corto'));
        return new SolicitudResource($solicitud);
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy($id)
    public function destroy(Solicitud $solicitud)
    {
        /**
         echo $id;
        $modeloSolicitud = Solicitud::find($id);
        $modeloSolicitud->delete();
         */
        $solicitudClone = clone $solicitud->getAttributes();
        $solicitud->delete();
        //return response($solicitud->getAttributes(), 200);
        return new SolicitudResource($solicitudClone);
    }
}
