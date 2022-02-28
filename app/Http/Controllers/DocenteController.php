<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\InfoUser;
use App\Models\Raa;
use App\Models\Rap;
use App\Models\RDepartamental;
use App\Models\ReporteDiagnostico;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $datos["users"]=User::where('userid','=',$user);
        // $datos = DB::table('users')->where('id',$id);
        $id = Auth::id();
        // $datos["reportes"]=ReporteDiagnostico::where('user_id','=',$id)->paginate(3);
        // $d2["reportes"]=Raa::where('user_id','=',$id)->paginate(3);
        // $d3["reportes"]=Rap::where('user_id','=',$id)->paginate(3);
        // $d4["reportes"]=RDepartamental::where('user_id','=',$id)->paginate(3);

        $diagnostico = DB::table('reporte_diagnosticos')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status' )
        ->where('user_id','=',$id)
        ;

        $raps= DB::table('raps')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status' )
        ->where('user_id','=',$id)
        ;

        $raas= DB::table('raas')
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status' )
        ->where('user_id','=',$id)
        ;
        
        $datos["reportes"] = DB::table('r_departamentals')
        ->union($raas)
        ->union($raps)
        ->union($diagnostico)
        ->select('created_at', 'nombre_reporte', 'grado', 'grupo', 'id', 'carrera','asignatura', 'user_id', 'status' )
        ->where('user_id','=',$id)
        ->orderByDesc('created_at')
        ->limit(10)
        ->paginate(5);

        // var_dump($prueba);

        // $datos["reportes"] = DB::select("SELECT* FROM (
        //     SELECT  dia.created_at, dia.nombre_reporte, dia.grado, dia.grupo, dia.user_id, dia.carrera, dia.asignatura, dia.id
        //     FROM reporte_diagnosticos as dia
        //     UNION
        //     SELECT  dia.created_at, dia.nombre_reporte, dia.grado, dia.grupo, dia.user_id, dia.carrera, dia.asignatura, dia.id
        //     FROM r_departamentals as dia
        //     UNION
        //     SELECT  dia.created_at, dia.nombre_reporte, dia.grado, dia.grupo, dia.user_id, dia.carrera, dia.asignatura, dia.id
        //     FROM raas as dia
        //     UNION
        //     SELECT  dia.created_at, dia.nombre_reporte, dia.grado, dia.grupo, dia.user_id, dia.carrera, dia.asignatura, dia.id
        //     FROM raps as dia
        //     ) AS QUERY WHERE user_id = {$id} ORDER BY created_at DESC LIMIT 5 OFFSET 5");




        $user['users'] = Auth::user();
        // $info['infos']= DB::select('select user_id, imagen from info_users where user_id = ?', [$id]);
        $info= InfoUser::where('user_id','=',$id)->value('user_id');
        $imagen = InfoUser::where('user_id','=',$id)->value('imagen');
        $bandera = '0';
        if ($info) {
            $bandera = '1';
        }
        $user = Arr::add($user, 'info_user',$bandera);
        $user = Arr::add($user, 'imagen',$imagen);
        

        // print_r($info);
        return view("docente.index",$datos,$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("docente.create");
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
            'nombre'=>'required|string|max:100',
            'apellidoPaterno'=>'required|string|max:100',
            'apellidoMaterno'=>'required|string|max:100',
            'correo'=>'required|email',
            'telefono'=>'required|string|max:15',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'userid'=>'required'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'imagen.required'=>'La imagen es requerida'
        ];
        $this->validate($request, $campos, $mensaje);

        // $datosDocente = request()->all();
        $datosDocente = request()->except("_token");
        

        if($request->hasFile("imagen")){
            $datosDocente["imagen"]=$request->file("imagen")->store("uploads","public");
        }
        
        Docente::insert($datosDocente);

        // return response()->json($datosDocente);
        return redirect('docente')->with('mensaje','Docente creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::id();
        $user['users'] = Auth::user();
        // $info['infos']= DB::select('select user_id, imagen from info_users where user_id = ?', [$id]);
        $info['infos']= InfoUser::where('user_id','=',$id)->paginate(1);
        $imagen = InfoUser::where('user_id','=',$id)->value('imagen');
        $bandera = 0;
        if ($info) {
            $bandera = 1;
        }
        
        $user = Arr::add($user, 'info_user',$bandera);
        $user = Arr::add($user, 'imagen',$imagen);
        // print_r($info);
        return view('docente.perfil',$user,$info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $docente=User::findOrFail($id);
        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'nombre'=>'required|string|max:100',
            'apellidoPaterno'=>'required|string|max:100',
            'apellidoMaterno'=>'required|string|max:100',
            'correo'=>'required|email',
            'telefono'=>'required|string|max:15',
            'userid'=>'required'
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        if($request->hasFile("imagen")){
            $campos=['imagen'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['imagen.required'=>'La imagen es requerida'];
        }
        $this->validate($request, $campos, $mensaje);

        //
        $datosDocente = request()->except(['_token','_method']);
        
        if($request->hasFile("imagen")){
            $docente=Docente::findOrFail($id);
            
            Storage::delete('public/'.$docente->imagen);
            
            $datosDocente["imagen"]=$request->file("imagen")->store("uploads","public");
        }
        
        Docente::where('id','=',$id)->update($datosDocente);
        $docente=Docente::findOrFail($id);
        // return view('docente.edit', compact('docente'));
        return redirect('docente')->with('mensaje','Los cambios se han efectuado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente=Docente::findOrFail($id);
        if(Storage::delete('public/'.$docente->imagen)){
            Docente::destroy($id);
        }
        
        return redirect('docente')->with('mensaje','Docente borrado con éxito');
    }
}
