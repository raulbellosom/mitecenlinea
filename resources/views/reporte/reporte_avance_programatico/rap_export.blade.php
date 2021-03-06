@extends('layouts.main')

@section('content')
<div class="bg-white" >
    <div class="row mt-4">
        <table class="table table-bordered table-white col-12">
            <tr>
                <td class="align-content-center" rowspan="3" style="width: 125px"><img class="rounded mx-auto" style="width: 125px" src="{{asset('../resources/img/logo/tec-vallarta.png')}}" alt="adydo-logo"  ></td>
                <td class="font-weight-bold">FORMULARIO</td>
                <td class="font-weight-bold" colspan="2">Reporte de Avance Programático</td>
            </tr>
            <tr>
                <td class="font-weight-bold">CÓDIGO</td>
                <td class="font-weight-bold">VERSIÓN</td>
                <td class="font-weight-bold">ÚLTIMA REVISIÓN</td>
            </tr>
            <tr>
                <td class="font-weight-bold">AAP-PRC-04/F07</td>
                <td class="font-weight-bold">3</td>
                <td class="font-weight-bold">06/03/2017</td>
            </tr>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <p class="font-weight-bold ">Semestre: {{$reportes->semestre}}</p>
    </div>
    
    <div class="row">
        <table class="table table-bordered col-12 text-center">
            <tr class="bg-secondary text-white col-12 ">
                <th class="col-8">Nombre del Docente</th>
                <th class="col-4" colspan="4">Periodo de Monitoreo</th>
            </tr>
            <tr>
                <td>{{$reportes->autor}}</td>
                <td colspan="4">{{$reportes->asignatura}}</td>
            </tr>
            <tr class="bg-secondary text-white ">
                <th>Nombre de la Asignatura</th>
                <th>Grado</th>
                <th>Grupo</th>
                <th>Turno</th>
                <th>Carrera</th>
            </tr>
            <tr>
                <td>{{$reportes->asignatura}}</td>
                <td>{{$reportes->grado}}</td>
                <td>{{$reportes->grupo}}</td>
                <td>{{$reportes->turno}}</td>
                <td>{{$reportes->carrera}}</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark text-center col-12">  
            <tr class="bg-secondary text-white ">
                <th>Unidad</th>
                <th class="col-5">Anotar Nombre de la Unidad</th>
                <th>% De Avance</th>
                <th>No.de Criterios Aplicados a la Unidad</th>
                <th>% De Alumnos Aprobados(por unidad)</th>
                <th>Promedio de Calificaciones por Unidad (Solo de los alumnos aprobados)</th>
            </tr>
            @foreach ($unidad as $unidades)
                <tr>
                    <td>{{$unidades->no_unidad}}</td>
                    <td>{{$unidades->nombre_unidad}}</td>
                    <td>{{$unidades->porcentaje_avance}}</td>
                    <td>{{$unidades->no_criterios}}</td>
                    <td>{{$unidades->porcentaje_alumnos_aprobados}}</td>
                    <td>{{$unidades->promedio_calificaciones}}</td>
            @endforeach
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark text-center col-12">  
            <tr class="bg-secondary text-white ">
                <th colspan="6">Desglose de Horas Impartidas en el Monitoreo</th>
                <th >% de Horas Clase con el Uso de la Tecnología (cañón, t.v, dvd talleres, etc)</th>
            </tr>
            <tr>
                <td>Horas Teóricas</td>
                <td colspan="1">Horas Prácticas</td>
                <td>Total</td>
                <td><small>¿Cuántas horas prácticas fueron realizadas en aula?</small></td>
                <td> <small>¿Cuántas horas prácticas fueron realizadas en eventos académicos Internos o externos? (Conferencias, visitas  a empresas, etc.)</small> </td>
                <td>¿Cuántas horas Prácticas fueron realizadas en talleres o laboratorios?</td>
                <td rowspan="2">{{$porcentaje_horas_tecnologia}}</td>
            </tr>
            @foreach ($horas as $hora)
                <tr>
                    <td>{{$hora->horas_teoricas}}</td>
                    <td>{{$hora->horas_practicas}}</td>
                    <td>{{$hora->total_horas}}</td>
                    <td>{{$hora->cantidad_horas_aula}}</td>
                    <td>{{$hora->cantidad_horas_externas}}</td>
                    <td>{{$hora->cantidad_horas_taller}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark text-center col-12">  
            <tr class="bg-secondary text-white col-12">
                <th>Cantidad de Prácticas Realizadas Planeadas</th>
                <th>¿Cuántas Prácticas Planeadas Realizó?</th>
                <th>Nombre de las Prácticas  Realizadas</th>
                <th>Observaciones</th>
            </tr>
            @foreach ($practicas as $practica)
                <tr class="col-12">
                    <td class="col-2">{{$practica->practicas_planeadas}}</td>
                    <td class="col-2">{{$practica->practicas_realizadas}}</td>
                    <td class="col-4">{{$practica->nombre_practicas}}</td>
                    <td class="col-4">{{$practica->observaciones}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark text-center col-12">  
            <tr class="bg-secondary text-white col-12">
                <th>Cantidad de Prácticas Realizadas no Planeadas</th>
                <th>Nombre de la Práctica</th>
                <th>Talleres y/o Laboratorios Utilizados</th>
            </tr>
            @foreach ($practicas as $practica)
                <tr class="col-12">
                    <td class="col-2">{{$practica->practicas_no_planeadas}}</td>
                    <td class="col-8">{{$practica->nombre_no_planeadas}}</td>
                    <td class="col-2">{{$practica->talleres}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="row">
        <table class="table table-bordered border-dark text-center col-12">  
            <tr class="bg-secondary text-white col-12">
                <th>Observaciones (Diferencias de lo Planeado a lo Realizado)</th> 
            </tr>
            <tr>
                <td>{{$diferencia}}</td>
            </tr>
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

