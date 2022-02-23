<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $file = $request->file('import_file');
        Excel::import(new UsersImport, $file);
        
        return redirect()->route('home')->with('mensaje','Carga Docente agregada con Exito!');
    }

    public function create_docente(Request $request){
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
        
        // Reporte::insert($datosReporte);

        return redirect('docente')->with('mensaje','Reporte creado con éxito');
    }
}
