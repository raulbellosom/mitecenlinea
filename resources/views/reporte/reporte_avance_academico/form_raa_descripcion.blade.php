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
                                <th class="col-2">Acciones</th>
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
                                        <input type="hidden" value="{{$uni->id}}" id="id_reporte">
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar">
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="row m-2">
                    <div class="form-floating pb-2 col-12 col-lg-4">
                        <input id="no_unidad" class="form-control mr-2" name="no_unidad" type="number" placeholder="No. Unidad Evaluada" min="0" max="9" pattern="^[0-9]+">
                        <label for="no_unidad" class="pl-4">No. Unidad Evaluada</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-4">
                        <input id="no_alu_reprobados" class="form-control mr-2" name="no_alu_reprobados" type="number" placeholder="No. Alumnos Reprobados" min="0" max="9" pattern="^[0-9]+">
                        <label for="no_alu_reprobados" class="pl-4">No. Alum Reprobados</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-4">
                        <input id="porcentaje_reprobacion" class="form-control mr-2" name="porcentaje_reprobacion" type="number" placeholder="%. de Reprobacion" min="0" max="9" pattern="^[0-9]+">
                        <label for="porcentaje_reprobacion" class="pl-4">%. de Reprobacion</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="promedio_grupal" class="form-control mr-2" name="promedio_grupal" type="number" placeholder="Promedio de Calificaciones del grupo por unidad" min="0" max="9" pattern="^[0-9]+">
                        <label for="promedio_grupal" class="pl-4">Promedio de Calificaciones del grupo por unidad</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="porcentaje_asistencia" class="form-control mr-2" name="porcentaje_asistencia" type="number" placeholder="%. de Asistencia" min="0" max="9" pattern="^[0-9]+">
                        <label for="porcentaje_asistencia" class="pl-4">%. de Asistencia</label>
                    </div>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                    <input type="hidden" name="raa_id" id="raa_id" value="{{$raa->id}}">
                </div>  
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Añadir unidad" class="btn btn-success" id="enviar">
                    </div>
                </div>
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
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_analisis">
                                    @endif
                                </td>
                            </tr>  
                        </tbody>
                    </table>
                </div>
                <div class="pl-4 pr-4">
                    @if(!($anal_id))
                        <div class="form-floating mb-2">
                            <textarea class="form-control mr-sm-2" id="analisis_descripcion" placeholder="Descripción de la causa de reprobación" style="height: 100px;"></textarea>
                            <label for="analisis_descripcion">Descripción de la causa de reprobación</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea class="form-control mr-sm-2" id="analisis_acciones" placeholder="Acciones aplicadas y/o Causas de éxito de la Aprobación" style="height: 100px;"></textarea>
                            <label for="analisis_acciones">Acciones aplicadas y/o Causas de éxito de la Aprobación</label>
                        </div>
                    @endif
                </div>
                @if(!($anal_id))
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            <input type="submit" value="Agregar Analisis de Resultados" class="btn btn-success" id="btn_analisis">
                        </div>
                    </div> 
                @else
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input disabled type="submit" value="Agregar Analisis de Resultados" class="btn btn-success" id="btn_analisis">
                    </div>
                </div> 
                @endif
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
                                <input type="hidden" value="{{$pag_id}}" id="pag_id">
                                @if ($pag_id != 0)
                                <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_pag">
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
                    <div class="form-floating mb-2">
                        <textarea class="form-control mr-sm-2" id="tiempo_general" placeholder="Tiempo de ejecución e impacto en cronograma" style="height: 100px;"></textarea>
                        <label for="tiempo_general">Tiempo de ejecución e impacto en cronograma</label>
                    </div>
                @endif
            </div>
            @if(!($pag_id))
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            <input type="submit" value="Crear Plan de Accion General" class="btn btn-success" id="btn_pag">
                        </div>
                    </div> 
                @else
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input disabled type="submit" value="Crear Plan de Accion General" class="btn btn-success" id="btn_pag">
                    </div>
                </div> 
                @endif
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
                                <th class="col-3">{{Str::substr($datos->alumno_particular,3) }}</th>
                                <td class="col-3">{{Str::substr($datos->deficiencia_particular,3)}}</td>
                                <td class="col-4">{{Str::substr($datos->accion_particular,3)}},</td>
                                <td class="col-2">
                                    <input type="hidden" value="{{$datos->id}}" id="pap_id">
                                    <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_pap">
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
                        <textarea class="form-control mr-sm-2" id="deficiencia_particular" style="height: 100px;" placeholder="Deficiencias (temas, áreas, otros)"></textarea>
                        <label for="deficiencia_particular">Deficiencias (temas, áreas, otros) </label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea class="form-control mr-sm-2" id="accion_particular" style="height: 100px;" placeholder="Acción sugerida (Asesoría, Tutoría,  psicológica, etc.)"></textarea>
                        <label for="accion_particular">Acción sugerida (Asesoría, Tutoría,  psicológica, etc.)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Añadir Caso Particular" class="btn btn-success" id="btn_pap">
                    </div>
                </div>
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

    {{-- Script campos automaticos --}}

    <script>
        //-------------------- JavaScript para Evaluacion por unidad---------------------//
            let boton = document.getElementById("enviar");
            let btn_borrar = document.getElementById("borrar");
            let no_unidad =  document.getElementById('no_unidad');
            let no_alu_reprobados = document.getElementById('no_alu_reprobados');
            let porcentaje_reprobacion = document.getElementById('porcentaje_reprobacion');
            let promedio_grupal = document.getElementById('promedio_grupal');
            let porcentaje_asistencia = document.getElementById('porcentaje_asistencia');
            let raa_id = document.getElementById('raa_id');
            let id_reporte = document.getElementById('id_reporte');
            let _token = document.getElementById('token');

            boton.addEventListener("click", function(e){
                
                let datos = {no_unidad:no_unidad.value, no_alu_reprobados:no_alu_reprobados.value, raa_id:raa_id.value,
                    porcentaje_reprobacion:porcentaje_reprobacion.value, promedio_grupal:promedio_grupal.value, porcentaje_asistencia:porcentaje_asistencia.value
                }
                e.preventDefault();
               
                fetch('/reportec/public/reporte_avance_academico/evaluacion_por_unidad',{
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
                }).catch(error => {
                    console.log(error.message);
                })
            });

    //-------------------- JavaScript para Borrar Unidad---------------------//        
        if (btn_borrar) {
            btn_borrar.addEventListener("click", function(e){
                let borrar_dato = {id:id_reporte.value}
                e.preventDefault();

                fetch('/reportec/public/reporte_avance_academico/borrar_unidad',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(borrar_dato)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            });
        }

        //-------------------- JavaScript para Analisis ---------------------//
            let btn_analisis = document.getElementById('btn_analisis');
            let btn_borrar_analisis = document.getElementById("borrar_analisis");
            let analisis_descripcion = document.getElementById('analisis_descripcion');
            let analisis_acciones = document.getElementById('analisis_acciones');
            let descr_id = document.getElementById('descr_id');

            btn_analisis.addEventListener("click", function(e){
                
                let datos = {analisis_descripcion:analisis_descripcion.value, analisis_acciones:analisis_acciones.value, raa_id:raa_id.value}
                e.preventDefault();
               
                fetch('/reportec/public/reporte_avance_academico/crear_analisis',{
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

        //-------------------- JavaScript para Borrar Analisis---------------------//
            if (btn_borrar_analisis) {
                btn_borrar_analisis.addEventListener("click", function(e){
                let borrar_dato = {id:descr_id.value}
                e.preventDefault();
                
                fetch('/reportec/public/reporte_avance_academico/borrar_analisis',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(borrar_dato)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            });
            }

        //-------------------- JavaScript para Plan General---------------------//
            let boton_pag = document.getElementById('btn_pag');
            let btn_borrar_pag = document.getElementById("borrar_pag");
            let deficiencia_general = document.getElementById('deficiencia_general');
            let accion_general = document.getElementById('accion_general');
            let tiempo_general = document.getElementById('tiempo_general');
            let pag_id = document.getElementById('pag_id');

            boton_pag.addEventListener("click", function(e){
                
                let datos = {deficiencia_general:deficiencia_general.value, accion_general:accion_general.value, tiempo_general:tiempo_general.value, raa_id:raa_id.value}
                e.preventDefault();
               
                fetch('/reportec/public/reporte_avance_academico/agregar_pag',{
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

        //-------------------- JavaScript para Borrar Plan General---------------------//
            if (btn_borrar_pag) {
                btn_borrar_pag.addEventListener("click", function(e){
                let borrar_dato = {id:pag_id.value}
                e.preventDefault();
                
                fetch('/reportec/public/reporte_avance_academico/borrar_pag',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(borrar_dato)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
            });
            }
            
    //-------------------- JavaScript para Plan Particular---------------------//
            let boton_pap = document.getElementById('btn_pap');
            let btn_borrar_pap = document.getElementById("borrar_pap");
            let alumno_particular = document.getElementById('alumno_particular');
            let deficiencia_particular = document.getElementById('deficiencia_particular');
            let accion_particular = document.getElementById('accion_particular');
            let pap_id = document.getElementById('pap_id');
            var contador = (document.getElementById("particular").rows.length);
            // console.log(contador);

            boton_pap.addEventListener("click", function(e){
                
                let datos = {alumno_particular:contador+ ". " + alumno_particular.value, deficiencia_particular:contador+ ". " +deficiencia_particular.value, 
                accion_particular:contador+ ". " +accion_particular.value, raa_id:raa_id.value}
                e.preventDefault();
               
                fetch('/reportec/public/reporte_avance_academico/agregar_pap',{
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
            });
            //-------------------- JavaScript para Borrar Plan Particular---------------------//
            if (btn_borrar_pap) {
                btn_borrar_pap.addEventListener("click", function(e){
                let borrar_dato = {id:pap_id.value}
                e.preventDefault();

                fetch('/reportec/public/reporte_avance_academico/borrar_pap',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(borrar_dato)
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    location.reload()
                }).catch(error => {
                    console.log(error.message);
                })
                });
            }

    </script>
    {{-- Script campos automaticos --}}
</div>
@endsection