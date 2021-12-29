@extends('layouts.light')
@section('content')
{{-- Container --}}
<div class="container">
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        @endif
    {{-- Tabla superior perfil --}}
        <div class="col-sm-12  row-sm-12 mt-4">
            <div class="mt-5 ml-4 mr-4 d-flex justify-content-between"> 
                <div>
                    <h5 class="font-weight-bold text-uppercase">Información del usuario</h5>
                </div>
                <div>
        
                    {{-- <a href="{{url('/infoUser/'.$users->id.'/edit') }}" class="btn btn-outline-primary m-auto"> --}}
                    @if($info_user=1)
                        <a href="{{url('/infoUser/'.$users->id.'/edit') }}" class="btn btn-outline-primary m-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Editar Perfil
                        </a>
                    @else
                        <a href="{{url('infoUser/create') }}" class="btn btn-outline-primary m-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Crear Perfil
                        </a>
                    @endif
                    
                    {{-- <p>{{$info_user}}</p> --}}
                    
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <table class="table table-light">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th colspan="2" class="text-center">Datos docente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td class="text-center" rowspan="2">
                                <p>
                                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$imagen}}" width="200px" alt="imagenUsuario">
                                    
                                </p> 
                                Nombre <p class="font-weight-bold">{{$users->name}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Correo {{$users->email}}</p> 
                                @foreach ($infos as $info)
                                    <p>Telefono {{$info->telefono}}</p>
                                    <p>Direccion {{$info->direccion}}</p>
                                    <p>Edad {{$info->edad}}</p>
                                    <p>Curp {{$info->curp}}</p>
                                    <p>NSS {{$info->nss}}</p>
                                    <p>RFC {{$info->rfc}}</p>
                                    <p>Genero {{$info->genero}}</p>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    {{-- Tabla superior perfil --}}

    
</div>
{{-- Container --}}
@endsection