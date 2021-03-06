<?php

namespace App\Http\Controllers;

use App\Models\MateriasDocente;
use App\Models\Raa;
use App\Models\Raa_analisis_resultado;
use App\Models\Raa_pag;
use App\Models\Raa_pap;
use App\Models\Raa_unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RaaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=Raa::where('user_id','=',$id)->orderByDesc('created_at')->paginate(5);
        $user['users'] = Auth::user();
        return view('reporte/reporte_avance_academico/raa_index', $user, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        // $datos["reportes"]=Raa::where('user_id','=',$id)->paginate(10);
        $datos["datos"] = DB::select('select * from materias_docentes where user_id = ?', [$id]);
        $user['users'] = Auth::user();

        return view("reporte/reporte_avance_academico/raa_create", $user,$datos);
        //return response()->json($user+$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reporte = MateriasDocente::findOrFail($request->input('asignatura'));
        $campos=[
            'user_id'=>'required|int',
            'autor'=>'required|string',
            'periodo_corte'=>'required|string',
            'nombre_reporte'=>'required|string',
            'asignatura'=>'required|string',
            'total_alumnos'=>'required|int',
            'total_alumnos_ausentes'=>'required|int',
            'total_alumnos_desertados'=>'required|int',
            'status'=>'required|int',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token","asignatura");

        $complementos=[
            'grado'=>$reporte->grado,
            'grupo'=>$reporte->grupo,
            'turno'=>$reporte->turno,
            'carrera'=>$reporte->carrera,
            'asignatura'=>$reporte->materia,

        ];
        $datosReporte = array_merge($datosReporte,$complementos);
        
        Raa::insert($datosReporte);

        return redirect('reporte_avance_academico')->with('mensaje','Reporte creado con ??xito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function show(raa $raa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user['users'] = Auth::user();
        $raa=Raa::findOrFail($id);
        $unidades['unidad'] = Raa_unidad::where('raa_id','=',$id)->paginate(2);
        // $pap['paps'] = Rd_pap::where('r_diagnostico_id','=',$id)->paginate(5);
        $anal_id = Raa_analisis_resultado::where('raa_id','=',$id)->value('id');
        $analisis_descripcion = Raa_analisis_resultado::where('raa_id','=',$id)->value('analisis_descripcion');
        $analisis_acciones = Raa_analisis_resultado::where('raa_id','=',$id)->value('analisis_acciones');
        $pag_id = Raa_pag::where('raa_id','=',$id)->value('id');
        $pag_def = Raa_pag::where('raa_id','=',$id)->value('deficiencia_general');
        $pag_ac = Raa_pag::where('raa_id','=',$id)->value('accion_general');
        $pag_time = Raa_pag::where('raa_id','=',$id)->value('tiempo_general');
        $pap['paps'] = Raa_pap::where('raa_id','=',$id)->paginate(5);


        $unidades = Arr::add($unidades, 'anal_id',$anal_id);
        $unidades = Arr::add($unidades, 'analisis_descripcion',$analisis_descripcion);
        $unidades = Arr::add($unidades, 'analisis_acciones',$analisis_acciones);
        $unidades = Arr::add($unidades, 'pag_id',$pag_id);
        $unidades = Arr::add($unidades, 'pag_def',$pag_def);
        $unidades = Arr::add($unidades, 'pag_ac',$pag_ac);
        $unidades = Arr::add($unidades, 'pag_time',$pag_time);
        $unidades = Arr::add($unidades, 'pap',$pap);


        return view('reporte.reporte_avance_academico.form_raa_descripcion',$unidades, compact('raa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $campos=[
            'status'=>'required|integer',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        $this->validate($request, $campos, $mensaje);

        $status = request()->except(['_token','_method']);
        
        Raa::where('id','=',$id)->update($status);
        return Redirect::back()->with('mensaje','El reporte se ha finalizado con ??xito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\raa  $raa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        DB::delete('delete from raa_unidads where raa_id  = ?', [$id]);
        DB::delete('delete from raa_analisis_resultados where raa_id  = ?', [$id]);
        DB::delete('delete from raa_pags where raa_id  = ?', [$id]);
        DB::delete('delete from raa_paps where raa_id  = ?', [$id]);
        
        Raa::destroy($id);
        return redirect('reporte_avance_academico')->with('mensaje','Reporte borrado con ??xito');
    }
}
