<?php

namespace App\Http\Controllers;

use App\Models\RapPracticaPlaneada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RapPracticaPlaneadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function addPracticasPlaneadas(Request $datos)
    {
        DB::insert('insert into rap_practica_planeadas
        (practicas_planeadas, practicas_realizadas, nombre_practicas, observaciones,
        practicas_no_planeadas, nombre_no_planeadas, talleres, diferencias, rap_id) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [$datos->practicas_planeadas, $datos->practicas_realizadas, $datos->nombre_practicas, $datos->observaciones,
        $datos->practicas_no_planeadas, $datos->nombre_no_planeadas, $datos->talleres, $datos->diferencias, 
        $datos->rap_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deletePracticasPlaneadas(Request $datos)
    {        
        RapPracticaPlaneada::destroy($datos->id);
        return response()->json(["exito" => "eliminado"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RapPracticaPlaneada  $rapPracticaPlaneada
     * @return \Illuminate\Http\Response
     */
    public function show(RapPracticaPlaneada $rapPracticaPlaneada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RapPracticaPlaneada  $rapPracticaPlaneada
     * @return \Illuminate\Http\Response
     */
    public function edit(RapPracticaPlaneada $rapPracticaPlaneada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RapPracticaPlaneada  $rapPracticaPlaneada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RapPracticaPlaneada $rapPracticaPlaneada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RapPracticaPlaneada  $rapPracticaPlaneada
     * @return \Illuminate\Http\Response
     */
    public function destroy(RapPracticaPlaneada $rapPracticaPlaneada)
    {
        //
    }
}
