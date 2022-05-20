@extends('layouts.light')

@section('content')
<div class="container bg-light">
    <div class="pt-4 d-flex justify-content-end justify-content-md-between">
        <div class="mr-3">
            <a class="btn btn-outline-danger" href="{{url('reporte_final/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                Regresar
            </a>
        </div>
        <div>
            <form action="{{url('/downloadPDF/'.$rf->id)}}" method="GET">
                
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
                 Reporte Final de Actividades
            </div>
        {{-- Titulo --}}

        {{-- Tabla principal --}}
            <div class="d-flex justify-content-between">
                <table class="table table-responsive-sm table-responsive-md table-white table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Fecha de elaboración</th>
                            <th>Tipo de reporte</th>
                            <th>Semestre</th>
                            <th>Carrera</th>
                            <th>Asignatura</th>
                            <th>Grado Grupo</th>
                            <th>Turno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{Str::substr($rf->created_at, 0, 10)}}</td>
                            <td>{{$rf->nombre_reporte}}</td>
                            <td>{{$rf->semestre}}</td>
                            <td>{{$rf->carrera}}</td>
                            <td>{{$rf->asignatura}}</td>
                            <td>{{$rf->grado}} {{$rf->grupo}}</td>
                            <td>{{$rf->turno}}</td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        {{-- Tabla principal --}}

        {{-- Cobertura del curso --}}
            <div class="bg-light pb-3">
                <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Cobertura del Curso
                </div>
                {{-- <div class="d-flex justify-content-between bg-light">
                    <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-white table-striped">
                        <thead class="bg-secondary text-white">
                            <tr class="text-center">
                                <th class="col-3">Número de unidades</th>
                                <th class="col-3">% de cobertura del programa</th>
                                <th class="col-4">Si el programa no se cubrió al 100 % indique las causas</th>
                                <th class="col-2">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr class="text-center">
                                    <td class="col-3">{{$curso->no_unidades}}</td>
                                    <td class="col-3">{{$curso->porcentaje_cobertura_programa}}</td>
                                    <td class="col-4">{{$curso->causas}}</td>
                                    <td class="col-2">
                                        <input type="hidden" value="{{$curso->id}}" id="id_reporte">
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
                <div class="pl-4 pr-4 pt-3">
                    {{-- <div class="font-weight-bold pb-2">
                        Cobertura del curso: 
                    </div> --}}
                    <div class="row">
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="no_unidades" class="form-control mr-2" name="no_unidades" type="number" placeholder="Número de unidades" min="0" max="10" pattern="^[0-9]+">
                            <label for="no_unidades" class="pl-4">Número de unidades</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="porcentaje_cobertura_programa" class="form-control mr-2" name="porcentaje_cobertura_programa" type="number" placeholder="% de cobertura del programas" min="0" max="100" pattern="^[0-9]+">
                            <label for="porcentaje_cobertura_programa" class="pl-4">% de cobertura del programa</label>
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="rf_id" id="rf_id" value="{{$rf->id}}">
                    </div>
                    <div class="form-floating mb-2">
                        <textarea id="causas" class="form-control mr-2" name="causas" placeholder="Si el programa no se cubrió al 100 % indique las causas:" style="height: 100px;"></textarea>
                        <label for="causas" class="pl-4">Si el programa no se cubrió al 100 % indique las causas:</label>
                    </div>
                </div>
            </div>

        {{-- Cobertura del curso --}}

        {{-- Reprobación y Deserción --}}
            <div class="bg-light pb-3">
                <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Reprobación y Deserción
                </div>
                {{-- <div class="d-flex justify-content-between bg-light">
                    <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-white table-striped">
                        <thead class="bg-secondary text-white">
                            <tr class="text-center">
                                <th class="col-2">No. de alumnos en lista de asistencia</th>
                                <th class="col-2">No. de alumnos aprobados</th>
                                <th class="col-2">No. de alumnos no aprobados por reprobación académica</th>
                                <th class="col-2">No. de alumnos no aprobados por deserción en la materia</th>
                                <th class="col-2">Promedio General del Grupo</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr class="text-center">
                                    <td class="col-1">{{$curso->no_alu_lista}}</td>
                                    <td class="col-2">{{$curso->no_alu_aprobados}}</td>
                                    <td class="col-2">{{$curso->no_alu_reprobados}}</td>
                                    <td class="col-1">{{$curso->no_alu_desercion}}</td>
                                    <td class="col-1">{{$curso->prom_general}}</td>
                                    <td class="col-2">
                                        <input type="hidden" value="{{$curso->id}}" id="id_reporte">
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
                <div class="pl-4 pr-4 pt-3">
                    {{-- <div class="font-weight-bold pb-2">
                        Reprobación y Deserción:
                    </div> --}}
                    <div class="row">
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="no_alu_lista" class="form-control mr-2" name="no_alu_lista" type="number" placeholder="No. de alumnos en lista de asistencia" min="0" pattern="^[0-9]+">
                            <label for="no_alu_lista" class="pl-4">No. de alumnos en lista de asistencia</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="no_alu_aprobados" class="form-control mr-2" name="no_alu_aprobados" type="number" placeholder="Número de alumnos aprobados" min="0" pattern="^[0-9]+">
                            <label for="no_alu_aprobados" class="pl-4">Número de alumnos aprobados</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="no_alu_reprobados" class="form-control mr-2" name="no_alu_reprobados" type="number" placeholder="No. de alumnos no aprobados por reprobación académica" min="0" pattern="^[0-9]+">
                            <label for="no_alu_reprobados" class="pl-4">No. de alumnos no aprobados por reprobación académica</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="no_alu_desercion" class="form-control mr-2" name="no_alu_desercion" type="number" placeholder="% de cobertura del programas" min="0" pattern="^[0-9]+">
                            <label for="no_alu_desercion" class="pl-4">No. de alumnos no aprobados por deserción en la materia</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="prom_general" class="form-control mr-2" name="prom_general" type="number" placeholder="Promedio General del Grupoa" min="0" pattern="^[0-9]+">
                            <label for="prom_general" class="pl-4">Promedio General del Grupo</label>
                        </div>
                    </div>
                </div>
            </div>
        {{-- Reprobación y Deserción --}}

        {{-- Características del Grupo --}}
            <div class="bg-light pb-3">
                <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Características del Grupo
                </div>
                {{-- <div class="d-flex justify-content-between bg-light">
                    <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-white table-striped">
                        <thead class="bg-secondary text-white">
                            <tr class="text-center">
                                <th class="col-6">¿En el aprovechamiento del grupo influyo el tamaño, actitudes, conducta u otros?</th>
                                <th class="col-3">% de asistencia del grupo</th>
                                <th class="col-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr class="text-center">
                                    <td class="col-6">{{$curso->caracteristicas_grupo}}</td>
                                    <td class="col-3">{{$curso->porcentaje_asistencia}}</td>
                                    <td class="col-3">
                                        <input type="hidden" value="{{$curso->id}}" id="id_reporte">
                                        <input class=" btn btn-danger" type="submit" value="Borrar" id="borrar">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
                <div class="pl-4 pr-4 pt-3">
                    {{-- <div class="font-weight-bold pb-2">
                        Caracteristicas del grupo:
                    </div> --}}
                    <div class="form-floating mb-2">
                        <textarea id="caracteristicas_grupo" class="form-control mr-2" name="caracteristicas_grupo" placeholder="¿En el aprovechamiento del grupo influyo el tamaño, actitudes, conducta u otros?" style="height: 100px;"></textarea>
                        <label for="caracteristicas_grupo" class="pl-4">¿En el aprovechamiento del grupo influyo el tamaño, actitudes, conducta u otros?</label>
                    </div>
                    <div class="row">
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="porcentaje_asistencia" class="form-control mr-2" name="porcentaje_asistencia" type="number" placeholder="% de asistencia del grupo" min="0" pattern="^[0-9]+">
                            <label for="porcentaje_asistencia" class="pl-4">% de asistencia del grupo</label>
                        </div>
                    </div>
                </div>
            </div>
        {{-- Características del Grupo --}}

        {{-- Espacios Utilizados en Suficiencia, Equipamiento y Distribución --}}
            <div class="bg-light pb-3">
                <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Espacios Utilizados en Suficiencia, Equipamiento y Distribución
                </div>
                <div class="pl-4 pr-4 pt-3">
                    <div class="row">
                        <div class="form-floating pb-2 col-12">
                            <input id="espacios_aulas" class="form-control mr-2" name="espacios_aulas" type="text" placeholder="Aulas">
                            <label for="espacios_aulas" class="pl-4">Aulas</label>
                        </div>
                        <div class="form-floating pb-2 col-12">
                            <input id="espacios_talleres" class="form-control mr-2" name="espacios_talleres" type="text" placeholder="Talleres">
                            <label for="espacios_talleres" class="pl-4">Talleres</label>
                        </div>
                        <div class="form-floating pb-2 col-12">
                            <input id="espacios_laboratorios" class="form-control mr-2" name="espacios_laboratorios" type="text" placeholder="Laboratorios">
                            <label for="espacios_laboratorios" class="pl-4">Laboratorios</label>
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="rf_id" id="rf_id" value="{{$rf->id}}">
                    </div>
                </div>
            </div>
        {{-- Espacios Utilizados en Suficiencia, Equipamiento y Distribución --}}
        
        {{-- Prácticas (En Talleres, Laboratorios o Externas) --}}
            <div class="bg-light pb-3">
                <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Prácticas (En Talleres, Laboratorios o Externas)
                </div>
                <div class="pl-4 pr-4 pt-3">
                    <div class="row">
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="no_practicas_programadas" class="form-control mr-2" name="no_practicas_programadas" type="number" placeholder="No. de prácticas programadas" min="0" max="10" pattern="^[0-9]+">
                            <label for="no_practicas_programadas" class="pl-4">No. de prácticas programadas</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-6">
                            <input id="porcentaje_practicas" class="form-control mr-2" name="porcentaje_practicas" type="number" placeholder="% prácticas cubiertas" min="0" max="100" pattern="^[0-9]+">
                            <label for="porcentaje_practicas" class="pl-4">% prácticas cubiertas</label>
                        </div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}">
                        <input type="hidden" name="rf_id" id="rf_id" value="{{$rf->id}}">
                    </div>
                    <div class="form-floating mb-2">
                        <textarea id="nombre_practicas" class="form-control" name="nombre_practicas" placeholder="Nombre de la(s) práctica(s) realizada(s)" style="height: 100px;"></textarea>
                        <label for="nombre_practicas" class="pl-4">Nombre de la(s) práctica(s) realizada(s)</label>
                    </div>
                </div>
            </div>
        {{-- Prácticas (En Talleres, Laboratorios o Externas) --}}

        {{-- Uso del Equipo Didáctico --}}
            <div class="bg-light pb-3">
                <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                    Uso del Equipo Didáctico
                </div>
                <div class="pt-3">
                    <table class="table" >
                        <thead>
                            <tr class="text-center">
                                <th >Equipo</th>
                                <th>% de uso semestral</th>
                                <th>Institucional o Propio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="col-3">Cañon</td>
                                <td class="col-4">
                                    <div class="form-floating pb-2">
                                        <input id="e_canon_por_uso" class="form-control mr-2" name="e_canon_por_uso" placeholder="% de uso semestral" type="number" min="0" max="10" pattern="^[0-9]+">
                                        <label for="e_canon_por_uso" class="pl-4">% de uso semestral</label>
                                    </div>
                                </td>
                                <td class="col-5">
                                    <div class="form-floating pb-2">
                                        <select id="e_canon_tipo" class="form-control mr-2" name="e_canon_tipo" placeholder="Propio o Institucional">
                                            <option value="" hidden> </option>
                                            <option value="Institucional">Institucional</option>
                                            <option value="Propio">Propio</option>
                                        </select>
                                        <label for="e_canon_tipo" class="pl-4">Propio o Institucional</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class="col-3">PC  Para el uso del Cañón</td>
                                <td class="col-4">
                                    <div class="form-floating pb-2">
                                        <input id="e_pc_por_uso" class="form-control mr-2" name="e_pc_por_uso" placeholder="% de uso semestral" type="number" min="0" max="10" pattern="^[0-9]+">
                                        <label for="e_pc_por_uso" class="pl-4">% de uso semestral</label>
                                    </div>
                                </td>
                                <td class="col-5">
                                    <div class="form-floating pb-2">
                                        <select id="e_pc_tipo" class="form-control mr-2" name="e_pc_tipo" placeholder="Propio o Institucional">
                                            <option value="" hidden> </option>
                                            <option value="Institucional">Institucional</option>
                                            <option value="Propio">Propio</option>
                                        </select>
                                        <label for="e_pc_tipo" class="pl-4">Propio o Institucional</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class="col-3">Rotafolio</td>
                                <td class="col-4">
                                    <div class="form-floating pb-2">
                                        <input id="e_rotafolio_por_uso" class="form-control mr-2" name="e_rotafolio_por_uso" placeholder="% de uso semestral" type="number" min="0" max="10" pattern="^[0-9]+">
                                        <label for="e_rotafolio_por_uso" class="pl-4">% de uso semestral</label>
                                    </div>
                                </td>
                                <td class="col-5">
                                    <div class="form-floating pb-2">
                                        <select id="e_rotafolio_tipo" class="form-control mr-2" name="e_rotafolio_tipo" placeholder="Propio o Institucional">
                                            <option value="" hidden> </option>
                                            <option value="Institucional">Institucional</option>
                                            <option value="Propio">Propio</option>
                                        </select>
                                        <label for="e_rotafolio_tipo" class="pl-4">Propio o Institucional</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class="col-3">T.V</td>
                                <td class="col-4">
                                    <div class="form-floating pb-2">
                                        <input id="e_tv_por_uso" class="form-control mr-2" name="e_tv_por_uso" placeholder="% de uso semestral" type="number" min="0" max="10" pattern="^[0-9]+">
                                        <label for="e_tv_por_uso" class="pl-4">% de uso semestral</label>
                                    </div>
                                </td>
                                <td class="col-5">
                                    <div class="form-floating pb-2">
                                        <select id="e_tv_tipo" class="form-control mr-2" name="e_tv_tipo" placeholder="Propio o Institucional">
                                            <option value="" hidden> </option>
                                            <option value="Institucional">Institucional</option>
                                            <option value="Propio">Propio</option>
                                        </select>
                                        <label for="e_tv_tipo" class="pl-4">Propio o Institucional</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class="col-3">Video Casetera/DVD</td>
                                <td class="col-4">
                                    <div class="form-floating pb-2">
                                        <input id="e_dvd_por_uso" class="form-control mr-2" name="e_dvd_por_uso" placeholder="% de uso semestral" type="number" min="0" max="10" pattern="^[0-9]+">
                                        <label for="e_dvd_por_uso" class="pl-4">% de uso semestral</label>
                                    </div>
                                </td>
                                <td class="col-5">
                                    <div class="form-floating pb-2">
                                        <select id="e_dvd_tipo" class="form-control mr-2" name="e_dvd_tipo" placeholder="Propio o Institucional">
                                            <option value="" hidden> </option>
                                            <option value="Institucional">Institucional</option>
                                            <option value="Propio">Propio</option>
                                        </select>
                                        <label for="e_dvd_tipo" class="pl-4">Propio o Institucional</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class="col-3">
                                    <div class="form-floating pb-2">
                                        <input id="e_otro" class="form-control mr-lg-2" name="e_otro" placeholder="Otro (especificar)" type="text">
                                        <label for="e_otro" class="pl-4">Otro (especificar)</label>
                                    </div>
                                </td>
                                <td class="col-4">
                                    <div class="form-floating pb-2">
                                        <input id="e_otro_por_uso" class="form-control mr-2" name="e_otro_por_uso" placeholder="% de uso semestral" type="number" min="0" max="10" pattern="^[0-9]+">
                                        <label for="e_otro_por_uso" class="pl-4">% de uso semestral</label>
                                    </div>
                                </td>
                                <td class="col-5">
                                    <div class="form-floating pb-2">
                                        <select id="e_otro_tipo" class="form-control mr-2" name="e_otro_tipo" placeholder="Propio o Institucional">
                                            <option value="" hidden> </option>
                                            <option value="Institucional">Institucional</option>
                                            <option value="Propio">Propio</option>
                                        </select>
                                        <label for="e_otro_tipo" class="pl-4">Propio o Institucional</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- Uso del Equipo Didáctico --}}
          
        {{-- Boton guardar --}}
            <div class="row pt-4">
                <div class="col-md-12 text-center mb-4">
                    <input type="submit" value="Guardar" class="btn btn-success" id="enviar">
                </div>
            </div>
        {{-- Boton guardar --}}

        {{-- Botones  --}}
            <div class=" pb-4 d-flex justify-content-end justify-content-md-between">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_final/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div>
                    <form action="{{url('/downloadPDF/'.$rf->id)}}" method="GET">
                        
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
            //------------------------Parte 1
            let no_unidades =  document.getElementById('no_unidades');
            let porcentaje_cobertura_programa = document.getElementById('porcentaje_cobertura_programa');
            let causas = document.getElementById('causas');
            let no_alu_lista = document.getElementById('no_alu_lista');
            let no_alu_aprobados = document.getElementById('no_alu_aprobados');
            let no_alu_reprobados = document.getElementById('no_alu_reprobados');
            let no_alu_desercion = document.getElementById('no_alu_desercion');
            let prom_general = document.getElementById('prom_general');
            let caracteristicas_grupo = document.getElementById('caracteristicas_grupo');
            let porcentaje_asistencia = document.getElementById('porcentaje_asistencia');
            let rf_id = document.getElementById('rf_id');
        //----------------------Parte 2
            let espacios_aulas =  document.getElementById('espacios_aulas');
            let espacios_talleres = document.getElementById('espacios_talleres');
            let espacios_laboratorios = document.getElementById('espacios_laboratorios');
            let no_practicas_programadas = document.getElementById('no_practicas_programadas');
            let porcentaje_practicas = document.getElementById('porcentaje_practicas');
            let nombre_practicas = document.getElementById('nombre_practicas');
            let e_canon_por_uso = document.getElementById('e_canon_por_uso');
            let e_canon_tipo = document.getElementById('e_canon_tipo');
            let e_pc_por_uso = document.getElementById('e_pc_por_uso');
            let e_pc_tipo = document.getElementById('e_pc_tipo');
            let e_rotafolio_por_uso = document.getElementById('e_rotafolio_por_uso');
            let e_rotafolio_tipo = document.getElementById('e_rotafolio_tipo');
            let e_tv_por_uso = document.getElementById('e_tv_por_uso');
            let e_tv_tipo = document.getElementById('e_tv_tipo');
            let e_dvd_por_uso = document.getElementById('e_dvd_por_uso');
            let e_dvd_tipo = document.getElementById('e_dvd_tipo');
            let e_otro = document.getElementById('e_otro');
            let e_otro_por_uso = document.getElementById('e_otro_por_uso');
            let e_otro_tipo = document.getElementById('e_otro_tipo');
            let id_reporte = document.getElementById('id_reporte');
            let _token = document.getElementById('token');
        //--------------------Parte 3

            boton.addEventListener("click", function(e){
                
                let datos = {no_unidades:no_unidades.value, porcentaje_cobertura_programa:porcentaje_cobertura_programa.value, rf_id:rf_id.value,
                    causas:causas.value, no_alu_lista:no_alu_lista.value, 
                    no_alu_aprobados:no_alu_aprobados.value, no_alu_reprobados:no_alu_reprobados.value,
                    no_alu_desercion:no_alu_desercion.value, prom_general:prom_general.value, 
                    caracteristicas_grupo:caracteristicas_grupo.value, porcentaje_asistencia:porcentaje_asistencia.value
                }
                e.preventDefault();
               
                fetch('/reportec/public/reporte_final/agregar_curso',{
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
            boton.addEventListener("click", function(e){

                let datosParteDos = {espacios_aulas:espacios_aulas.value, espacios_talleres:espacios_talleres.value, espacios_laboratorios:espacios_laboratorios.value, rf_id:rf_id.value,
                    no_practicas_programadas:no_practicas_programadas.value, porcentaje_practicas:porcentaje_practicas.value,nombre_practicas:nombre_practicas.value, 
                    e_canon_por_uso:e_canon_por_uso.value, e_canon_tipo:e_canon_tipo.value, e_pc_por_uso:e_pc_por_uso.value, e_pc_tipo:e_pc_tipo.value,
                    e_rotafolio_por_uso:e_rotafolio_por_uso.value, e_rotafolio_tipo:e_rotafolio_tipo.value, e_tv_por_uso:e_tv_por_uso.value, e_tv_tipo:e_tv_tipo.value,
                    e_dvd_por_uso:e_dvd_por_uso.value, e_dvd_tipo:e_dvd_tipo.value, 
                    e_otro:e_otro.value, e_otro_por_uso:e_otro_por_uso.value, e_otro_tipo:e_otro_tipo.value
                }
                e.preventDefault();
               
                fetch('/reportec/public/reporte_final/addPracticasEspacio',{
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': _token.value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(datosParteDos)
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

                fetch('/reportec/public/reporte_final/eliminar_curso',{
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