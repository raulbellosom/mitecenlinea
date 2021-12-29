@extends('layouts.light')

@section('content')
<div class="container bg-light">
    <div class="pt-4 d-flex justify-content-end justify-content-md-between">
        <div class="mr-3">
            <a class="btn btn-outline-danger" href="{{url('reporte_avance_programatico/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Regresar
            </a>
        </div>
        <div>
            <form action="{{url('/downloadPDF/'.$rap->id)}}" method="GET">
                
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
                 Reporte Avance Programático
            </div>
        {{-- Titulo --}}

        {{-- Tabla principal --}}
            <div class="d-flex justify-content-between">
                <table class="table table-responsive-sm table-responsive-md table-white table-striped">
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
                            <td>{{$rap->created_at}}</td>
                            <td>{{$rap->nombre_reporte}}</td>
                            <td>{{$rap->carrera}}</td>
                            <td>{{$rap->asignatura}}</td>
                            <td>{{$rap->grado}} {{$rap->grupo}}</td>
                            <td>{{$rap->turno}}</td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        {{-- Tabla principal --}}

        {{-- Unidad --}}
            <div class="bg-light">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Descripción de la Unidad
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                        <thead class="bg-primary text-white">
                            <tr class="text-center">
                                <th class="col-1">Unidad</th>
                                <th class="col-3">Nombre de la Unidad</th>
                                <th class="col-1">% De Avance</th>
                                <th class="col-1">No. de Criterios Aplicados a la Unidad</th>
                                <th class="col-2">% De Alumnos Aprobados (por unidad)</th>
                                <th class="col-2">Prom. de Calificaciones por Unidad (Solo de los alumnos aprobados)</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unidad as $uni)
                                <tr class="text-center">
                                    <td class="col-1">{{$uni->no_unidad}}</td>
                                    <td class="col-3">{{$uni->nombre_unidad}}</td>
                                    <td class="col-1">{{$uni->porcentaje_avance}}</td>
                                    <td class="col-1">{{$uni->no_criterios}}</td>
                                    <td class="col-2">{{$uni->porcentaje_alumnos_aprobados}}</td>
                                    <td class="col-2">{{$uni->promedio_calificaciones}}</td>
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
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="no_unidad" class="form-control mr-2" name="no_unidad" type="number" placeholder="No. Unidad Evaluada" min="0" max="9" pattern="^[0-9]+">
                        <label for="no_unidad" class="pl-4">Unidad</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="nombre_unidad" class="form-control mr-2" name="nombre_unidad" type="text" placeholder="No. Alumnos Reprobados">
                        <label for="nombre_unidad" class="pl-4">Nombre de la Unidad</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="porcentaje_avance" class="form-control mr-2" name="porcentaje_avance" type="number" placeholder="% De Avance" min="0" max="9" pattern="^[0-9]+">
                        <label for="porcentaje_avance" class="pl-4">% De Avance</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="no_criterios" class="form-control mr-2" name="no_criterios" type="number" placeholder="No. de Criterios Aplicados a la Unidad" min="0">
                        <label for="no_criterios" class="pl-4">No. de Criterios Aplicados a la Unidad</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="porcentaje_alumnos_aprobados" class="form-control mr-2" name="porcentaje_alumnos_aprobados" type="number" placeholder="% De Alumnos Aprobados (por unidad)" min="0">
                        <label for="porcentaje_alumnos_aprobados" class="pl-4">% De Alumnos Aprobados (por unidad)</label>
                    </div>
                    <div class="form-floating pb-2 col-12 col-lg-6">
                        <input id="promedio_calificaciones" class="form-control mr-2" name="promedio_calificaciones" type="number" placeholder="Prom. de Calificaciones por Unidad (Solo de los alumnos aprobados)" min="0" max="100">
                        <label for="promedio_calificaciones" class="pl-4">Prom. de Calificaciones por Unidad (Solo de los alumnos aprobados)</label>
                    </div>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                    <input type="hidden" name="rap_id" id="rap_id" value="{{$rap->id}}">
                </div>  
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input type="submit" value="Añadir unidad" class="btn btn-success" id="enviar">
                    </div>
                </div>
            </div>

        {{-- Unidad --}}
        
        {{-- Desglose de horas --}}
            <div class="bg-light">
                <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Desglose de Horas Impartidas en el Monitoreo
                </div>
                <div class="d-flex justify-content-between bg-light">
                    <table class="table table-white table-striped table-responsive-sm table-responsive-md">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="col-1">Horas Teóricas </th>
                                <th class="col-1">Horas Prácticas</th>
                                <th class="col-1">Total</th>
                                <th class="col-2">¿Cuántas horas prácticas fueron realizadas en aula?</th>
                                <th class="col-2">¿Cuántas horas prácticas fueron realizadas en eventos académicos Internos o externos? (Conferencias, visitas a empresas, etc.)</th>
                                <th class="col-2">¿Cuántas horas Prácticas fueron realizadas en talleres o laboratorios?</th>
                                <th class="col-2">% de Horas Clase con el Uso de la Tecnología (cañón, t.v, dvd talleres, etc)</th>
                                <th class="1">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="col-1">{{$horas_teoricas}}</th>
                                <th class="col-1">{{$horas_practicas}}</th>
                                <th class="col-1">{{$total_horas}}</th>
                                <th class="col-2">{{$cantidad_horas_aula}}</th>
                                <th class="col-2">{{$cantidad_horas_externas}}</th>
                                <th class="col-2">{{$cantidad_horas_taller}}</th>
                                <th class="col-2">{{$porcentaje_horas_tecnologia}} </th>
                                <th class="col-1">
                                    <input type="hidden" value="{{$desglose_id}}" id="desglose_id">
                                    @if ($desglose_id != 0)
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_analisis">
                                    @endif
                                </th>
                            </tr>  
                        </tbody>
                    </table>
                </div>
                <div class="row m-2">
                    @if(!($desglose_id))
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="horas_teoricas" class="form-control mr-2" name="horas_teoricas" type="number" placeholder="Horeas teóricas" min="0" pattern="^[0-9]+">
                            <label for="horas_teoricas" class="pl-4">Horeas teóricas</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="horas_practicas" class="form-control mr-2" name="horas_practicas" type="number" placeholder="Horas Prácticas" min="0" pattern="^[0-9]+">
                            <label for="horas_practicas" class="pl-4">Horas Prácticas</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="total_horas" class="form-control mr-2" name="total_horas" type="number" placeholder="Horas Total" min="0" pattern="^[0-9]+">
                            <label for="total_horas" class="pl-4">Horas Total</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="cantidad_horas_aula" class="form-control mr-2" name="cantidad_horas_aula" type="number" placeholder="¿Cuántas horas prácticas fueron realizadas en aula?" min="0" pattern="^[0-9]+">
                            <label for="cantidad_horas_aula" class="pl-4">¿Cuántas horas prácticas fueron realizadas en aula?</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="cantidad_horas_externas" class="form-control mr-2" name="cantidad_horas_externas" type="number" placeholder="% De Alumnos Aprobados (por unidad)" min="0" pattern="^[0-9]+">
                            <label for="cantidad_horas_externas" class="pl-4">¿Cuántas horas prácticas fueron realizadas en eventos académicos Internos o externos?</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="cantidad_horas_taller" class="form-control mr-2" name="cantidad_horas_taller" type="number" placeholder="¿Cuántas horas Prácticas fueron realizadas en talleres o laboratorios?" min="0" pattern="^[0-9]+">
                            <label for="cantidad_horas_taller" class="pl-4">¿Cuántas horas Prácticas fueron realizadas en talleres o laboratorios?</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="porcentaje_horas_tecnologia" class="form-control mr-2" name="porcentaje_horas_tecnologia" type="number" placeholder="% de Horas Clase con el Uso de la Tecnología (cañón, t.v, dvd talleres, etc)" min="0" pattern="^[0-9]+">
                            <label for="porcentaje_horas_tecnologia" class="pl-4">% de Horas Clase con el Uso de la Tecnología (cañón, t.v, dvd talleres, etc)</label>
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="rap_id" id="rap_id" value="{{$rap->id}}">
                    @endif
                </div>
                @if(!($desglose_id))
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            <input type="submit" value="Agregar Analisis de Resultados" class="btn btn-success" id="btn_analisis">
                        </div>
                    </div> 
                @else
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input disabled type="submit" value="Agregar Desglose de Horas" class="btn btn-success" id="btn_analisis">
                    </div>
                </div> 
                @endif
            </div>
        {{-- Analisis de resultados --}}

    {{-- Practicas Planeadas --}}
        <div class="pb-4 bg-light ">
            <div class="bg-primary p-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                Descripcion de Practicas Planeadas
            </div>
            <div class="d-flex justify-content-between bg-light">
                <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th class="col-1" >Cantidad de Prácticas Planeadas</th>
                            <th class="col-1">¿Cuántas Prácticas Planeadas Realizó?</th>
                            <th class="col-2">Nombre de las Prácticas Realizadas</th>
                            <th class="col-2">Observaciones</th>
                            <th class="col-1" >Cantidad de Prácticas No Planeadas</th>
                            <th class="col-2">Nombre de las Prácticas Realizadas</th>
                            <th class="col-1">Talleres y/o Laboratorios Utilizados</th>
                            <th class="col-1">Observaciones</th>
                            <th class="col-1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th class="col-1">{{$practicas_planeadas}}</th>
                            <th class="col-1">{{$practicas_realizadas}}</th>
                            <th class="col-2">{{$nombre_practicas}}</th>
                            <th class="col-2">{{$observaciones}}</th>
                            <th class="col-1">{{$practicas_no_planeadas}}</th>
                            <th class="col-2">{{$nombre_no_planeadas}}</th>
                            <th class="col-1">{{$talleres}}</th>
                            <th class="col-1">{{$diferencias}}</th>
                            <th class="col-1">
                                <input type="hidden" value="{{$practicas_id}}" id="pag_id">
                                @if ($practicas_id != 0)
                                <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar_practicas">
                                @endif
                            </th>
                        </tr>  
                    </tbody>
                </table>
            </div>
            
            <div class="pl-4 pr-4">
                @if(!($practicas_id))
                    <div class="row">
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="practicas_planeadas" class="form-control mr-2" name="practicas_planeadas" type="number" placeholder="Cantidad de Prácticas Planeadas" min="0" pattern="^[0-9]+">
                            <label for="practicas_planeadas" class="pl-4">Cantidad de Prácticas Planeadas</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="practicas_realizadas" class="form-control mr-2" name="practicas_realizadas" type="number" placeholder="¿Cuántas Prácticas Planeadas Realizó?" min="0" pattern="^[0-9]+">
                            <label for="practicas_realizadas" class="pl-4">¿Cuántas Prácticas Planeadas Realizó?</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="practicas_no_planeadas" class="form-control mr-2" name="practicas_no_planeadas" type="number" placeholder="Cantidad de Prácticas Realizadas No Planeadas" min="0" pattern="^[0-9]+">
                            <label for="practicas_no_planeadas" class="pl-4">Cantidad de Prácticas Realizadas No Planeadas</label>
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea id="nombre_practicas" class="form-control mr-sm-2" name="nombre_practicas"  placeholder="Nombre de las Prácticas Realizadas" style="height: 100px;"></textarea>
                        <label for="nombre_practicas">Nombre de las Prácticas Realizadas</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea id="observaciones"  class="form-control mr-sm-2" name="observaciones" placeholder="Observaciones" style="height: 100px;"></textarea>
                        <label for="observaciones">Observaciones </label>
                    </div>
                    
                    <div class="form-floating mb-2">
                        <textarea id="nombre_no_planeadas" class="form-control mr-sm-2" name="nombre_no_planeadas"  placeholder="Nombre de las Prácticas Realizadas" style="height: 100px;"></textarea>
                        <label for="nombre_no_planeadas">Nombre de las Prácticas No Planeadas Realizadas</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea id="talleres" class="form-control mr-sm-2" name="talleres"  placeholder="Talleres y/o Laboratorios Utilizados" style="height: 100px;"></textarea>
                        <label for="talleres">Talleres y/o Laboratorios Utilizados</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea id="diferencias"  class="form-control mr-sm-2" name="diferencias" placeholder="Observaciones (Diferencias de lo Planeado a lo Realizado)" style="height: 100px;"></textarea>
                        <label for="diferencias">Observaciones (Diferencias de lo Planeado a lo Realizado) </label>
                    </div>
                @endif
            </div>
            @if(!($practicas_id))
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            <input type="submit" value="Añadir Prácticas" class="btn btn-success" id="btn_practicas">
                        </div>
                    </div> 
                @else
                <div class="row">
                    <div class="col-md-12 text-center mb-4">
                        <input disabled type="submit" value="Añadir Prácticas" class="btn btn-success" id="btn_practicas">
                    </div>
                </div> 
                @endif
        </div>
    {{-- Practicas Planeadas --}}


        {{-- Botones  --}}
            <div class=" pb-4 d-flex justify-content-end justify-content-md-between">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_avance_programatico/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div>
                    <form action="{{url('/downloadPDF/'.$rap->id)}}" method="GET">
                        
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
        //-------------------- JavaScript para Unidad---------------------//
            let boton = document.getElementById("enviar");
            let btn_borrar = document.getElementById("borrar");
            let no_unidad =  document.getElementById('no_unidad');
            let nombre_unidad = document.getElementById('nombre_unidad');
            let porcentaje_avance = document.getElementById('porcentaje_avance');
            let no_criterios = document.getElementById('no_criterios');
            let porcentaje_alumnos_aprobados = document.getElementById('porcentaje_alumnos_aprobados');
            let promedio_calificaciones = document.getElementById('promedio_calificaciones');
            let rap_id = document.getElementById('rap_id');
            let id_reporte = document.getElementById('id_reporte');
            let _token = document.getElementById('token');

            boton.addEventListener("click", function(e){
                
                let datos = {no_unidad:no_unidad.value, nombre_unidad:nombre_unidad.value, rap_id:rap_id.value,
                    porcentaje_avance:porcentaje_avance.value, no_criterios:no_criterios.value, 
                    porcentaje_alumnos_aprobados:porcentaje_alumnos_aprobados.value, promedio_calificaciones:promedio_calificaciones.value
                }
                e.preventDefault();
               
                fetch('/reportec/public/reporte_avance_programatico/descripcion_de_la_unidad',{
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

                fetch('/reportec/public/reporte_avance_programatico/borrar_unidad',{
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

        //-------------------- JavaScript para Desglose de horas ---------------------//
            let btn_analisis = document.getElementById('btn_analisis');
            let btn_borrar_analisis = document.getElementById("borrar_analisis");
            let horas_teoricas = document.getElementById('horas_teoricas');
            let horas_practicas = document.getElementById("horas_practicas");
            let total_horas = document.getElementById('total_horas');
            let cantidad_horas_aula = document.getElementById('cantidad_horas_aula');
            let cantidad_horas_externas = document.getElementById("cantidad_horas_externas");
            let analisis_descripcion = document.getElementById('cantidad_horas_taller');
            let porcentaje_horas_tecnologia = document.getElementById('porcentaje_horas_tecnologia');
            let desglose_id = document.getElementById('desglose_id');

            btn_analisis.addEventListener("click", function(e){
                
                let datos = {horas_teoricas:horas_teoricas.value, horas_practicas:horas_practicas.value, total_horas:total_horas.value,
                cantidad_horas_aula:cantidad_horas_aula.value, cantidad_horas_externas:cantidad_horas_externas.value, cantidad_horas_taller:cantidad_horas_taller.value,
                porcentaje_horas_tecnologia:porcentaje_horas_tecnologia.value, rap_id:rap_id.value, }
                e.preventDefault();
               
                fetch('/reportec/public/reporte_avance_programatico/crear_desglose_horas',{
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

        //-------------------- JavaScript para Borrar Desglose de horas---------------------//
            if (btn_borrar_analisis) {
                btn_borrar_analisis.addEventListener("click", function(e){
                let borrar_dato = {id:desglose_id.value}
                e.preventDefault();
                
                fetch('/reportec/public/reporte_avance_programatico/borrar_desglose_horas',{
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

        //-------------------- JavaScript para Practicas planeadas---------------------//
            let btn_practicas = document.getElementById('btn_practicas');
            let btn_borrar_practica = document.getElementById("borrar_practicas");
            let practicas_planeadas = document.getElementById('practicas_planeadas');
            let practicas_realizadas = document.getElementById('practicas_realizadas');
            let nombre_practicas = document.getElementById('nombre_practicas');
            let observaciones = document.getElementById('observaciones');
            let practicas_no_planeadas = document.getElementById('practicas_no_planeadas');
            let nombre_no_planeadas = document.getElementById('nombre_no_planeadas');
            let talleres = document.getElementById('talleres');
            let diferencias = document.getElementById('diferencias');
            let practicas_id = document.getElementById('practicas_id');

            btn_practicas.addEventListener("click", function(e){
                
                let datos = {practicas_planeadas:practicas_planeadas.value, practicas_realizadas:practicas_realizadas.value, nombre_practicas:nombre_practicas.value, observaciones:observaciones.value, 
                practicas_no_planeadas:practicas_no_planeadas.value, nombre_no_planeadas:nombre_no_planeadas.value, talleres:talleres.value, diferencias:diferencias.value,
                rap_id:rap_id.value}
                e.preventDefault();
               
                fetch('/reportec/public/reporte_avance_programatico/agregar_practicas_planeadas',{
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
            if (btn_borrar_practica) {
                btn_borrar_practica.addEventListener("click", function(e){
                let borrar_dato = {id:pag_id.value}
                e.preventDefault();
                
                fetch('/reportec/public/reporte_avance_programatico/borrar_practicas_planeadas',{
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