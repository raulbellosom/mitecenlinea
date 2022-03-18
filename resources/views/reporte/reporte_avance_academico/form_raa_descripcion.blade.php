@extends('layouts.light')

@section('content')
<div class="container bg-light">
    <div class="pt-4 d-flex justify-content-end justify-content-md-between">
        <div class="mr-3">
            <a class="btn btn-outline-danger" href="{{url('reporte_avance_academico/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Regresar
            </a>
        </div>
        <div class="d-flex">
            @if ($raa->status == 1)
                <form action="{{url('/reporte_avance_academico/'.$raa->id)}}" method="POST">
                    @csrf
                    {{method_field('PATCH')}}
                    <input type="hidden" value="2" id="status" name="status">
                    <input type="hidden" value="{{$raa->id}}" id="id" name="id">
                    <button  class="btn btn-outline-primary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                        </svg>
                        Finalizar Reporte
                    </button>
                </form>
            @endif
            @if ($raa->status == 2)
                <form action="{{url('/download_reporte_avance_academico/'.$raa->id)}}" method="GET">
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
            <div class="bg-primary p-4 mt-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                 Reporte Avance Académico de Alumnos
            </div>
        {{-- Titulo --}}

        {{-- Tabla principal --}}
            <div class="d-flex justify-content-between">
                <table class="table table-responsive-sm table-responsive-md table-white table-striped text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Fecha de elaboración</th>
                            <th>Tipo de reporte</th>
                            <th>Carrera</th>
                            <th>Asignatura</th>
                            <th>Periodo del Corte</th>
                            <th>Grado Grupo</th>
                            <th>Turno</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$raa->created_at}}</td>
                            <td>{{$raa->nombre_reporte}}</td>
                            <td>{{$raa->carrera}}</td>
                            <td>{{$raa->asignatura}}</td>
                            <td>{{$raa->perido_corte}}</td>
                            <td>{{$raa->grado}} {{$raa->grupo}}</td>
                            <td>{{$raa->turno}}</td>
                            <td class="font-weight-bold">
                                @switch($raa->status)
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

        {{-- Unidad --}}
            <div class="bg-light">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Evaluacion por unidad
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="col-1" >No. Unidad Evaluada</th>
                                <th class="col-2 text-center">No. Alumnos Reprobados</th>
                                <th class="col-2">% de Reprobacion</th>
                                <th class="col-4">Promedio de calificaciones del grupo por unidad (considerar el total de alumnos en lista)</th>
                                <th class="col-1">% de Asistencia</th>
                                <th class="col-2 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unidad as $uni)
                                <tr class="text-center">
                                    <td>{{$uni->no_unidad}}</td>
                                    <td>{{$uni->no_alu_reprobados}}</td>
                                    <td>{{$uni->porcentaje_reprobacion}}</td>
                                    <td>{{$uni->promedio_grupal}}</td>
                                    <td>{{$uni->porcentaje_asistencia}}</td>
                                    <td class="col-2">
                                        <form action="{{ url('/raa_evaluacion_unidad/'.$uni->id) }}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('¿Deseas borrar esta Evaluación?')" 
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
                <form action="{{url('/raa_evaluacion_unidad')}}" method="POST" enctype="multipart/form-data">
                    <div class="row m-2">
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="no_unidad" class="form-control mr-2" name="no_unidad" type="number" placeholder="No. Unidad Evaluada" min="0" max="10" pattern="^[0-9]+">
                            <label for="no_unidad" class="pl-4">No. Unidad Evaluada</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="no_alu_reprobados" class="form-control mr-2" name="no_alu_reprobados" type="number" placeholder="No. Alumnos Reprobados" min="0" max="50" pattern="^[0-9]+">
                            <label for="no_alu_reprobados" class="pl-4">No. Alum Reprobados</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="porcentaje_reprobacion" class="form-control mr-2" name="porcentaje_reprobacion" type="number" placeholder="%. de Reprobacion" min="0" max="100" pattern="^[0-9]+">
                            <label for="porcentaje_reprobacion" class="pl-4">%. de Reprobacion</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="promedio_grupal" class="form-control mr-2" name="promedio_grupal" type="number" placeholder="Promedio de Calificaciones del grupo por unidad" min="0" max="100" pattern="^[0-9]+">
                            <label for="promedio_grupal" class="pl-4">Promedio de Calificaciones del grupo por unidad</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="porcentaje_asistencia" class="form-control mr-2" name="porcentaje_asistencia" type="number" placeholder="%. de Asistencia" min="0" max="100" pattern="^[0-9]+">
                            <label for="porcentaje_asistencia" class="pl-4">%. de Asistencia</label>
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="raa_id" id="raa_id" value="{{$raa->id}}">
                    </div>  
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            @csrf
                            <div>
                                <button class="btn btn-success" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    Guardar unidad
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        {{-- Unidad --}}
        
        {{-- Analisis de resultados --}}
            <div class="bg-light">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Analisis de resultados (Rertroalimentación)
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table class="table table-white table-striped table-responsive-sm table-responsive-md">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="col-4">Descripción de la causa de reprobación</th>
                                <th class="col-4">Acciones aplicadas y/o Causas de éxito de la Aprobación</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-4">{{$analisis_descripcion}}</td>
                                <td class="col-4 text-center">{{$analisis_acciones}} </td>
                                <td class="col-2">
                                    <input type="hidden" value="{{$anal_id}}" id="descr_id">
                                    @if ($anal_id != 0)
                                    <form action="{{ url('/raa_analisis_resultados/'.$anal_id) }}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('¿Deseas borrar el Analisis de Resultados?')" 
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
                <form action="{{url('/raa_analisis_resultados')}}" method="POST" enctype="multipart/form-data">
                    <div class="pl-4 pr-4">
                        @if(!($anal_id))
                            <div class="form-floating mb-2">
                                <textarea class="form-control mr-sm-2" name="analisis_descripcion" placeholder="Descripción de la causa de reprobación" style="height: 100px;"></textarea>
                                <label for="analisis_descripcion">Descripción de la causa de reprobación</label>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control mr-sm-2" name="analisis_acciones" placeholder="Acciones aplicadas y/o Causas de éxito de la Aprobación" style="height: 100px;"></textarea>
                                <label for="analisis_acciones">Acciones aplicadas y/o Causas de éxito de la Aprobación</label>
                            </div>
                            <input type="hidden" name="raa_id" id="raa_id" value="{{$raa->id}}">
                        @endif
                    </div>
                    @if(!($anal_id))
                        @csrf
                        <div class="col-md-12 text-center mb-4">
                            <button class="btn btn-outline-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Añadir Analisis de Resultados
                            </button>
                        </div>
                    @else
                    <div class="col-md-12 text-center mb-4">
                        <div>
                            <input disabled type="submit" value="Agregar Analisis de Resultados" class="btn btn-warning" id="btn_analisis" name="btn_analisis">
                        </div>
                        <label class="text-danger" for="btn_analisis">Para capturar un nuevo Analisis de Resultados debe borrar el actual.</label>
                    </div> 
                    @endif
                </form>
            </div>
        {{-- Analisis de resultados --}}

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
                                @if ($pag_id != 0)
                                    <form action="{{ url('/raa_pag/'.$pag_id) }}" method="POST">
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
            <form action="{{url('/raa_pag')}}" method="POST" enctype="multipart/form-data">
                <div class="pl-4 pr-4">
                    @if(!($pag_id))
                        @csrf
                        <div class="form-floating mb-2">
                            <textarea class="form-control mr-sm-2" name="deficiencia_general" placeholder="Deficiencias" style="height: 100px;"></textarea>
                            <label for="deficiencia_general">Deficiencias</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea class="form-control mr-sm-2" name="accion_general" placeholder="Acciones sugeridas y recursos necesarios" style="height: 100px;"></textarea>
                            <label for="accion_general">Acciones sugeridas y recursos necesarios </label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea class="form-control mr-sm-2" name="tiempo_general" placeholder="Tiempo de ejecución e impacto en cronograma" style="height: 100px;"></textarea>
                            <label for="tiempo_general">Tiempo de ejecución e impacto en cronograma</label>
                        </div>
                        <input type="hidden" name="raa_id" id="raa_id" value="{{$raa->id}}">
                    @endif
                </div>
                <div class="row">
                    @if(!($pag_id))
                    <div class="col-md-12 text-center mb-4">
                        <button class="btn btn-outline-success" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            Añadir Analisis de Resultados
                        </button>
                    </div>
                    @else
                    <div class="col-md-12 text-center mb-4">
                        <div>
                            <input type="submit" value="Crear Plan de Accion General" class="btn btn-warning" id="btn_pag" name="btn_pag" disabled>
                        </div>
                        <label class="text-danger" for="btn_pag">Para capturar un nuevo Plan de Accion General debe borrar el actual.</label>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    {{-- Plan accion general --}}

        {{-- Plan accion particular --}}
            <div class="mb-4 pb-4 bg-light ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción particular
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table id="particular" class="table table-white table-striped table-responsive-sm table-responsive-md">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="col-3" >Nombre del alumno</th>
                                <th class="col-3 text-center">Deficiencias</th>
                                <th class="col-4 text-center">Accion sugerida</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pap as $paps)
                            @foreach ($paps as $datos)
                            <tr>
                                {{-- <th class="col-3">{{Str::substr($datos->alumno_particular,3) }}</th>
                                <td class="col-3">{{Str::substr($datos->deficiencia_particular,3)}}</td>
                                <td class="col-4">{{Str::substr($datos->accion_particular,3)}},</td> --}}
                                <th class="col-3">{{$datos->alumno_particular}}</th>
                                <td class="col-3">{{$datos->deficiencia_particular}}</td>
                                <td class="col-4">{{$datos->accion_particular}},</td>
                                <td class="col-2">
                                    <form action="{{ url('/raa_pap/'.$datos->id) }}" method="POST">
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
                <form action="{{url('/raa_pap')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pl-4 pr-4">
                        <div class="form-floating mb-2">
                            <input class="form-control mr-sm-2" id="alumno_particular" name="alumno_particular" placeholder="Nombre del alumno">
                            <label for="alumno_particular"> Nombre del alumno </label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea class="form-control mr-sm-2" id="deficiencia_particular" name="deficiencia_particular" placeholder="Deficiencias (temas, áreas, otros) " style="height: 100px;"></textarea>
                            <label for="deficiencia_particular">Deficiencias (temas, áreas, otros) </label>
                        </div>
                        <div class="form-floating mb-2" >
                            <textarea class="form-control mr-sm-2" id="accion_particular" name="accion_particular" placeholder="Acción sugerida (academica, psicologica, etc)" style="height: 100px;"></textarea>
                            <label for="accion_particular">Acción sugerida (academica, psicologica, etc)</label>
                        </div>
                        <input type="hidden" name="raa_id" id="raa_id" value="{{$raa->id}}">
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            {{-- <input type="submit" value="Añadir Caso Particular" class="btn btn-success" id="btn_pap"> --}}
                            <button class="btn btn-outline-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Añadir Plan de Acción Particular
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        {{-- Plan accion general --}}

        {{-- Botones  --}}
            <div class=" pb-4 d-flex justify-content-end justify-content-md-between">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_avance_academico/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div class="d-flex">
                    @if ($raa->status == 1)
                        <form action="{{url('/reporte_avance_academico/'.$raa->id)}}" method="POST">
                            @csrf
                            {{method_field('PATCH')}}
                            <input type="hidden" value="2" id="status" name="status">
                            <input type="hidden" value="{{$raa->id}}" id="id" name="id">
                            <button  class="btn btn-outline-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                </svg>
                                Finalizar Reporte
                            </button>
                        </form>
                    @endif
                    @if ($raa->status == 2)
                        <form action="{{url('/download_reporte_avance_academico/'.$raa->id)}}" method="GET">
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

</div>
@endsection