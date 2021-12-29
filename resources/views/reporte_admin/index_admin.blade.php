@extends('layouts.light')  
@section('content')

<div class="container">
        {{-- Codigo para recepcion de un mensaje --}}
            @if(Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        {{-- Codigo para recepcion de un mensaje --}}

    {{-- Barra de navegación  --}}
        <nav class="navbar navbar-expand-xl navbar-dark bg-secondary">
            <a class="navbar-brand mb-0 h1" href="{{url('reporte/')}}">Reportes</a>
            <button class="navbar-toggler bg-secondary " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse nav-pills" id="navbarNav">
              <div class="navbar-nav ">
                    <a href="{{url('reporte_diagnostico/')}}" class="nav-link text-light  h6 mb-0" >Reportes Diagnostico</a>
                    <a class="nav-link text-light  h6 mb-0" href="#">Reporte de Avance Programatico</a>
                    <a class="nav-link text-light h6 mb-0" href="#">Reporte de Avance Academico</a>
                    <a class="nav-link text-light  h6 mb-0" href="#">Reporte Departamental</a>
                    <a class="nav-link text-light h6 mb-0" href="#">Reporte Final</a>
                </div>
            </div>
          </nav>
    {{-- Barra de navegación  --}}

    {{-- Acciones main --}}
        <table class="table table-light table-striped table-responsive-sm table-responsive-md mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="">Nombre del alumno</th>
                    <th class="">Deficiencias</th>
                    <th class="">Accion sugerida</th>
                    <th class="">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><button class="btn btn-success">Descargar Reporte Diagnostico</button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    {{-- Acciones main --}}


</div>
@endsection
