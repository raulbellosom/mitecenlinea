<?php

namespace App\Http\Controllers;

use App\Models\Rd_competencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RdCompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reporte.reporte_diagnostico.form_descripcion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        print_r($request);
        $competencias = new Rd_competencia();
        $competencias->competencia = $request->input('competencia');
        $competencias->ponderacion = $request->input('ponderacion');
        $competencias->r_diagnostico_id = $request->input('r_diagnostico_id');
        
        $competencias->save();
        return view('reporte_diagnostico');
    }
        

    // public function addComp(Request $datos)
    // {
        // var_dump($datos->competencia);
        // DB::insert('insert into rd_competencias 
        // (competencia, ponderacion, r_diagnostico_id) values (?, ?, ?)', 
        // [$datos->competencia, $datos->ponderacion ,$datos->r_diagnostico_id]);
        // print_r($datos->competencia);
        // $alta = DB::table('rd_competencias')->insert([
        //             'competencia' => $datos->competencia,
        //             'ponderacion' => $datos->ponderacion,
        //             'r_diagnostico_id' => $datos->r_diagnostico_id,
        //             /*
        //             si tu tabla tiene las columnas de created_at y updated_at
        //             debes también en el insert asignarles un valor
        //             */
        //         ]);
        // if($alta)
        // {
            // return response()->json(["exito" => "registrado"]);
        // }
    // }
    
    // public function deleteComp(Request $datos)
    // {
    //     // var_dump($datos->id);
        
    //     Rd_competencia::destroy($datos->id);
    //     return response()->json(["exito" => "eliminado"]);
    // }
    

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
            'competencia'=>'required|string',
            'ponderacion'=>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        // $this->validate($request, $competencias, $mensaje);

        $datosReporte = request()->except("_token");
        // $datosCompetencia = request()->except("_token", "user_id", "autor", "nombre_reporte",
        //  "asignatura","tipo_evaluacion", "cantidad_alumnos","carrera","grado", "grupo", "turno", "created_at");
        
        Rd_competencia::insert($datosReporte);
        
        // DB::insert('insert into competencias (competencia, ponderacion,r_diagnostico_id) values (?, ?, ?)', [$datosCompetencia["competencia"],$datosCompetencia["ponderacion"],1]);

        return Redirect::back()->with('mensaje','Competencia agregada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rd_competencia  $rd_competencia
     * @return \Illuminate\Http\Response
     */
    public function show(Rd_competencia $rd_competencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rd_competencia  $rd_competencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Rd_competencia $rd_competencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rd_competencia  $rd_competencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rd_competencia $rd_competencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rd_competencia  $rd_competencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rd_competencia::destroy($id);
        return Redirect::back()->with('mensaje','Competencia eliminada con exito!');
    }
}
