<?php

namespace App\Http\Controllers;

use App\Models\Rd_pap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RdPapController extends Controller
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

    public function addPap(Request $datos)
    {
        DB::insert('insert into rd_paps (alumno_particular, deficiencia_particular, accion_particular, r_diagnostico_id) 
        values (?, ?, ?, ?)', [$datos->alumno_particular, $datos->deficiencia_particular, $datos->accion_particular, $datos->r_diagnostico_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    
    public function deletePap(Request $datos)
    {
        // var_dump($datos->id);
        
        Rd_pap::destroy($datos->id);
        return response()->json(["exito" => "eliminado"]);
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
     * @param  \App\Models\Rd_pap  $rd_pap
     * @return \Illuminate\Http\Response
     */
    public function show(Rd_pap $rd_pap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rd_pap  $rd_pap
     * @return \Illuminate\Http\Response
     */
    public function edit(Rd_pap $rd_pap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rd_pap  $rd_pap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rd_pap $rd_pap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rd_pap  $rd_pap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rd_pap $rd_pap)
    {
        //
    }
}
