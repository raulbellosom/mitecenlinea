<?php

namespace App\Http\Controllers;

use App\Models\Raa_analisis_resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RaaAnalisisResultadoController extends Controller
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

    public function addAnalisis(Request $datos)
    {
        DB::insert('insert into raa_analisis_resultados 
        (analisis_descripcion, analisis_acciones, raa_id) 
        values (?, ?, ?)', [$datos->analisis_descripcion, $datos->analisis_acciones, $datos->raa_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deleteAnalisis(Request $datos)
    {
        // var_dump($datos->id);
        
        Raa_analisis_resultado::destroy($datos->id);
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
            'analisis_descripcion'=>'required|string',
            'analisis_acciones'=>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        Raa_analisis_resultado::insert($datosReporte);
        
        return Redirect::back()->with('mensaje','La Unidad fue agregada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Raa_analisis_resultado  $raa_analisis_resultado
     * @return \Illuminate\Http\Response
     */
    public function show(Raa_analisis_resultado $raa_analisis_resultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raa_analisis_resultado  $raa_analisis_resultado
     * @return \Illuminate\Http\Response
     */
    public function edit(Raa_analisis_resultado $raa_analisis_resultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raa_analisis_resultado  $raa_analisis_resultado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raa_analisis_resultado $raa_analisis_resultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raa_analisis_resultado  $raa_analisis_resultado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Raa_analisis_resultado::destroy($id);
        return Redirect::back()->with('mensaje','Analisis de Resultados eliminado con exito!');
    }
}
