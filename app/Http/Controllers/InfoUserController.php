<?php

namespace App\Http\Controllers;

use App\Models\InfoUser;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class InfoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'telefono'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'edad'=>'required|string|max:100',
            'curp'=>'required|string',
            'nss'=>'required|string|max:15',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'user_id'=>'required'
            
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
        
        InfoUser::insert($datosDocente);

        // return response()->json($datosDocente);
        return redirect('docente')->with('mensaje','Docente creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoUser  $infoUser
     * @return \Illuminate\Http\Response
     */
    public function show(InfoUser $infoUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoUser  $infoUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $docente=InfoUser::findOrFail($id);
        $docente=InfoUser::where('user_id','=',$id)->firstOrFail();
        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoUser  $infoUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'telefono'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'edad'=>'required|string|max:100',
            'curp'=>'required|string',
            'nss'=>'required|string|max:15',
            'user_id'=>'required'
            
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
            $docente=InfoUser::findOrFail($id);
            
            Storage::delete('public/'.$docente->imagen);
            
            $datosDocente["imagen"]=$request->file("imagen")->store("uploads","public");
        }
        
        InfoUser::where('id','=',$id)->update($datosDocente);
        $docente=InfoUser::findOrFail($id);
        // return view('docente.edit', compact('docente'));
        return redirect('docente')->with('mensaje','Los cambios se han efectuado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoUser  $infoUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoUser $infoUser)
    {
        //
    }
}
