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
        <div class="d-flex">
            @if ($rap->status == 1)
                <form action="{{url('/reporte_avance_programatico/'.$rap->id)}}" method="POST">
                    @csrf
                    {{method_field('PATCH')}}
                    <input type="hidden" value="2" id="status" name="status">
                    <input type="hidden" value="{{$rap->id}}" id="id" name="id">
                    <button  class="btn btn-outline-primary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                        </svg>
                        Finalizar Reporte
                    </button>
                </form>
            @endif
            @if ($rap->status == 2)
                <form action="{{url('/download_reporte_avance_programatico/'.$rap->id)}}" method="GET">
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
                 Reporte Avance Program??tico
            </div>
        {{-- Titulo --}}

        {{-- Tabla principal --}}
            <div class="d-flex justify-content-between">
                <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Fecha de elaboraci??n</th>
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
                            <td>{{Str::substr($rap->created_at, 0, 10)}}</td>
                            <td>{{$rap->nombre_reporte}}</td>
                            <td>{{$rap->carrera}}</td>
                            <td>{{$rap->asignatura}}</td>
                            <td>{{$rap->grado}} {{$rap->grupo}}</td>
                            <td>{{$rap->turno}}</td>
                            <td class="font-weight-bold">
                                @switch($rap->status)
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
                    Descripci??n de la Unidad
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
                                        <form action="{{ url('/rap_descripcion_unidad/'.$uni->id) }}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('??Deseas borrar esta Unidad?')" 
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
                <form action="{{url('/rap_descripcion_unidad')}}" method="POST" enctype="multipart/form-data">
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
                            <input id="porcentaje_avance" class="form-control mr-2" name="porcentaje_avance" type="number" placeholder="% De Avance" min="0" max="100" pattern="^[0-9]+">
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
                            @csrf
                            <div>
                                <button class="btn btn-outline-success" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                    Guardar Unidad
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
                                <th class="col-1">Horas Te??ricas </th>
                                <th class="col-1">Horas Pr??cticas</th>
                                <th class="col-1">Total</th>
                                <th class="col-2">??Cu??ntas horas pr??cticas fueron realizadas en aula?</th>
                                <th class="col-2">??Cu??ntas horas pr??cticas fueron realizadas en eventos acad??micos Internos o externos? (Conferencias, visitas a empresas, etc.)</th>
                                <th class="col-2">??Cu??ntas horas Pr??cticas fueron realizadas en talleres o laboratorios?</th>
                                <th class="col-2">% de Horas Clase con el Uso de la Tecnolog??a (ca????n, t.v, dvd talleres, etc)</th>
                                <th class="1">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-1">{{$horas_teoricas}}</td>
                                <td class="col-1">{{$horas_practicas}}</td>
                                <td class="col-1">{{$total_horas}}</td>
                                <td class="col-2">{{$cantidad_horas_aula}}</td>
                                <td class="col-2">{{$cantidad_horas_externas}}</td>
                                <td class="col-2">{{$cantidad_horas_taller}}</td>
                                <td class="col-2">{{$porcentaje_horas_tecnologia}} </td>
                                <td class="col-1">
                                    @if ($desglose_id != 0)
                                        <form action="{{ url('/rap_desglose_horas/'.$desglose_id) }}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('??Deseas borrar el Desglose de Horas actual?')" 
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
                <form action="{{url('/rap_desglose_horas')}}" method="POST" enctype="multipart/form-data">
                    <div class="row m-2">
                        @if(!($desglose_id))
                            <div class="form-floating pb-2 col-12 col-lg-6">
                                <input id="horas_teoricas" class="form-control mr-2" name="horas_teoricas" type="number" placeholder="Horeas te??ricas" min="0" pattern="^[0-9]+">
                                <label for="horas_teoricas" class="pl-4">Horeas te??ricas</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-6">
                                <input id="horas_practicas" class="form-control mr-2" name="horas_practicas" type="number" placeholder="Horas Pr??cticas" min="0" pattern="^[0-9]+">
                                <label for="horas_practicas" class="pl-4">Horas Pr??cticas</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-6">
                                <input id="total_horas" class="form-control mr-2" name="total_horas" type="number" placeholder="Horas Total" min="0" pattern="^[0-9]+">
                                <label for="total_horas" class="pl-4">Horas Total</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-6">
                                <input id="cantidad_horas_aula" class="form-control mr-2" name="cantidad_horas_aula" type="number" placeholder="??Cu??ntas horas pr??cticas fueron realizadas en aula?" min="0" pattern="^[0-9]+">
                                <label for="cantidad_horas_aula" class="pl-4">??Cu??ntas horas pr??cticas fueron realizadas en aula?</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-6">
                                <input id="cantidad_horas_externas" class="form-control mr-2" name="cantidad_horas_externas" type="number" placeholder="% De Alumnos Aprobados (por unidad)" min="0" pattern="^[0-9]+">
                                <label for="cantidad_horas_externas" class="pl-4">??Cu??ntas horas pr??cticas fueron realizadas en eventos acad??micos Internos o externos?</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-6">
                                <input id="cantidad_horas_taller" class="form-control mr-2" name="cantidad_horas_taller" type="number" placeholder="??Cu??ntas horas Pr??cticas fueron realizadas en talleres o laboratorios?" min="0" pattern="^[0-9]+">
                                <label for="cantidad_horas_taller" class="pl-4">??Cu??ntas horas Pr??cticas fueron realizadas en talleres o laboratorios?</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-6">
                                <input id="porcentaje_horas_tecnologia" class="form-control mr-2" name="porcentaje_horas_tecnologia" type="number" placeholder="% de Horas Clase con el Uso de la Tecnolog??a (ca????n, t.v, dvd talleres, etc)" min="0" pattern="^[0-9]+">
                                <label for="porcentaje_horas_tecnologia" class="pl-4">% de Horas Clase con el Uso de la Tecnolog??a (ca????n, t.v, dvd talleres, etc)</label>
                            </div>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                            <input type="hidden" name="rap_id" id="rap_id" value="{{$rap->id}}">
                        @endif
                    </div>
                    @if(!($desglose_id))
                        @csrf
                        <div class="col-md-12 text-center mb-4">
                            <button class="btn btn-outline-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                A??adir Desglose de Horas
                            </button>
                        </div>
                    @else
                    <div class="col-md-12 text-center mb-4">
                        <div>
                            <input disabled type="submit" value="Agregar Desglose de Horas" class="btn btn-warning" id="btn_analisis">
                        </div>
                        <label class="text-danger" for="btn_analisis">Para capturar un nuevo Desglose de Horas debe borrar el actual.</label>
                    </div> 
                    @endif
                </form>
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
                            <th class="col-1" >Cantidad de Pr??cticas Planeadas</th>
                            <th class="col-1">??Cu??ntas Pr??cticas Planeadas Realiz???</th>
                            <th class="col-2">Nombre de las Pr??cticas Realizadas</th>
                            <th class="col-2">Observaciones</th>
                            <th class="col-1" >Cantidad de Pr??cticas No Planeadas</th>
                            <th class="col-2">Nombre de las Pr??cticas Realizadas</th>
                            <th class="col-1">Talleres y/o Laboratorios Utilizados</th>
                            <th class="col-1">Observaciones</th>
                            <th class="col-1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="col-1">{{$practicas_planeadas}}</td>
                            <td class="col-1">{{$practicas_realizadas}}</td>
                            <td class="col-2">{{$nombre_practicas}}</td>
                            <td class="col-2">{{$observaciones}}</td>
                            <td class="col-1">{{$practicas_no_planeadas}}</td>
                            <td class="col-2">{{$nombre_no_planeadas}}</td>
                            <td class="col-1">{{$talleres}}</td>
                            <td class="col-1">{{$diferencias}}</td>
                            <td class="col-1">
                                <input type="hidden" value="{{$practicas_id}}" id="pag_id">
                                @if ($practicas_id != 0)
                                    <form action="{{ url('/rap_practicas_planeadas/'.$practicas_id) }}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('??Deseas borrar la Descripci??n de las Practicas actual?')" 
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
            <form action="{{url('/rap_practicas_planeadas')}}" method="POST" enctype="multipart/form-data">
                <div class="pl-4 pr-4">
                    @if(!($practicas_id))
                        <div class="row">
                            <div class="form-floating pb-2 col-12 col-lg-4">
                                <input id="practicas_planeadas" class="form-control mr-2" name="practicas_planeadas" type="number" placeholder="Cantidad de Pr??cticas Planeadas" min="0" pattern="^[0-9]+">
                                <label for="practicas_planeadas" class="pl-4">Cantidad de Pr??cticas Planeadas</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-4">
                                <input id="practicas_realizadas" class="form-control mr-2" name="practicas_realizadas" type="number" placeholder="??Cu??ntas Pr??cticas Planeadas Realiz???" min="0" pattern="^[0-9]+">
                                <label for="practicas_realizadas" class="pl-4">??Cu??ntas Pr??cticas Planeadas Realiz???</label>
                            </div>
                            <div class="form-floating pb-2 col-12 col-lg-4">
                                <input id="practicas_no_planeadas" class="form-control mr-2" name="practicas_no_planeadas" type="number" placeholder="Cantidad de Pr??cticas Realizadas No Planeadas" min="0" pattern="^[0-9]+">
                                <label for="practicas_no_planeadas" class="pl-4">Cantidad de Pr??cticas Realizadas No Planeadas</label>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea id="nombre_practicas" class="form-control mr-sm-2" name="nombre_practicas"  placeholder="Nombre de las Pr??cticas Realizadas" style="height: 100px;"></textarea>
                            <label for="nombre_practicas">Nombre de las Pr??cticas Realizadas</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea id="observaciones"  class="form-control mr-sm-2" name="observaciones" placeholder="Observaciones" style="height: 100px;"></textarea>
                            <label for="observaciones">Observaciones </label>
                        </div>
                        
                        <div class="form-floating mb-2">
                            <textarea id="nombre_no_planeadas" class="form-control mr-sm-2" name="nombre_no_planeadas"  placeholder="Nombre de las Pr??cticas Realizadas" style="height: 100px;"></textarea>
                            <label for="nombre_no_planeadas">Nombre de las Pr??cticas No Planeadas Realizadas</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea id="talleres" class="form-control mr-sm-2" name="talleres"  placeholder="Talleres y/o Laboratorios Utilizados" style="height: 100px;"></textarea>
                            <label for="talleres">Talleres y/o Laboratorios Utilizados</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea id="diferencias"  class="form-control mr-sm-2" name="diferencias" placeholder="Observaciones (Diferencias de lo Planeado a lo Realizado)" style="height: 100px;"></textarea>
                            <label for="diferencias">Observaciones (Diferencias de lo Planeado a lo Realizado) </label>
                        </div>
                        <input type="hidden" name="rap_id" id="rap_id" value="{{$rap->id}}">
                    @endif
                </div>
                @if(!($practicas_id))
                    @csrf
                    <div class="col-md-12 text-center mb-4">
                        <button class="btn btn-outline-success" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            A??adir Analisis de Resultados
                        </button>
                    </div>
                @else
                    <div class="col-md-12 text-center mb-4">
                        <div>
                            <input disabled type="submit" value="A??adir Pr??cticas" class="btn btn-warning" id="btn_practicas">
                        </div>
                        <label class="text-danger" for="btn_analisis">Para capturar una nueva Descripci??n de las Practicas debe borrar el actual.</label>
                    </div> 
                @endif
            </form>
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
                <div class="d-flex">
                    @if ($rap->status == 1)
                        <form action="{{url('/reporte_avance_programatico/'.$rap->id)}}" method="POST">
                            @csrf
                            {{method_field('PATCH')}}
                            <input type="hidden" value="2" id="status" name="status">
                            <input type="hidden" value="{{$rap->id}}" id="id" name="id">
                            <button  class="btn btn-outline-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                </svg>
                                Finalizar Reporte
                            </button>
                        </form>
                    @endif
                    @if ($rap->status == 2)
                        <form action="{{url('/download_reporte_avance_programatico/'.$rap->id)}}" method="GET">
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