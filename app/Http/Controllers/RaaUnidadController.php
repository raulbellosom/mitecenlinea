<?php

namespace App\Http\Controllers;

use App\Models\Raa_unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RaaUnidadController extends Controller
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
        DB::insert('insert into raa_unidads 
        (no_unidad, no_alu_reprobados, porcentaje_reprobacion, promedio_grupal, porcentaje_asistencia, raa_id) 
        values (?, ?, ?, ?, ?, ?)', [$datos->no_unidad, $datos->no_alu_reprobados, $datos->porcentaje_reprobacion, $datos->promedio_grupal, $datos->porcentaje_asistencia, $datos->raa_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deleteUnidad(Request $datos)
    {
        // var_dump($datos->id);
        
        Raa_unidad::destroy($datos->id);
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
        $campos=[
            'raa_id'=>'required|int',
            'no_unidad'=>'required|string',
            'no_alu_reprobados'=>'required|string',
            'porcentaje_reprobacion'=>'required|string',
            'promedio_grupal'=>'required|string',
            'porcentaje_asistencia'=>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        Raa_unidad::insert($datosReporte);
        
        return Redirect::back()->with('mensaje','La Unidad fue agregada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Raa_unidad  $raa_unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Raa_unidad $raa_unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raa_unidad  $raa_unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Raa_unidad $raa_unidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raa_unidad  $raa_unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raa_unidad $raa_unidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raa_unidad  $raa_unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Raa_unidad::destroy($id);
        return Redirect::back()->with('mensaje','Evaluación eliminada con exito!');
    }
}
