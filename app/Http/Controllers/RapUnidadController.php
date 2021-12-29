<?php

namespace App\Http\Controllers;

use App\Models\Rap_unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RapUnidadController extends Controller
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
    
    public function addUnidad(Request $datos)
    {
        DB::insert('insert into rap_unidads 
        (no_unidad, nombre_unidad, porcentaje_avance, no_criterios, porcentaje_alumnos_aprobados, promedio_calificaciones, rap_id) 
        values (?, ?, ?, ?, ?, ?, ?)', [$datos->no_unidad, $datos->nombre_unidad, $datos->porcentaje_avance, $datos->no_criterios, $datos->porcentaje_alumnos_aprobados, $datos->promedio_calificaciones, $datos->rap_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deleteUnidad(Request $datos)
    {
        // var_dump($datos->id);
        
        Rap_unidad::destroy($datos->id);
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
     * @param  \App\Models\Rap_unidad  $rap_unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Rap_unidad $rap_unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rap_unidad  $rap_unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Rap_unidad $rap_unidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rap_unidad  $rap_unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rap_unidad $rap_unidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rap_unidad  $rap_unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rap_unidad $rap_unidad)
    {
        //
    }
}
