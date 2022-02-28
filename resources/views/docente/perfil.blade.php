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
        <div class="bg-light pt-4 pb-4">
            <table class="table table-white">
                <thead class="bg-primary text-white m-4">
                    <tr>
                        <th class="text-center" >Información del usuario
                            
                        </th>
                        <th>
                            <div>
                                <button class="btn btn-outline-light" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                        <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                                    </svg>
                                    Cambiar contraseña
                                </button>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="d-flex justify-content-center">
                            <div class="pl-5">
                                <p>
                                    @if ($imagen!=null)
                                        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$imagen}}" width="150px" alt="imagenUsuario">
                                    @else
                                        <img class="img-thumbnail img-fluid" src="{{asset('/assets/img/tec-vallarta.jpg')}}" width="150px" alt="imagenUsuario">
                                    @endif
                                </p> 
                            </div>
                            <div class="pl-5">
                                <p><label class="font-weight-bold pr-2"> Nombre </label>{{$users->name}}</p> 

                                <p><label class="font-weight-bold pr-2">Correo electronico</label>{{$users->email}}</p> 
                                <p><label class="font-weight-bold pr-2">Tipo de usuario </label>
                                @if ($users->typeUser == '1')
                                    Docente
                                @endif
                                @if ($users->typeUser == '2')
                                    Administrativo
                                @endif
                                @if ($users->typeUser == '3')
                                    Docente - Administrativo
                                @endif
                                @if ($users->typeUser == '4')
                                    Usuario Maestro
                                @endif  
                                </p> 
                            </div>
                        </td>
                    </tr>
                </tbody> 
            </table>
            {{-- <table class="table table-white">
                <thead class="bg-primary text-white m-4">
                    <tr>
                        <th class="text-center" >Cambiar contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="d-flex justify-content-center">
                            <form action="{{url('/user/'.$users->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-floating col-12  pb-4 ">
                                    <input id="password" name="password" class="form-control mr-2" type="text" placeholder="Actual Contraseña"
                                    >                        
                                    <label for="password" class="pl-4">Actual Contraseña</label>
                                </div>
                                <div class="form-floating col-12 pb-4">
                                    <input id="new_password" class="form-control mr-2" name="new_password" type="text" placeholder="Nueva Contraseña" 
                                    >
                                    <label for="new_password" class="pl-4">Nueva Contraseña</label>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                            <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                            <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                                        </svg>
                                        Cambiar contraseña
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table> --}}
    {{-- Perfil --}}
</div>
{{-- Container --}}
@endsection