<?php

namespace App\Http\Controllers;

use App\Models\RapDesgloseHoras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RapDesgloseHorasController extends Controller
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

    public function addDesgloseHoras(Request $datos)
    {
        DB::insert('insert into rap_desglose_horas
        (horas_teoricas, horas_practicas, total_horas, cantidad_horas_aula, cantidad_horas_externas, 
        cantidad_horas_taller, porcentaje_horas_tecnologia, rap_id) 
        values (?, ?, ?, ?, ?, ?, ?, ?)', 
        [$datos->horas_teoricas, $datos->horas_practicas, $datos->total_horas, $datos->cantidad_horas_aula,
         $datos->cantidad_horas_externas, $datos->cantidad_horas_taller, $datos->porcentaje_horas_tecnologia, $datos->rap_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deleteDesgloseHoras(Request $datos)
    {        
        RapDesgloseHoras::destroy($datos->id);
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
     * @param  \App\Models\RapDesgloseHoras  $RapDesgloseHoras
     * @return \Illuminate\Http\Response
     */
    public function show(RapDesgloseHoras $RapDesgloseHoras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RapDesgloseHoras  $RapDesgloseHoras
     * @return \Illuminate\Http\Response
     */
    public function edit(RapDesgloseHoras $RapDesgloseHoras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RapDesgloseHoras  $RapDesgloseHoras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RapDesgloseHoras $RapDesgloseHoras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RapDesgloseHoras  $RapDesgloseHoras
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RapDesgloseHoras::destroy($id);
        return Redirect::back()->with('mensaje','Desglose de Horas eliminado con exito!');
    }
}
