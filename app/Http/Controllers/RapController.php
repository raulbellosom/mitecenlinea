<?php

namespace App\Http\Controllers;

use App\Models\Rap;
use App\Models\Rap_unidad;
use App\Models\RapDesgloseHoras;
use App\Models\RapPracticaPlaneada;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=Rap::where('user_id','=',$id)->orderByDesc('created_at')->paginate(5);
        $user['users'] = Auth::user();
        return view('reporte/reporte_avance_programatico/rap_index', $user, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $datos["reportes"]=Rap::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();

        return view("reporte/reporte_avance_programatico/rap_create", $user,$datos);
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
            'periodo_monitoreo'=>'required|string',
            'asignatura'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
            'carrera'=>'required|string',
            'status'=>'required|int',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        Rap::insert($datosReporte);

        return redirect('reporte_avance_programatico')->with('mensaje','Reporte creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rap  $rap
     * @return \Illuminate\Http\Response
     */
    public function show(Rap $rap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rap  $rap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user['users'] = Auth::user();
        $rap=Rap::findOrFail($id);
        $unidades['unidad'] = Rap_unidad::where('rap_id','=',$id)->paginate(2);

        $desglose_id = RapDesgloseHoras::where('rap_id','=',$id)->value('id');
        $horas_teoricas = RapDesgloseHoras::where('rap_id','=',$id)->value('horas_teoricas');
        $horas_practicas = RapDesgloseHoras::where('rap_id','=',$id)->value('horas_practicas');
        $total_horas = RapDesgloseHoras::where('rap_id','=',$id)->value('total_horas');
        $cantidad_horas_aula = RapDesgloseHoras::where('rap_id','=',$id)->value('cantidad_horas_aula');
        $cantidad_horas_externas = RapDesgloseHoras::where('rap_id','=',$id)->value('cantidad_horas_externas');
        $cantidad_horas_taller = RapDesgloseHoras::where('rap_id','=',$id)->value('cantidad_horas_taller');
        $porcentaje_horas_tecnologia = RapDesgloseHoras::where('rap_id','=',$id)->value('porcentaje_horas_tecnologia');

        $practicas_id = RapPracticaPlaneada::where('rap_id','=',$id)->value('id');
        $practicas_planeadas = RapPracticaPlaneada::where('rap_id','=',$id)->value('practicas_planeadas');
        $practicas_realizadas = RapPracticaPlaneada::where('rap_id','=',$id)->value('practicas_realizadas');
        $nombre_practicas = RapPracticaPlaneada::where('rap_id','=',$id)->value('nombre_practicas');
        $observaciones = RapPracticaPlaneada::where('rap_id','=',$id)->value('observaciones');
        $practicas_no_planeadas = RapPracticaPlaneada::where('rap_id','=',$id)->value('practicas_no_planeadas');
        $nombre_no_planeadas = RapPracticaPlaneada::where('rap_id','=',$id)->value('nombre_no_planeadas');
        $talleres = RapPracticaPlaneada::where('rap_id','=',$id)->value('talleres');
        $diferencias = RapPracticaPlaneada::where('rap_id','=',$id)->value('diferencias');

        $unidades = Arr::add($unidades, 'desglose_id',$desglose_id);
        $unidades = Arr::add($unidades, 'horas_teoricas',$horas_teoricas);
        $unidades = Arr::add($unidades, 'horas_practicas',$horas_practicas);
        $unidades = Arr::add($unidades, 'total_horas',$total_horas);
        $unidades = Arr::add($unidades, 'cantidad_horas_aula',$cantidad_horas_aula);
        $unidades = Arr::add($unidades, 'cantidad_horas_externas',$cantidad_horas_externas);
        $unidades = Arr::add($unidades, 'cantidad_horas_taller',$cantidad_horas_taller);
        $unidades = Arr::add($unidades, 'porcentaje_horas_tecnologia',$porcentaje_horas_tecnologia);

        $unidades = Arr::add($unidades, 'practicas_id',$practicas_id);
        $unidades = Arr::add($unidades, 'practicas_planeadas',$practicas_planeadas);
        $unidades = Arr::add($unidades, 'nombre_practicas',$nombre_practicas);
        $unidades = Arr::add($unidades, 'practicas_realizadas',$practicas_realizadas);
        $unidades = Arr::add($unidades, 'observaciones',$observaciones);
        $unidades = Arr::add($unidades, 'practicas_no_planeadas',$practicas_no_planeadas);
        $unidades = Arr::add($unidades, 'nombre_no_planeadas',$nombre_no_planeadas);
        $unidades = Arr::add($unidades, 'talleres',$talleres);
        $unidades = Arr::add($unidades, 'diferencias',$diferencias);

        return view('reporte.reporte_avance_programatico.form_rap_descripcion',$unidades, compact('rap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rap  $rap
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
        
        Rap::where('id','=',$id)->update($status);
        return Redirect::back()->with('mensaje','El reporte se ha finalizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rap  $rap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from rap_unidads where rap_id  = ?', [$id]);
        DB::delete('delete from rap_practica_planeadas where rap_id  = ?', [$id]);
        DB::delete('delete from rap_desglose_horas where rap_id  = ?', [$id]);
        Rap::destroy($id);
        return redirect('reporte_avance_programatico')->with('mensaje','Reporte borrado con éxito');
    }
}
