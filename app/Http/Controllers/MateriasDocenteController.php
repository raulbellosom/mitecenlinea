<?php

namespace App\Http\Controllers;

use App\Imports\MateriasImport;
use App\Models\MateriasDocente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MateriasDocenteController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('import_file');
        Excel::import(new MateriasImport, $file);
        
        return redirect()->route('admin_materias')->with('mensaje','Carga de Materias agregada con Exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MateriasDocente  $materiasDocente
     * @return \Illuminate\Http\Response
     */
    public function show(MateriasDocente $materiasDocente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MateriasDocente  $materiasDocente
     * @return \Illuminate\Http\Response
     */
    public function edit(MateriasDocente $materiasDocente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MateriasDocente  $materiasDocente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MateriasDocente $materiasDocente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MateriasDocente  $materiasDocente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MateriasDocente::destroy($id);
        return redirect()->route('admin_materias')->with('mensaje','Materia borrada con éxito');
    }
}
