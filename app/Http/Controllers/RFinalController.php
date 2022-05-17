<?php

namespace App\Http\Controllers;

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
            'asignatura'=>'required|string',
            'status'=>'required|int',
            'created_at'=>'required|date',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        // RFinal::insert($datosReporte);

        // return redirect('reporte_final')->with('mensaje','Reporte creado con éxito');
        return response()->json($datosReporte);
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
        $curso['cursos'] = RfCurso::where('rf_id','=',$id)->orderByDesc('created_at')->paginate(5);


        return view('reporte.reporte_final.form_rf_descripcion',$curso, compact('rf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RFinal  $rFinal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RFinal $rFinal)
    {
        //
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
