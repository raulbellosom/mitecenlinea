@extends('layouts.main')

@section('content')
<div class="container-fluid bg-white" >
    <div class="row mt-4">
        <table class="table table-bordered table-white col-12">
            <tr>
                <td class="align-content-center align-self-center" rowspan="3" style="width: 125px"><img class="rounded mx-auto" style="width: 125px" src="{{asset('../resources/img/logo/tec-vallarta.png')}}" alt="adydo-logo"  ></td>
                <td class="font-weight-bold align-self-center">FORMULARIO</td>
                <td class="font-weight-bold align-self-center" colspan="2">Reporte de Avance Académico de Alumnos</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-center">CÓDIGO</td>
                <td class="font-weight-bold text-center">VERSIÓN</td>
                <td class="font-weight-bold text-center">ÚLTIMA REVISIÓN</td>
            </tr>
            <tr>
                <td class="text-center">AAP-PRC-04/F05</td>
                <td class="text-center">3</td>
                <td class="text-center">06/03/2017</td>
            </tr>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <p class="font-weight-bold justify-self-end">Periodo del Corte: {{$reportes->periodo_corte}}</p>
    </div>
    
    <div class="row">
        <table class="table table-bordered col-12">  
            <thead>
                <tr class="bg-secondary text-white text-center">
                    <th class="col-6" colspan="4">Nombre del Docente</th>
                    <th class="col-6" colspan="3">Nombre de la Asignatura</th>
                </tr>
                <tr class="text-center">
                    <td class="col-6" colspan="4">{{$reportes->autor}}</td>
                    <td class="col-6" colspan="3">{{$reportes->asignatura}}</td>
                </tr>
                <tr class="bg-secondary text-white text-center">
                    <th><small>Grado</small></th>
                    <th><small>Grupo</small></th>
                    <th><small>Turno</small></th>
                    <th><small>Carrera</small></th>
                    <th><small>Total de Alumnos</small></th>
                    <th><small>No. de alumnos que desde el inicio del semestre no se presentaron a las clases</small></th>
                    <th><small>No. de alumnos que desertaron en el periodo</small></th>
                </tr>
                <tr class="text-center">
                    <td>{{$reportes->grado}}</td>
                    <td>{{$reportes->grupo}}</td>
                    <td>{{$reportes->turno}}</td>
                    <td>{{$reportes->carrera}}</td>
                    <td>{{$reportes->total_alumnos}}</td>
                    <td>{{$reportes->total_alumnos_ausentes}}</td>
                    <td>{{$reportes->total_alumnos_desertados}}</td>
                </tr>
            </thead>
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark col-12 text-center">  
            <thead class="bg-secondary text-white">
                <tr>
                    <th>No. de la Unidad Evaluada</th>
                    <th>No. de alumnos Reprobados</th>
                    <th>% De Reprobación</th>
                    <th>Promedio de calificaciones del grupo por unidad (considerar el total de alumnos en lista)</th>
                    <th>% de Asistencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidad as $item)
                    <tr>
                        <td>{{$item->no_unidad}}</td>
                        <td>{{$item->no_alu_reprobados}}</td>
                        <td>{{$item->porcentaje_reprobacion}}</td>
                        <td>{{$item->promedio_grupal}}</td>
                        <td>{{$item->porcentaje_asistencia}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark col-12 text-center">  
            <thead class="bg-secondary text-white ">
                <tr class="text-center">
                    <th class="align-items-center" rowspan="2">Análisis de resultados (Retroalimentación)</th>
                    <th>Descripción de la causas de reprobación</th>
                    <th>Acciones aplicadas y/o Causas de éxito de la Aprobación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$analisis_descripcion}}</td>
                    <td>{{$analisis_acciones}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="font-weight-bold">
        <p class="text-decoration-underline">Plan de acción</p>
    </div>
    
    <div class="row">
        <table class="table table-bordered border-dark col-12">  
        <tr class="bg-secondary text-white">
            <th rowspan="2">General</th>
            <th>Deficiencias</th>
            <th>Acciones sugeridas y recursos necesarios</th>
            <th>Tiempo de ejecución e impacto en cronograma</th>
        </tr>
        <tr>
            <td>{{$pag_def}}</td>
            <td>{{$pag_ac}}</td>
            <td>{{$pag_time}}</td>
        </tr>
        <tr class="bg-secondary text-white ">
            <th class="text-center" rowspan="5">Particular</th>
            <th>Nombre del alumno</th>
            <th>Deficiencias (temas, áreas, otros)</th>
            <th>Acción sugerida (académica, psicologica, etc)</th>
        </tr>
            @foreach ($pap as $paps)
                @foreach ($paps as $datos)
                <tr>
                    <td>{{$datos->alumno_particular}}</td>
                    <td>{{$datos->deficiencia_particular}}</td>
                    <td>{{$datos->accion_particular}}</td>
                </tr>
                @endforeach
            @endforeach 
        </table>
    </div>
    <div class="row">
        <table class="table table-borderless col-12">
            <thead>
                <tr>
                    <th class="text-center"><p class="text-decoration-underline">__{{$reportes->autor}}__</p> </th>
                    <th class="text-center text-decoration-underline"><p class="text-decoration-underline">__Mtra. Martha Irene Sánchez Beltrán__</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">Nombre y Firma del Docente</td>
                    <td class="text-center">Vo. Bo. Nombre y firma <br> Coordinador Académico</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

