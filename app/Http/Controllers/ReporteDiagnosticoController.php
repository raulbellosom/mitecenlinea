<?php

namespace App\Http\Controllers;

use App\Models\MateriasDocente;
use App\Models\Rd_competencia;
use App\Models\Rd_pag;
use App\Models\Rd_pap;
use App\Models\ReporteDiagnostico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReporteDiagnosticoController extends Controller
{
    // private $user_id;
    // private $asignaturas;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    //  {
    //      $this->user_id = Auth::id();
    //      $this->asignaturas [] = DB::select('select * from materias_docentes where user_id = ?', [$this->user_id]);
    //  }

    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->orderByDesc('created_at')->paginate(5);
        //$user['users'] = Auth::user();
        return view('reporte/reporte_diagnostico/indexDiagnostico', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $reporte_diagnostico = 0;
        $id = Auth::id();
        // $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(10);
        $datos["datos"] = DB::select('select * from materias_docentes where user_id = ?', [$id]);
        $user['users'] = Auth::user();
        // if ($id_materia) {
        //     $reporte_diagnostico = MateriasDocente::findOrFail($id_materia);
        // }
        // var_dump($datos);
        return view("reporte/reporte_diagnostico/create_diagnostico", $user, $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reporte_diagnostico = MateriasDocente::findOrFail($request->input('asignatura'));
        //Solo para traerme los datos complementos
        // var_dump($reporte_diagnostico);
        $campos=[
            'user_id'=>'required|int',
            'autor'=>'required|string',
            'nombre_reporte'=>'required|string',
            'asignatura'=>'required|string',
            'tipo_evaluacion'=>'required|string',
            'cantidad_alumnos'=>'required|int',
            'created_at'=>'required|date'
        ];
        
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        // $this->validate($request, $competencias, $mensaje);

        $datosReporte = request()->except("_token","asignatura");

        $complementos=[
            'grado'=>$reporte_diagnostico->grado,
            'grupo'=>$reporte_diagnostico->grupo,
            'turno'=>$reporte_diagnostico->turno,
            'carrera'=>$reporte_diagnostico->carrera,
            'asignatura'=>$reporte_diagnostico->materia,

        ];
        $datosReporte = array_merge($datosReporte,$complementos);
        // $datosCompetencia = request()->except("_token", "user_id", "autor", "nombre_reporte",
        // "asignatura","tipo_evaluacion", "cantidad_alumnos","carrera","grado", "grupo", "turno", "created_at");
        //var_dump($datosReporte);//Muestra los datos en json
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
            'status'=>'required|integer',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        $this->validate($request, $campos, $mensaje);

        $status = request()->except(['_token','_method']);
        
        ReporteDiagnostico::where('id','=',$id)->update($status);

        return Redirect::back()->with('mensaje','El reporte se ha finalizado con éxito');
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
