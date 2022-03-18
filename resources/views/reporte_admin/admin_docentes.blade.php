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
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <a class="navbar-brand text-dark" href="{{url('administrativo/')}}">Panel de Control</a>
            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <div class=" nav navbar-nav">
                    <a href="{{route('admin_docentes')}}" class="nav-link text-primary h6 mb-0" >Administrar Docentes</a>
                    <a href="{{route('admin_materias')}}" class="nav-link text-dark h6 mb-0">Administrar Materias</a>
                    <a href="{{route('admin_reportes')}}" class="nav-link text-dark h6 mb-0">Administrar Reportes</a>
                </div>
            </div>
        </nav>
    </div>
    {{-- Barra de navegación  --}}

    {{-- Tabla principal --}}
    <div class="bg-light pt-4 pb-4">
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
        <div class="col-sm-12 row-sm-12">
            <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-white table-striped">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo electronico</th>
                        <th class="text-center">Tipo de usuario</th>
                        <th class="text-center">Acciónes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="text-center">
                            @if ($user->typeUser == 1)
                                Docente
                            @endif
                            @if ($user->typeUser == 2)
                                Administrativo
                            @endif  
                        </td>
                        <td class="d-flex justify-content-center">
                            {{-- <a href="{{url('/users/'.$user->id.'/edit') }}" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Editar
                            </a> --}}
                            <form action="{{ url('/users/'.$user->id) }}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('¿Deseas borrar este docente realmente?')" 
                            value="Borrar" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Borrar
                            </button>
                            </form>
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
