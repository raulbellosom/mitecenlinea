<?php

namespace App\Http\Controllers;

use App\Models\RfCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RfCursoController extends Controller
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

    public function addCurso(Request $datos)
    {
        DB::insert('insert into rf_cursos 
        (no_unidades, porcentaje_cobertura_programa, causas, no_alu_lista, 
        no_alu_aprobados, no_alu_reprobados, no_alu_desercion, prom_general, caracteristicas_grupo, porcentaje_asistencia, 
        rf_id) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [$datos->no_unidades, $datos->porcentaje_cobertura_programa, $datos->causas, $datos->no_alu_lista, 
        $datos->no_alu_aprobados, $datos->no_alu_reprobados, $datos->no_alu_desercion, $datos->prom_general,
        $datos->caracteristicas_grupo, $datos->porcentaje_asistencia, $datos->rf_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deleteCurso(Request $datos)
    {
        // var_dump($datos->id);
        
        RfCurso::destroy($datos->id);
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
     * @param  \App\Models\RfCurso  $rfCurso
     * @return \Illuminate\Http\Response
     */
    public function show(RfCurso $rfCurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RfCurso  $rfCurso
     * @return \Illuminate\Http\Response
     */
    public function edit(RfCurso $rfCurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RfCurso  $rfCurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RfCurso $rfCurso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RfCurso  $rfCurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(RfCurso $rfCurso)
    {
        //
    }
}
