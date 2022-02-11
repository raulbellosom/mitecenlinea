<?php

namespace App\Http\Controllers;

use App\Models\Raa_pag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RaaPagController extends Controller
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
    
    public function addRaaPag(Request $datos)
    {
        DB::insert('insert into raa_pags (deficiencia_general, accion_general, tiempo_general, raa_id) 
        values (?, ?, ?, ?)', [$datos->deficiencia_general, $datos->accion_general, $datos->tiempo_general, $datos->raa_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deleteRaaPag(Request $datos)
    {
        // var_dump($datos->id);
        
        Raa_pag::destroy($datos->id);
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
     * @param  \App\Models\Raa_pag  $raa_pag
     * @return \Illuminate\Http\Response
     */
    public function show(Raa_pag $raa_pag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raa_pag  $raa_pag
     * @return \Illuminate\Http\Response
     */
    public function edit(Raa_pag $raa_pag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raa_pag  $raa_pag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raa_pag $raa_pag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raa_pag  $raa_pag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Raa_pag::destroy($id);
        return Redirect::back()->with('mensaje','Plan de Acción General eliminado con exito!');
    }
}
