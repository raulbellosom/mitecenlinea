<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
@extends('layouts.main')

@section('content')
<div id="emp" class="container-fluid bg-white" >
    <div class="row mt-4">
        <table class="table table-bordered table-white col-12">
            <tr>
                <td class="align-content-center" rowspan="3" style="width: 125px"><img class="rounded mx-auto" style="width: 125px" src="{{asset('../resources/img/logo/tec-vallarta.png')}}" alt="adydo-logo"  ></td>
                <td class="font-weight-bold">FORMULARIO</td>
                <td class="font-weight-bold" colspan="2">Resultado de evaluacion diagnostica</td>
            </tr>
            <tr>
                <td class="font-weight-bold">CÓDIGO</td>
                <td class="font-weight-bold">VERSIÓN</td>
                <td class="font-weight-bold">ÚLTIMA REVISIÓN</td>
            </tr>
            <tr>
                <td class="font-weight-bold">AAP-PCR-04/F04</td>
                <td class="font-weight-bold">3</td>
                <td class="font-weight-bold">06-03-2017</td>
            </tr>
        </table>
    </div>

    <div class="d-flex justify-content-end ">
        <p class="font-weight-bold ">Fecha: {{$reportes->created_at}}</p>
    </div>
    
    <div class="row">
        <table class="table table-bordered col-12">  
            <thead>
                <tr class="bg-secondary text-white ">
                    <th colspan="4">Nombre del Docente</th>
                    <th colspan="2">Nombre de la Asignatura</th>
                </tr>
                <tr>
                    <td colspan="4">{{$reportes->autor}}</td>
                    <td colspan="2">{{$reportes->asignatura}}</td>
                </tr>
                <tr class="bg-secondary text-white ">
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Turno</th>
                    <th>Carrera</th>
                    <th>Tipo de evaluacion</th>
                    <th>No. de alumnos</th>
                </tr>
                <tr>
                    <td>{{$reportes->grado}}</td>
                    <td>{{$reportes->grupo}}</td>
                    <td>{{$reportes->turno}}</td>
                    <td>{{$reportes->carrera}}</td>
                    <td>{{$reportes->tipo_evaluacion}}</td>
                    <td>{{$reportes->cantidad_alumnos}}</td>
                </tr>
            </thead>
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark col-12">  
        <tr class="bg-secondary text-white ">
            <th>Conocimientos, competencias especificas y/o genericas previas</th>
            <th>Nivel alcanzado</th>
            {{-- <th>Bajo</th>
            <th>Aceptable</th>
            <th>Bueno</th> --}}
        </tr>
        @foreach ($competencia as $competencias)
            <tr>
                <td>{{$competencias->competencia}}</td>
                <td>
                    @if ($competencias->ponderacion==0)
                        Nulo
                    @endif
                    @if ($competencias->ponderacion==1)
                        Bajo
                    @endif
                    @if ($competencias->ponderacion==2)
                        Aceptable
                    @endif
                    @if ($competencias->ponderacion==3)
                        Bueno
                    @endif
                </td>
            {{-- <td></td>
            <td></td>
            <td></td> --}}
            </tr>
        @endforeach
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
                    <th class="text-center"> <p class="text-decoration-underline">{{$reportes->autor}}</p> </th>
                    <th class="text-center text-decoration-underline"><p class="text-decoration-underline">{{$reportes->autor}}</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center">________________________________</th>
                    <th class="text-center">________________________________</th>
                </tr>
                <tr>
                    <th class="text-center">Nombre y Firma del Docente</th>
                    <th class="text-center">Vo. Bo. Nombre y firma <br> Coordinador Académico</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

