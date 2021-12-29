<?php

namespace App\Http\Controllers;

use App\Models\RDepartamental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RDepartamentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $datos["reportes"]=RDepartamental::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();
        return view('reporte/reporte_departamental/rdep_index', $user, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $datos["reportes"]=RDepartamental::where('user_id','=',$id)->paginate(10);
        $user['users'] = Auth::user();

        return view("reporte/reporte_departamental/rdep_create", $user,$datos);
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
            'carrera'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
            'semestre'=>'required|string',
            'total_alumnos_lista'=>'required|int',
            'total_alumnos_examen'=>'required|int',
            'unidad_evaluada'=>'required|int',
            'fecha_aplicacion_examen'=>'required|date',
            'prom_alumnos_aprobados'=>'required|int',
            'promedio_general'=>'required|int',
            'comen_generales'=>'required|string',
            'comen_particulares'=>'required|string',
            'status'=>'required|int',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        RDepartamental::insert($datosReporte);

        return redirect('reporte_departamental')->with('mensaje','Reporte creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RDepartamental  $rDepartamental
     * @return \Illuminate\Http\Response
     */
    public function show(RDepartamental $rDepartamental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RDepartamental  $rDepartamental
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reporte=RDepartamental::findOrFail($id);
        $user['users'] = Auth::user();
        return view('reporte.reporte_departamental.edit_rdep',$user, compact('reporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RDepartamental  $rDepartamental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'user_id'=>'required|int',
            'autor'=>'required|string',
            'nombre_reporte'=>'required|string',
            'asignatura'=>'required|string',
            'carrera'=>'required|string',
            'grado'=>'required|string',
            'grupo'=>'required|string',
            'turno'=>'required|string',
            'semestre'=>'required|string',
            'total_alumnos_lista'=>'required|int',
            'total_alumnos_examen'=>'required|int',
            'unidad_evaluada'=>'required|int',
            'fecha_aplicacion_examen'=>'required|date',
            'prom_alumnos_aprobados'=>'required|int',
            'promedio_general'=>'required|int',
            'comen_generales'=>'required|string',
            'comen_particulares'=>'required|string',
            'status'=>'required|int',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        RDepartamental::where('id','=',$id)->update($datosReporte);

        return redirect('reporte_departamental')->with('mensaje','Los cambios se han efectuado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RDepartamental  $rDepartamental
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RDepartamental::destroy($id);
        return redirect('reporte_departamental')->with('mensaje','Reporte borrado con éxito');
    }
}
