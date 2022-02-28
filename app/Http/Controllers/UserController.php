<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $file = $request->file('import_file');
        Excel::import(new UsersImport, $file);
        
        return redirect()->route('admin_docentes')->with('mensaje','Carga Docente agregada con Exito!');
    }

    // public function update_password(Request $request){
    //     $id = Auth::id();
    //     $password_old = DB::select('select password from users where id = ?', [$id]);
    //     hash()
    //     $password = $request->input('password');
    //     if (condition) {
    //         # code...
    //     }
    //     $campos=[
    //         'password'=>'required|int',
    //     ];
    //     $mensaje=[
    //         'required'=>'El :attribute es requerido',
    //     ];
    //     $this->validate($request, $campos, $mensaje);

    //     $datosUsuario = request()->except("_token");
        
    //     User::where('id','=',$id)->update($datosUsuario);

    //     return redirect()->back()->with('mensaje','Contraseña actualizada con éxito');
    // }

    public function download_docentes_format(){
        return Storage::url('formato_docentes.xlsx');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin_docentes')->with('mensaje','Docente eliminado con éxito');
    }
}
