<?php

namespace App\Http\Controllers;

use App\Models\Raa_pap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RaaPapController extends Controller
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

    public function addRaaPap(Request $datos)
    {
        DB::insert('insert into raa_paps (alumno_particular, deficiencia_particular, accion_particular, raa_id) 
        values (?, ?, ?, ?)', [$datos->alumno_particular, $datos->deficiencia_particular, $datos->accion_particular, $datos->raa_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    
    public function deleteRaaPap(Request $datos)
    {
        // var_dump($datos->id);
        
        Raa_pap::destroy($datos->id);
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
     * @param  \App\Models\Raa_pap  $raa_pap
     * @return \Illuminate\Http\Response
     */
    public function show(Raa_pap $raa_pap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raa_pap  $raa_pap
     * @return \Illuminate\Http\Response
     */
    public function edit(Raa_pap $raa_pap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raa_pap  $raa_pap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raa_pap $raa_pap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raa_pap  $raa_pap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Raa_pap::destroy($id);
        return Redirect::back()->with('mensaje','Plan de Acción Particular borrado con exito!');
    }
}
