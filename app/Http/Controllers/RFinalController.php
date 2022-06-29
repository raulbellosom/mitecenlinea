<?php

namespace App\Http\Controllers;

use App\Models\MateriasDocente;
use App\Models\RfCurso;
use App\Models\RFinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=RFinal::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();
        return view('reporte/reporte_final/rf_index', $user, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $datos["datos"]=DB::select('select * from materias_docentes where user_id = ?', [$id]);
        $user['users'] = Auth::user();

        return view("reporte/reporte_final/rf_create", $user,$datos);
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
            'user_id'=>'required|int',
            'autor'=>'required|string',
            'nombre_reporte'=>'required|string',
            'semestre'=>'required|string',
            'asignatura'=>'required|int',
            'status'=>'required|int',
            'created_at'=>'required|date',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        // RFinal::insert($datosReporte);
        $reporte_diagnostico = MateriasDocente::findOrFail($request->input('asignatura'));
        $complementos=[
            'grado'=>$reporte_diagnostico->grado,
            'grupo'=>$reporte_diagnostico->grupo,
            'turno'=>$reporte_diagnostico->turno,
            'carrera'=>$reporte_diagnostico->carrera,
            'asignatura'=>$reporte_diagnostico->materia,

        ];
        $datosReporte = array_merge($datosReporte,$complementos);


        RFinal::insert($datosReporte);
        return redirect('reporte_final')->with('mensaje','Reporte creado con éxito');
        
        // return response()->json($datosReporte);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFinal  $rFinal
     * @return \Illuminate\Http\Response
     */
    public function show(RFinal $rFinal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RFinal  $rFinal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      

        $user['users'] = Auth::user();
        $rf=RFinal::findOrFail($id);
        $curso['cursos'] = RfCurso::where('rf_id','=',$id)->paginate(1);
        // var_dump(compact("rf"));
        
        return view('reporte.reporte_final.edit_rf',$curso, compact("rf"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RFinal  $rFinal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosReporte = request()->except("_token","_method");
        // return response()->json($datosReporte);
          /*Se trabajara con las bases de datos 
            r_finals
                rf_cursos
                rf_practicas_espacios
                rf_actividades
                rf_metodologias
        */

        $campos=[
            //rf_curso
            'no_unidades'=>'required|int',
            'porcentaje_cobertura_programa'=>'required|string',
            'causas'=>'required|string',
            'no_alu_lista'=>'required|string',
            'no_alu_aprobados'=>'required|int',
            'no_alu_reprobados'=>'required|int',
            'no_alu_desercion'=>'required|int',
            'prom_general'=>'required|string',
            'caracteristicas_grupo'=>'required|string',
            'porcentaje_asistencia'=>'required|string',
            'observaciones'=>'required|string',
            'rf_id'=>'required|int',
            //rf_practicas_especios
            'espacios_aulas'=>'required|string',
            'espacios_talleres'=>'required|string',
            'espacios_laboratorios'=>'required|string',
            'no_practicas_programadas'=>'required|int',
            'porcentaje_practicas'=>'required|int',
            'nombre_practicas'=>'required|string',
            'e_canon_por_uso'=>'required|int',
            'e_canon_tipo'=>'required|string',
            'e_pc_por_uso'=>'required|int',
            'e_pc_tipo'=>'required|string',
            'e_rotafolio_por_uso'=>'required|int',
            'e_rotafolio_tipo'=>'required|string',
            'e_tv_por_uso'=>'required|int',
            'e_tv_tipo'=>'required|string',
            'e_dvd_por_uso'=>'required|int',
            'e_dvd_tipo'=>'required|string',
            'e_otro'=>'required|string',
            'e_otro_por_uso'=>'required|int',
            'e_otro_tipo'=>'required|string',


        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);



        /* Inserts*/
        // RfCurso::insert($datosReporte);
        // return redirect('reporte_final')->with('mensaje','Los cambios se han efectuado con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RFinal  $rFinal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from rf_cursos where rf_id  = ?', [$id]);
        // DB::delete('delete from rap_practica_planeadas where rap_id  = ?', [$id]);
        // DB::delete('delete from rap_desglose_horas where rap_id  = ?', [$id]);
        RFinal::destroy($id);
        return redirect('reporte_final')->with('mensaje','Reporte borrado con éxito');
    }
}
