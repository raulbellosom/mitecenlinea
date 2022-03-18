<?php

namespace App\Http\Controllers;

use App\Models\MateriasDocente;
use App\Models\ReporteDiagnostico;
use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        // $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(10);
        $diagnostico = DB::table('reporte_diagnosticos')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status' )
        ->where('user_id','=',$id)
        ;

        $raps= DB::table('raps')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status')
        ->where('user_id','=',$id)
        ;

        $raas= DB::table('raas')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status')
        ->where('user_id','=',$id)
        ;
        
        $datos["reportes"] = DB::table('r_departamentals')
        ->union($raas)
        ->union($raps)
        ->union($diagnostico)
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status')
        ->where('user_id','=',$id)
        ->orderByDesc('created_at')
        ->paginate(10);

        $user['users'] = Auth::user();

        return view("reporte.indexReporte", $user, $datos);
    }

    ///////////////////////////Administrativos//////////////////////////
    public function admin(){
        return view('reporte_admin.index_admin');
    }

    public function admin_docentes(){
        $users["users"]=User::all()->sortBy('name');
        // $users  =  DB::table('users')->select('name','email','typeUser')->paginate(10);
        return view('reporte_admin.admin_docentes', $users);
    }

    public function admin_materias(){
        // $materias= collect(MateriasDocente::all()->sortBy('materia'));
        // $plucked = $materias->pluck('user_id');
        // var_dump($plucked->all());

        $materias['materias']= DB::select('SELECT md.*, users.*
        FROM materias_docentes as md
        INNER JOIN users as users ON users.id = md.user_id
        ORDER BY md.materia');

        return view('reporte_admin.admin_materias', $materias);
    }

    public function admin_reportes(){
        $diagnostico = DB::table('reporte_diagnosticos')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status' )
        ->where('status','=',2)
        ;

        $raps= DB::table('raps')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status')
        ->where('status','=',2)
        ;

        $raas= DB::table('raas')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status')
        ->where('status','=',2)
        ;
        
        $datos["reportes"] = DB::table('r_departamentals')
        ->union($raas)
        ->union($raps)
        ->union($diagnostico)
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status')
        ->where('status','=',2)
        ->orderByDesc('created_at')
        ->paginate(10);

        return view('reporte_admin.admin_reportes', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("reporte.createReporte");
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
            'tipoReporte'=>'required|int',
            'carrera'=>'required|string|max:5',
            'asignatura'=>'required|string|max:50',
            'grado'=>'required|string|max:5',
            'grupo'=>'required|string|max:5',
            'turno'=>'required|string|max:10',
            'iddocente'=>'required|int',
            'created_at'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosReporte = request()->except("_token");
        
        Reporte::insert($datosReporte);

        return redirect('docente')->with('mensaje','Reporte creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        //
        return view('reporte.indexReporte');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reporte=Reporte::findOrFail($id);
        return view('reporte.editReporte', compact('reporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'tipoReporte'=>'required|string|max:50',
            'carrera'=>'required|string|max:5',
            'asignatura'=>'required|string|max:50',
            'grado'=>'required|string|max:5',
            'grupo'=>'required|string|max:5',
            'turno'=>'required|string|max:10',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        
        $this->validate($request, $campos, $mensaje);

        //
        $datosReporte = request()->except(['_token','_method']);
        
        
        Reporte::where('id','=',$id)->update($datosReporte);
        $reporte=Reporte::findOrFail($id);
        return redirect('docente')->with('mensaje','Los cambios se han efectuado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reporte::destroy($id);
        return redirect('docente')->with('mensaje','Reporte borrado con éxito');
    }
}
