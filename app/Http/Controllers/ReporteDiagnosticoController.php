<?php

namespace App\Http\Controllers;

use App\Models\Rd_competencia;
use App\Models\Rd_pag;
use App\Models\Rd_pap;
use App\Models\ReporteDiagnostico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ReporteDiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();
        return view('reporte/reporte_diagnostico/indexDiagnostico', $user, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();

        return view("reporte/reporte_diagnostico/create_diagnostico", $user,$datos);
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
            'asignatura'=>'required|string',
            'tipo_evaluacion'=>'required|string',
            'cantidad_alumnos'=>'required|int',
            'carrera'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
            'created_at'=>'required|date'
        ];
        // $competencias=[
        //     'competencia'=>'required|string',
        //     'ponderacion'=>'required|int',
        //     'r_diagnostico_id'=>'int'
        // ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        // $this->validate($request, $competencias, $mensaje);

        $datosReporte = request()->except("_token");
        // $datosCompetencia = request()->except("_token", "user_id", "autor", "nombre_reporte",
        //  "asignatura","tipo_evaluacion", "cantidad_alumnos","carrera","grado", "grupo", "turno", "created_at");
        
        ReporteDiagnostico::insert($datosReporte);
        
        // DB::insert('insert into competencias (competencia, ponderacion,r_diagnostico_id) values (?, ?, ?)', [$datosCompetencia["competencia"],$datosCompetencia["ponderacion"],1]);

        return redirect('reporte_diagnostico')->with('mensaje','Reporte creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user['users'] = Auth::user();
        $reporte_diagnostico=ReporteDiagnostico::findOrFail($id);
        $competencias['competencia'] = Rd_competencia::where('r_diagnostico_id','=',$id)->paginate(5);
        return view('reporte.reporte_diagnostico.form_descripcion', $competencias, compact('reporte_diagnostico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user['users'] = Auth::user();
        $reporte_diagnostico=ReporteDiagnostico::findOrFail($id);
        $competencias['competencia'] = Rd_competencia::where('r_diagnostico_id','=',$id)->paginate(5);
        $pap['paps'] = Rd_pap::where('r_diagnostico_id','=',$id)->paginate(5);
        $pag_def = Rd_pag::where('r_diagnostico_id','=',$id)->value('deficiencia_general');
        $pag_id = Rd_pag::where('r_diagnostico_id','=',$id)->value('id');
        $pag_ac = Rd_pag::where('r_diagnostico_id','=',$id)->value('accion_general');
        $pag_time = Rd_pag::where('r_diagnostico_id','=',$id)->value('tiempo_general');

        
        $competencias = Arr::add($competencias, 'pag_def',$pag_def);
        $competencias = Arr::add($competencias, 'pag_id',$pag_id);
        $competencias = Arr::add($competencias, 'pag_ac',$pag_ac);
        $competencias = Arr::add($competencias, 'pag_time',$pag_time);
        $competencias = Arr::add($competencias, 'pap',$pap);


        return view('reporte.reporte_diagnostico.form_descripcion', $competencias, compact('reporte_diagnostico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'user_id'=>'required|int',
            'autor'=>'required|string',
            'nombre_reporte'=>'required|string',
            'asignatura'=>'required|string',
            'tipo_evaluacion'=>'required|string',
            'cantidad_alumnos'=>'required|int',
            'carrera'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except('_token','_method');
        
        ReporteDiagnostico::insert($datosReporte);

        ReporteDiagnostico::where('id','=',$id)->update($datosReporte);
        // $reporte_diagnostico=ReporteDiagnostico::findOrFail($id);

        return redirect('reporte_diagnostico')->with('mensaje','Reporte ha sido modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from rd_competencias where r_diagnostico_id  = ?', [$id]);
        DB::delete('delete from rd_pags where r_diagnostico_id  = ?', [$id]);
        DB::delete('delete from rd_paps where r_diagnostico_id  = ?', [$id]);
        
        ReporteDiagnostico::destroy($id);
        return redirect('reporte_diagnostico')->with('mensaje','Reporte borrado con éxito');
    }
}
