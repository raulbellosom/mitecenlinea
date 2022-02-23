<?php

namespace App\Http\Controllers;

use App\Models\Rd_pag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RdPagController extends Controller
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

    public function addPag(Request $datos)
    {
        DB::insert('insert into rd_pags (deficiencia_general, accion_general, tiempo_general, r_diagnostico_id) 
        values (?, ?, ?, ?)', [$datos->deficiencia_general, $datos->accion_general, $datos->tiempo_general, $datos->r_diagnostico_id]);
        
        return response()->json(["exito" => "registrado"]);
    }
    public function deletePag(Request $datos)
    {
        // var_dump($datos->id);
        
        Rd_pag::destroy($datos->id);
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
            'r_diagnostico_id'=>'required|int',
            'deficiencia_general'=>'required|string',
            'accion_general'=>'required|string',
            'tiempo_general'=>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        Rd_pag::insert($datosReporte);
        
        return Redirect::back()->with('mensaje','Plan de Acción General agregado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rd_pag  $rd_pag
     * @return \Illuminate\Http\Response
     */
    public function show(Rd_pag $rd_pag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rd_pag  $rd_pag
     * @return \Illuminate\Http\Response
     */
    public function edit(Rd_pag $rd_pag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rd_pag  $rd_pag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rd_pag $rd_pag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rd_pag  $rd_pag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rd_pag::destroy($id);
        return Redirect::back()->with('mensaje','Plan de Acción General eliminado con exito!');
    }
}
