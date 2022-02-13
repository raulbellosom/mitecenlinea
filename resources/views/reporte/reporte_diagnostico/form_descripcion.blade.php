@extends('layouts.light')

@section('content')
<div class="container bg-white">
    <div class="bg-light p-4 d-flex justify-content-end justify-content-md-between">
        <div class="mr-3">
            <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Regresar
            </a>
        </div>
        <div class="d-flex">
            @if ($reporte_diagnostico->status == 1)
                <form action="{{url('/reporte_diagnostico/'.$reporte_diagnostico->id)}}" method="POST">
                    @csrf
                    {{method_field('PATCH')}}
                    <input type="hidden" value="2" id="status" name="status">
                    <input type="hidden" value="{{$reporte_diagnostico->id}}" id="id" name="id">
                    <button  class="btn btn-outline-primary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                        </svg>
                        Finalizar Reporte
                    </button>
                </form>
            @endif
            @if ($reporte_diagnostico->status == 2)
                <form action="{{url('/downloadPDF/'.$reporte_diagnostico->id)}}" method="GET">
                    
                    <button  class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Descargar reporte
                    </button>
                </form>
            @endif
        </div>
    </div>
            @if(Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

        @if (count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach( $errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Titulo --}}
            <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                 Reporte Diagnostico
            </div>
        {{-- Titulo --}}

        {{-- Tabla principal --}}
            <div class="d-flex justify-content-between bg-light">
                <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Fecha de elaboración</th>
                            <th>Tipo de reporte</th>
                            <th>Carrera</th>
                            <th>Asignatura</th>
                            <th>Grado Grupo</th>
                            <th>Turno</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$reporte_diagnostico->created_at}}</td>
                            <td>{{$reporte_diagnostico->nombre_reporte}}</td>
                            <td>{{$reporte_diagnostico->carrera}}</td>
                            <td>{{$reporte_diagnostico->asignatura}}</td>
                            <td>{{$reporte_diagnostico->grado}} {{$reporte_diagnostico->grupo}}</td>
                            <td>{{$reporte_diagnostico->turno}}</td>
                            <td class="font-weight-bold">
                                @switch($reporte_diagnostico->status)
                                    @case(1)
                                        <label class="text-danger">Incompleto</label> 
                                        @break
                                    @case(2)
                                        <label class="text-primary">Finalizado</label>
                                        @break
                                    @default
                                        Incompleto
                                @endswitch
                            </td> 
                        </tr>  
                    </tbody>
                </table>
            </div>
        {{-- Tabla principal --}}

        {{-- Conocimientos y competecias --}}
            <div class="bg-light">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Conocimientos, competencias especificas y/o genericas previas
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="col-8" >Competencia</th>
                                <th class="col-2 text-center">Nivel alcanzado</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($competencia as $comp)
                            <tr>
                                <td class="col-8">{{$comp->competencia}}</td>
                                <td class="col-2 text-center">
                                    @if ($comp->ponderacion==0)
                                        Nulo
                                    @endif
                                    @if ($comp->ponderacion==1)
                                        Bajo
                                    @endif
                                    @if ($comp->ponderacion==2)
                                        Aceptable
                                    @endif
                                    @if ($comp->ponderacion==3)
                                        Bueno
                                    @endif
                                </td>
                                <td class="col-2">
                                    {{-- @if ($comp->id) --}}
                                        <form action="{{ url('/rd_competencia/'.$comp->id) }}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('¿Deseas borrar esta competencia?')" 
                                            value="Borrar" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                                Borrar
                                            </button>
                                        </form>
                                    {{-- @endif --}}
                                    
                                </td>
                            </tr>
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <form action="{{url('/rd_competencia')}}" method="POST" enctype="multipart/form-data">
                    <div class="row m-2 m-md-2">
                        <div class="form-floating col-8" >
                            <input class="form-control" name="competencia" type="text" placeholder="Descripcion de la competencia" id="competencia" >
                            <label class="pl-4" for="competencia">Competencia</label>
                        </div>
                        <div class="form-floating col-4">
                            <select class="form-control" name="ponderacion" id="ponderacion">
                                <option value="" hidden></option>
                                <option value="0">Nulo</option>
                                <option value="1">Bajo</option>
                                <option value="2">Aceptable</option>
                                <option value="3">Bueno</option>
                            </select>
                            <label class="pl-4" for="ponderacion">Nivel</label>
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="r_diagnostico_id" id="r_diagnostico_id" value="{{$reporte_diagnostico->id}}" >
                    </div>  
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            {{-- <input type="submit" value="Añadir competencia" class="btn btn-success" id="enviar"> --}}
                                @csrf
                                <div>
                                    <button class="btn btn-outline-success" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                                        </svg>
                                        Añadir Competencias
                                    </button>
                                </div>
                        </div>
                    </div>
                </form>
            </div>

        {{-- Conocimientos y competecias --}}
        
        {{-- Plan accion general --}}
            <div class="pb-4 bg-light ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción general
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="col-4" >Deficiencia General</th>
                                <th class="col-4 text-center">Accion Sugeridas</th>
                                <th class="col-2 text-center">Tiempo de Ejecucion</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-4">{{$pag_def}}</td>
                                <td class="col-4 text-center">{{$pag_ac}}</td>
                                <td class="col-2 text-center">{{$pag_time}}</td>
                                <td class="col-2">
                                    {{-- <input type="hidden" value="{{$pag_id}}" id="pag_id">
                                    @if ($pag_id != 0)
                                    <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_pag">
                                    @endif --}}
                                    @if ($pag_id != 0)
                                        <form action="{{ url('/rd_pag/'.$pag_id) }}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('¿Deseas borrar este Plan de Acción General?')" 
                                            value="Borrar" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                                Borrar
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>  
                        </tbody>
                    </table>
                </div>
                
                <div class="pl-4 pr-4">
                    @if(!($pag_id))
                    <div class="form-floating mb-2">
                        <textarea class="form-control mr-sm-2" id="deficiencia_general" placeholder="Deficiencias" style="height: 100px;"></textarea>
                        <label for="deficiencia_general">Deficiencias</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea class="form-control mr-sm-2" id="accion_general" placeholder="Acciones sugeridas y recursos necesarios" style="height: 100px;"></textarea>
                        <label for="accion_general">Acciones sugeridas y recursos necesarios </label>
                    </div>
                    <div class="form-floating mb-2" >
                        <textarea class="form-control mr-sm-2" id="tiempo_general" placeholder="Tiempo de ejecución e impacto en cronograma" style="height: 100px;"></textarea>
                        <label for="tiempo_general">Tiempo de ejecución e impacto en cronograma</label>
                    </div>
                    @endif
                </div>
                <div class="row">
                    @if(!($pag_id))
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Crear Plan de Accion General" class="btn btn-success" id="btn_pag">
                    </div>
                    @else
                    <div class="col-md-12 text-center mb-4">
                        <div>
                            <input type="submit" value="Crear Plan de Accion General" class="btn btn-warning" id="btn_pag" name="btn_pag" disabled>
                        </div>
                        
                        <label class="text-danger" for="btn_pag">Para capturar un nuevo Plan de Accion General debe eliminar el actual.</label>
                    </div>
                    @endif
                </div>
            </div>
        {{-- Plan accion general --}}

        {{-- Plan accion particular --}}
            <div class="pb-4 bg-light ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción particular
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table id="particular" class="table table-responsive-sm table-responsive-md table-white table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="col-3">Nombre del alumno</th>
                                <th class="col-3 text-center">Deficiencias</th>
                                <th class="col-4 text-center">Accion sugerida</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pap as $paps)
                            @foreach ($paps as $datos)
                            <tr>
                                <th class="col-3">{{Str::substr($datos->alumno_particular,3) }}</th>
                                <td class="col-3">{{Str::substr($datos->deficiencia_particular,3)}}</td>
                                <td class="col-4">{{Str::substr($datos->accion_particular,3)}}</td>
                                <td class="col-2">
                                    <form action="{{ url('/rd_pap/'.$datos->id) }}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('¿Deseas borrar este Plan de Acción Particular?')" 
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
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <div class="pl-4 pr-4">
                    <div class="form-floating mb-2">
                        <input class="form-control mr-sm-2" id="alumno_particular" placeholder="Nombre del alumno">
                        <label for="alumno_particular"> Nombre del alumno </label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea class="form-control mr-sm-2" id="deficiencia_particular" placeholder="Deficiencias (temas, áreas, otros) " style="height: 100px;"></textarea>
                        <label for="deficiencia_particular">Deficiencias (temas, áreas, otros) </label>
                    </div>
                    <div class="form-floating mb-2" >
                        <textarea class="form-control mr-sm-2" id="accion_particular" placeholder="Acción sugerida (academica, psicologica, etc)" style="height: 100px;"></textarea>
                        <label for="accion_particular">Acción sugerida (academica, psicologica, etc)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Añadir Caso Particular" class="btn btn-success" id="btn_pap">
                    </div>
                </div>
            </div>
        {{-- Plan accion particular --}}

        {{-- Botones  --}}
            <div class=" bg-light p-4 d-flex justify-content-end justify-content-md-between">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div class="d-flex">
                    @if ($reporte_diagnostico->status == 1)
                        <form action="{{url('/reporte_diagnostico/'.$reporte_diagnostico->id)}}" method="POST">
                            @csrf
                            {{method_field('PATCH')}}
                            <input type="hidden" value="2" id="status" name="status">
                            <input type="hidden" value="{{$reporte_diagnostico->id}}" id="id" name="id">
                            <button  class="btn btn-outline-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                </svg>
                                Finalizar Reporte
                            </button>
                        </form>
                    @endif
                    @if ($reporte_diagnostico->status == 2)
                        <form action="{{url('/downloadPDF/'.$reporte_diagnostico->id)}}" method="GET">
                            
                            <button  class="btn btn-outline-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                                Descargar reporte
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        {{-- Botones --}}
    {{-- Fin Formulario Reporte --}}
    </div>

    {{-- Script campos automaticos --}}

    <script>
            // let boton = document.getElementById("enviar");
            // let btn_borrar = document.getElementById("borrar");
            // let competencia =  document.getElementById('competencia');
            // let ponderacion = document.getElementById('ponderacion');
            // let r_diagnostico_id = document.getElementById('r_diagnostico_id');
            // let id_reporte = document.getElementById('id_reporte');
            // let _token = document.getElementById('token');
            // let x = 0;

            // boton.addEventListener("click", function(e){
                
            //     let datos = {competencia:competencia.value, ponderacion:ponderacion.value, r_diagnostico_id:r_diagnostico_id.value}
            //     e.preventDefault();
               
            //     fetch('/public/reporte_diagnostico/competencia',{
            //         method: 'post',
            //         headers: {
            //             'X-CSRF-TOKEN': _token.value,
            //             'Content-Type': 'application/json',
            //         },
            //         body: JSON.stringify(datos)
            //     }).then(response => response.json())
            //     .then(data => {
            //         // console.log(data);
            //         location.reload()
            //     }).catch(error => {
            //         console.log(error.message);
            //     })
            // });
            

            
            // btn_borrar.addEventListener("click", function(e){
            //     let borrar_dato = {id:id_reporte.value}
            //     e.preventDefault();

            //     fetch('/reportec/public/reporte_diagnostico/borrar_competencia',{
            //         method: 'post',
            //         headers: {
            //             'X-CSRF-TOKEN': _token.value,
            //             'Content-Type': 'application/json',
            //         },
            //         body: JSON.stringify(borrar_dato)
            //     }).then(response => response.json())
            //     .then(data => {
            //         // console.log(data);
            //         location.reload()
            //     }).catch(error => {
            //         console.log(error.message);
            //     })
            // });

            let boton_pag = document.getElementById('btn_pag');
            let deficiencia_general = document.getElementById('deficiencia_general');
            let accion_general = document.getElementById('accion_general');
            let tiempo_general = document.getElementById('tiempo_general');
            let pag_id = document.getElementById('pag_id');

            boton_pag.addEventListener("click", function(e){
                
                let datos = {deficiencia_general:deficiencia_general.value, accion_general:accion_general.value, tiempo_general:tiempo_general.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/reportec/public/reporte_diagnostico/pag',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(datos)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                    clearInput();
                }).catch(error => {
                    console.log(error.message);
                })
            });
            

            let boton_pap = document.getElementById('btn_pap');
            let btn_borrar_pap = document.getElementById("borrar_pap");
            let alumno_particular = document.getElementById('alumno_particular');
            let deficiencia_particular = document.getElementById('deficiencia_particular');
            let accion_particular = document.getElementById('accion_particular');
            let pap_id = document.getElementById('pap_id');
            var contador = (document.getElementById("particular").rows.length);
            // console.log(contador);
            // let alumn = contador + alumno_particular.value;

            boton_pap.addEventListener("click", function(e){
                
                let datos = {alumno_particular:contador+ ". " + alumno_particular.value, deficiencia_particular:contador+ ". " +deficiencia_particular.value, 
                accion_particular:contador+ ". " +accion_particular.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/reportec/public/reporte_diagnostico/pap',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(datos)
                }).then(response => response.json())
                .then(data => {
                    
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            })
        
            


    </script>
    {{-- Script campos automaticos --}}
</div>
@endsection