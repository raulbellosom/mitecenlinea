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
        {{-- <nav class="navbar navbar-expand-xl navbar-dark bg-secondary">
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
          </nav> --}}
    {{-- Barra de navegación  --}}

    {{-- Acciones main --}}
        <table class="table table-white table-striped table-responsive-sm table-responsive-md mt-4">
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
                    {{-- <th><button class="btn btn-success " value="{{'/download'}}">Descargar Reporte Diagnostico</button></td> --}}
                    <td>
                        <form action="{{url('/download/')}}" method="GET">
                
                            <button  class="btn btn-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                                Descargar Reportes Diagnostico
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url('/download_reporte_avance_programatico/')}}" method="GET">
                
                            <button  class="btn btn-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                                Descargar Reporte Primer Corte
                            </button>
                        </form>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    {{-- Acciones main --}}


</div>
@endsection
