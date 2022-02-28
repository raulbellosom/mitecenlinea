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
    <div class="pt-4">
        <nav class="navbar navbar-expand-xl navbar-white bg-white">
            <a class="navbar-brand text-dark" href="{{url('administrativo/')}}">Panel de Control</a>
            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <div class=" nav navbar-nav">
                    <a href="{{route('admin_docentes')}}" class="nav-link text-dark h6 mb-0">Administrar Docentes</a>
                    <a href="{{route('admin_materias')}}" class="nav-link text-dark h6 mb-0">Administrar Materias</a>
                    <a href="{{route('admin_reportes')}}" class="nav-link text-primary h6 mb-0">Administrar Reportes</a>
                </div>
            </div>
        </nav>
    </div>
    {{-- Barra de navegación  --}}

    {{-- Tabla principal --}}
        <div class="bg-light">
            <div class="pt-4">
                <div class="ml-3 mr-3 p-2 d-md-flex justify-content-md-between align-items-baseline bg-light border border-primary border-bottom-0"> 
                    <div class="font-weight-bold text-primary h5 pb-2">
                        Todos los Docentes
                    </div>
                    {{-- <a href="{{ route('register') }}" class="btn btn-outline-primary col-12 col-sm-12 col-md-6 col-lg-4"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Añadir un nuevo docente
                    </a> --}}
                </div>
            </div>
            <div class="col-sm-12 row-sm-12">
                <table class="table table-responsive-lg table-white table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>F. de creacion</th>
                            <th>Tipo de reporte</th>
                            <th>Carrera</th>
                            <th>Asignatura</th>
                            <th class="text-center">Grado Grupo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reportes as $reporte)
                        <tr>
                            <td>{{Str::substr($reporte->created_at, 0, 10)}}</td>
                            <td>{{$reporte->nombre_reporte}}</td>
                            <td>{{$reporte->carrera}}</td>
                            <td>{{$reporte->asignatura}}</td>
                            <td class="text-center">{{$reporte->grado}} {{$reporte->grupo}}</td>
                            <td class="text-center">
                                @switch($reporte->nombre_reporte)
                                    @case("Reporte Diagnostico")
                                        <form action="{{url('/downloadPDF/'.$reporte->id)}}" method="GET">
                                            <button  class="btn btn-success" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                </svg>
                                                Descargar
                                            </button>
                                        </form>
                                        @break
                                    @case("Reporte Avance Académico")
                                        <form action="{{url('/download_reporte_avance_academico/'.$reporte->id)}}" method="GET">
                                            <button  class="btn btn-success" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                </svg>
                                                Descargar
                                            </button>
                                        </form>
                                        @break
                                    @case("Reporte Avance Programático")
                                        <form action="{{url('/download_reporte_avance_academico/'.$reporte->id)}}" method="GET">
                                            <button  class="btn btn-success" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                </svg>
                                                Descargar
                                            </button>
                                        </form>
                                        @break
                                    @case("Reporte Departamental")
                                        <form action="{{url('/download_reporte_departamental/'.$reporte->id)}}" method="GET">
                                            <button  class="btn btn-success" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                </svg>
                                                Descargar
                                            </button>
                                        </form>
                                        @break
                                    @case("Reporte Final")
                                        <form action="{{url('/downloadPDF/'.$reporte->id)}}" method="GET">
                                            <button  class="btn btn-success" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                </svg>
                                                Descargar
                                            </button>
                                        </form>
                                        @break
                                    @default
                                @endswitch
                            </td>
                        </tr>
                        @endforeach      
                    </tbody>
                </table>
            </div>
            {{-- <div style="display:flex; justify-content: center">
                {!! $users->links() !!}
            </div> --}}
        </div>
    
    {{-- Tabla principal --}}

</div>
@endsection
