@extends('layouts.light')

@section('content')
<div class="container bg-white">
    <div class="pt-4 d-flex justify-content-end justify-content-md-between">
        <div class="mr-3">
            <a class="btn btn-outline-danger" href="{{url('reporte_avance_academico/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Regresar
            </a>
        </div>
        <div>
            <form action="{{url('/downloadPDF/'.$raa->id)}}" method="GET">
                
                <button  class="btn btn-outline-success" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>
                    Descargar reporte
                </button>
            </form>
            {{-- <input type="submit" value="Descargar" class="btn btn-outline-success" id="btn_descargar"> --}}
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
                 Reporte Diagnostico
            </div>
        {{-- Titulo --}}

        {{-- Tabla principal --}}
            <div class="d-flex justify-content-between">
                <table class="table table-responsive-sm table-responsive-md table-light table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Fecha de elaboración</th>
                            <th>Tipo de reporte</th>
                            <th>Carrera</th>
                            <th>Asignatura</th>
                            <th>Grado Grupo</th>
                            <th>Turno</th>
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
                        </tr>  
                    </tbody>
                </table>
            </div>
        {{-- Tabla principal --}}

        {{-- Unidad --}}
            <div class="mb-4 bg-white">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Evaluacion por unidad
                </div>
                <div class="container">
                    <div class="row">
                        <table class="table table-light table-striped table-responsive-sm table-responsive-md">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="col-2" >No. Unidad Evaluada</th>
                                    <th class="col-2 text-center">No. Alumnos Reprobados</th>
                                    <th class="col-2">% de Reprobacion</th>
                                    <th class="col-4">Promedio de calificaciones del grupo por unidad (considerar el total de alumnos en lista)</th>
                                    <th class="col-2">% de Asistencia</th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{-- <form class="row" id="form_contacto" method="POST" enctype="multipart/form-data"> --}}
                    <div class="row">
                        <div class="form-group col-6 col-sm-6 col-md-2">
                            <label for="grado" class="col-form-label font-weight-bold pr-2">No. Unidad Evaluada</label>
                            <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="No. Unidad Evaluada" min="0" max="9" pattern="^[0-9]+">
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-2">
                            <label for="grado" class="col-form-label font-weight-bold pr-2">No. Alum Reprobados</label>
                            <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="No. Alumnos Reprobados" min="0" max="9" pattern="^[0-9]+">
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-2">
                            <label for="grado" class="col-form-label font-weight-bold pr-2">%. de Reprobacion</label>
                            <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="%. de Reprobacion" min="0" max="9" pattern="^[0-9]+">
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-4">
                            <label for="grado" class="col-form-label font-weight-bold pr-2">Promedio de Calificaciones del grupo por unidad</label>
                            <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="Promedio de Calificaciones del grupo por unidad" min="0" max="9" pattern="^[0-9]+">
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-2">
                            <label for="grado" class="col-form-label font-weight-bold pr-2">%. de Asistencia</label>
                            <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="%. de Asistencia" min="0" max="9" pattern="^[0-9]+">
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="r_diagnostico_id" id="r_diagnostico_id" value="{{$raa->id}}" >
                    </div>  
                    {{-- </form> --}}
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Añadir unidad" class="btn btn-success" id="enviar">
                    </div>
                </div>
            </div>

        {{-- Unidad --}}
        
        {{-- Analisis de resultados --}}
            <div class="mb-4 pb-4 bg-white ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Analisis de resultados (Rertroalimentación)
                </div>
                <div class="container">
                    <div class="row">
                        <table class="table table-light table-striped table-responsive-sm table-responsive-md">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="col-4" >Descripción de la causa de reprobación</th>
                                    <th class="col-4 text-center">Acciones aplicadas y/o Causas de éxito de la Aprobación</th>
                                    <th class="col-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="col-4"></th>
                                    <th class="col-4 text-center"></th>
                                    {{-- <th class="col-2">
                                        <input type="hidden" value="{{$pag_id}}" id="pag_id">
                                        @if ($pag_id != 0)
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_pag">
                                        @endif
                                        
                                    </th> --}}
                                    <th></th>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mw-100 pl-4 pr-4">
                    
                    <div class="mb-3">
                        Descripción de la causa de reprobación
                        <textarea class="form-control mr-sm-2" id="deficiencia_general" id="" cols="" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        Acciones aplicadas y/o Causas de éxito de la Aprobación
                        <textarea class="form-control mr-sm-2" id="accion_general" cols="" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Agregar Analisis de Resultados" class="btn btn-success" id="btn_pag">
                    </div>
                </div>
            </div>
        {{-- Analisis de resultados --}}

        {{-- Plan accion general --}}
        <div class="mb-4 pb-4 bg-white ">
            <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                Plan de acción general
            </div>
            <div class="container">
                <div class="row">
                    <table class="table table-light table-striped table-responsive-sm table-responsive-md">
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
                                {{-- <th class="col-4">{{$pag_def}}</th>
                                <th class="col-4 text-center">{{$pag_ac}}</th>
                                <th class="col-2 text-center">{{$pag_time}}</th>
                                <th class="col-2">
                                    <input type="hidden" value="{{$pag_id}}" id="pag_id">
                                    @if ($pag_id != 0)
                                    <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_pag">
                                    @endif
                                    
                                </th> --}}
                            </tr>  
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mw-100 pl-4 pr-4">
                {{-- @if(!($pag_id)) --}}
                <div class="mb-3">
                    Deficiencias 
                    <textarea class="form-control mr-sm-2" id="deficiencia_general" id="" cols="" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    Acciones sugeridas y recursos necesarios 
                    <textarea class="form-control mr-sm-2" id="accion_general" cols="" rows="3"></textarea>
                </div>
                <div class="mb-3" >
                    Tiempo de ejecución e impacto en cronograma
                    <textarea class="form-control mr-sm-2" id="tiempo_general" cols="" rows="2"></textarea>
                </div>
                {{-- @endif --}}
            </div>
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <input type="submit" value="Crear Plan de Accion General" class="btn btn-success" id="btn_pag">
                </div>
            </div>
        </div>
    {{-- Plan accion general --}}

        {{-- Plan accion particular --}}
            <div class="mb-4 pb-4 bg-white ">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Plan de acción particular
                </div>
                <div class="container">
                    <div class="row">
                        <table id="particular" class="table table-light table-striped table-responsive-sm table-responsive-md">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="col-3" >Nombre del alumno</th>
                                    <th class="col-3 text-center">Deficiencias</th>
                                    <th class="col-4 text-center">Accion sugerida</th>
                                    <th class="col-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach ($pap as $paps)
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
                            @endforeach      --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mw-100 pl-4 pr-4">
                    <div class="mb-2">
                        Nombre del alumno 
                        <input class="form-control mr-sm-2" id="alumno_particular">
                    </div>
                    <div class="mb-2">
                        Deficiencias (temas, áreas, otros) 
                        <textarea class="form-control mr-sm-2" id="deficiencia_particular" rows="2"></textarea>
                    </div>
                    <div class="mb-2" >
                        Acción sugerida (Asesoría, Tutoría,  psicológica, etc.)
                        <textarea class="form-control mr-sm-2" id="accion_particular" rows="2"></textarea>
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
                <div>
                    <form action="{{url('/downloadPDF/'.$raa->id)}}" method="GET">
                        
                        <button  class="btn btn-outline-success" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Descargar reporte
                        </button>
                    </form>
                    {{-- <input type="submit" value="Descargar" class="btn btn-outline-success" id="btn_descargar"> --}}
                </div>
            </div>
        {{-- Botones --}}
    {{-- Fin Formulario Reporte --}}
    </div>

    {{-- Script campos automaticos --}}

    <script>
            let boton = document.getElementById("enviar");
            let btn_borrar = document.getElementById("borrar");
            let competencia =  document.getElementById('competencia');
            let ponderacion = document.getElementById('ponderacion');
            let r_diagnostico_id = document.getElementById('r_diagnostico_id');
            let id_reporte = document.getElementById('id_reporte');
            let _token = document.getElementById('token');

            boton.addEventListener("click", function(e){
                
                let datos = {competencia:competencia.value, ponderacion:ponderacion.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/sisrad/public/reporte_diagnostico/competencia',{
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

            
            btn_borrar.addEventListener("click", function(e){
                let borrar_dato = {id:id_reporte.value}
                e.preventDefault();

                fetch('/sisrad/public/reporte_diagnostico/borrar_competencia',{
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

            let boton_pag = document.getElementById('btn_pag');
            let btn_borrar_pag = document.getElementById("borrar_pag");
            let deficiencia_general = document.getElementById('deficiencia_general');
            let accion_general = document.getElementById('accion_general');
            let tiempo_general = document.getElementById('tiempo_general');
            let pag_id = document.getElementById('pag_id');

            boton_pag.addEventListener("click", function(e){
                
                let datos = {deficiencia_general:deficiencia_general.value, accion_general:accion_general.value, tiempo_general:tiempo_general.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/sisrad/public/reporte_diagnostico/pag',{
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

            if (btn_borrar_pag) {
                btn_borrar_pag.addEventListener("click", function(e){
                let borrar_dato = {id:pag_id.value}
                e.preventDefault();
                
                fetch('/sisrad/public/reporte_diagnostico/borrar_pag',{
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
            

            let boton_pap = document.getElementById('btn_pap');
            let btn_borrar_pap = document.getElementById("borrar_pap");
            let alumno_particular = document.getElementById('alumno_particular');
            let deficiencia_particular = document.getElementById('deficiencia_particular');
            let accion_particular = document.getElementById('accion_particular');
            let pap_id = document.getElementById('pap_id');
            var contador = (document.getElementById("particular").rows.length);
            console.log(contador);
            // let alumn = contador + alumno_particular.value;

            boton_pap.addEventListener("click", function(e){
                
                let datos = {alumno_particular:contador+ ". " + alumno_particular.value, deficiencia_particular:contador+ ". " +deficiencia_particular.value, 
                accion_particular:contador+ ". " +accion_particular.value, r_diagnostico_id:r_diagnostico_id.value}
                e.preventDefault();
               
                fetch('/sisrad/public/reporte_diagnostico/pap',{
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

            if (btn_borrar_pap) {
                btn_borrar_pap.addEventListener("click", function(e){
                let borrar_dato = {id:pap_id.value}
                e.preventDefault();

                fetch('/sisrad/public/reporte_diagnostico/borrar_pap',{
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