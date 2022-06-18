{{-- @extends('layouts.light')

@section('content') --}}
<style>
    .puntero{
        cursor: pointer;
    }
    .ocultar{
        display: none;
    }
    .puntero2{
        cursor: pointer;
    }
    .ocultar2{
        display: none;
    }
</style>
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
       
        {{-- Metodologias didacticas a utilizar --}}
           <div class="bg-light pb-3">
            <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                Metodologias didacticas a utilizar.
            </div>
            <div class="pl-4 pr-4 pt-3">
                <div class="clonar2">
                    <div class="row">
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="rf_tecnicas" class="form-control mr-2" name="rf_tecnicas[]" type="text" placeholder="Técnica(s) empleada(s)">
                            <label for="rf_tecnicas" class="pl-4">Técnica(s) empleada(s)</label>
                            <button class="btn btn-danger btn-sm puntero2 ocultar2 mt-2">Eliminar</button>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="rf_no_temas" class="form-control mr-2" name="rf_no_temas[]"  placeholder="No. de temas en que se empleó" type="number" min="0" max="10" pattern="^[0-9]+">
                            <label for="rf_no_temas" class="pl-4">No. de temas en que se empleó</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-4">
                            <input id="rf_promedio" class="form-control mr-2" name="rf_promedio[]" placeholder="% Promedio estimado de uso" type="number"  min="0" max="100" pattern="^[0-9]+">
                            <label for="rf_promedio" class="pl-4">% Promedio estimado de uso</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="contenedor2"></div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary" id="agregar2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    Agregar campo</button>
                </div>
            </div>
        </div> 
        {{-- fin - Metodologias didacticas a utilizar --}}


        {{-- Actividades academicas de vinculacion el sector productivo --}}
           <div class="bg-light pb-3">
            <div class="bg-secondary p-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                Actividades Académicas de Vinculación con el Sector Productivo
            </div>
            <div class="pl-4 pr-4 pt-3">
                <div class="row">
                    <div class="form-floating pb-2 col-6">
                        <input id="rf_no_eventos" class="form-control mr-2" name="rf_no_eventos" placeholder="No.de eventos realizados" type="number" min="0" max="10" pattern="^[0-9]+">
                        <label for="rf_no_eventos" class="pl-4">No.de eventos realizados</label>
                    </div>
                    <div class="form-floating pb-2 col-6">
                        <input id="rf_no_horas" class="form-control mr-2" name="rf_no_horas" type="number" placeholder="No.de horas empleadas en el semestre:" type="number" min="0" max="10" pattern="^[0-9]+">
                        <label for="rf_no_horas" class="pl-4">No.de horas empleadas en el semestre:</label>
                    </div>
                </div>
                <div class="clonar">
                    <div class="row ">
                        <label class="pl-4">Descripción de los eventos</label>
                        <div class="form-floating pb-2 col-12 col-lg-5">
                            <input id="rf_evento" class="form-control mr-2" name="rf_evento[]" type="text" placeholder="Evento">
                            <label for="rf_evento" class="pl-4">Evento</label>
                            <button class="btn btn-danger btn-sm puntero ocultar mt-2">Eliminar</button>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-2">
                            <input id="rf_a_participantes" class="form-control mr-2" name="rf_a_participantes[]" placeholder="Alumnos participantes" type="number" min="0" max="10" pattern="^[0-9]+">
                            <label for="rf_a_participantes" class="pl-4">Alumnos participantes</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-2">
                            <input id="rf_h_emprf_contribucionleadas" class="form-control mr-2" name="rf_h_empleadas[]"  placeholder="Horas empleadas"type="number" min="0" max="100" pattern="^[0-9]+">
                            <label for="rf_h_empleadas" class="pl-4">Horas empleadas</label>
                        </div>
                        <div class="form-floating pb-2 col-12 col-lg-3">
                            <input id="rf_contribucion" class="form-control mr-2" name="rf_contribucion[]"  placeholder="Contribución al programa de la materia"type="number" min="0" max="100" pattern="^[0-9]+">
                            <label for="rf_contribucion" class="pl-4">Contribución al programa de la materia</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="contenedor"></div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" id="agregar">   
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Agregar campo</button>
                    </div>
                </div>
            </div>
        </div> 
        {{-- fin - Actividades Académicas de Vinculación con el Sector Productivo --}}
          
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
    // Actividades academicas de vinculacion el sector productivo 
        let agregar = document.getElementById('agregar');
        let contenido = document.getElementById('contenedor');
    
        // var contador = 28;
        agregar.addEventListener('click', e =>{
            e.preventDefault();
            
            let clonado = document.querySelector('.clonar');//selecciona clase clonar
            let clon = clonado.cloneNode(true);

            clon.querySelectorAll(".form-control")[0].value="";//Se borra el contenido de los inputs
            clon.querySelectorAll(".form-control")[1].value="";
            clon.querySelectorAll(".form-control")[2].value="";
            clon.querySelectorAll(".form-control")[3].value="";

            contenido.appendChild(clon).classList.remove('clonar'); //se remueve la clase clonar
            

            let remover = contenido.lastChild.childNodes[1].querySelectorAll('button');
            remover[0].classList.remove('ocultar');
        });

        contenido.addEventListener('click', e =>{
            e.preventDefault();
            if(e.target.classList.contains('puntero')){

                let contenedor = e.target.parentNode.parentNode;
                contenedor.parentNode.removeChild(contenedor);

            }
        });
    // Fin Actividades academicas de vinculacion el sector productivo 

    // Metodologias didacticas a utilizar
        let agregar2 = document.getElementById('agregar2');
        let contenido2 = document.getElementById('contenedor2');
    
        var contador2 = 1;
        agregar2.addEventListener('click', e =>{
            e.preventDefault();
            let clonado2 = document.querySelector('.clonar2');
            let clon2 = clonado2.cloneNode(true);

            clon2.querySelectorAll(".form-control")[0].value = "";
            clon2.querySelectorAll(".form-control")[1].value = "";
            clon2.querySelectorAll(".form-control")[2].value = "";

            contenido2.appendChild(clon2).classList.remove('clonar2');
            

            let remover2 = contenido2.lastChild.childNodes[1].querySelectorAll('button');
            remover2[0].classList.remove('ocultar2');

        });

        contenido2.addEventListener('click', e =>{
            e.preventDefault();
            if(e.target.classList.contains('puntero2')){

                let contenedor2 = e.target.parentNode.parentNode;
                contenedor2.parentNode.removeChild(contenedor2);
            }
        });
       //Fin Metodologias didacticas a utilizar

    </script>
    {{-- Script campos automaticos --}}
</div>
{{-- @endsection --}}