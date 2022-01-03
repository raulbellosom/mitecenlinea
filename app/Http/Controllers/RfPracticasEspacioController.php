<?php

namespace App\Http\Controllers;

use App\Models\RfPracticasEspacio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RfPracticasEspacioController extends Controller
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

    public function addPracticasEspacio(Request $datosParteDos)
    {
        DB::insert('insert into rf_practicas_espacios 
        (espacios_aulas, espacios_talleres, espacios_laboratorios, no_practicas_programadas, porcentaje_practicas, 
        nombre_practicas, e_canon_por_uso, e_canon_tipo, e_pc_por_uso, e_pc_tipo, e_rotafolio_por_uso, e_rotafolio_tipo, e_tv_por_uso, e_tv_tipo,
        e_dvd_por_uso, e_dvd_tipo, e_otro, e_otro_por_uso, e_otro_tipo,
        rf_id) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )', 
        [$datosParteDos->espacios_aulas, $datosParteDos->espacios_talleres, $datosParteDos->espacios_laboratorios, $datosParteDos->no_practicas_programadas, 
        $datosParteDos->porcentaje_practicas, $datosParteDos->nombre_practicas, $datosParteDos->e_canon_por_uso, $datosParteDos->e_canon_tipo, $datosParteDos->e_pc_por_uso, 
        $datosParteDos->e_pc_tipo, $datosParteDos->e_rotafolio_por_uso, $datosParteDos->e_rotafolio_tipo, $datosParteDos->e_tv_por_uso, $datosParteDos->e_tv_tipo, 
        $datosParteDos->e_dvd_por_uso, $datosParteDos->e_dvd_tipo, $datosParteDos->e_otro, $datosParteDos->e_otro_por_uso, $datosParteDos->e_otro_tipo,
        $datosParteDos->rf_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deletePracticasEspacio(Request $datosParteDos)
    {
        // var_dump($datosParteDos->id);
        
        RfPracticasEspacio::destroy($datosParteDos->id);
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
     * @param  \App\Models\RfPracticasEspacio  $rfPracticasEspacio
     * @return \Illuminate\Http\Response
     */
    public function show(RfPracticasEspacio $rfPracticasEspacio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RfPracticasEspacio  $rfPracticasEspacio
     * @return \Illuminate\Http\Response
     */
    public function edit(RfPracticasEspacio $rfPracticasEspacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RfPracticasEspacio  $rfPracticasEspacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RfPracticasEspacio $rfPracticasEspacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RfPracticasEspacio  $rfPracticasEspacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(RfPracticasEspacio $rfPracticasEspacio)
    {
        //
    }
}
