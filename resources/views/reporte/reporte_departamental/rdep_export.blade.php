
@extends('layouts.main')

@section('content')
{{-- style="background-image: url({{asset('../resources/img/logo/background.png')}})" --}}
<div id="emp" class="container-fluid bg-white"  >
    <div class="row mt-4">
        <table class="table table-borderless table-white col-12">
            <tr>
                <td class="align-content-center" style="width: 100%; height: 100px"><img class="rounded mx-auto" style="width: 100%; height: 100px" src="{{asset('../resources/img/logo/background-top.png')}}" alt="adydo-logo"  ></td>
            </tr>
            <tr class="text-center">
                <td class="font-weight-bold">REPORTE DE EXAMEN DEPARTAMENTAL</td>
            </tr>
        </table>
    </div>
    <div class="row mt-4">
        <table class="table table-borderless table-white col-12">
            <tr>
                <td class="font-weight-bold text-right" >NOMBRE DEL DOCENTE</td>
                <td class="font-weight-bold text-uppercase ">{{$reportes->autor}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right" >ASIGNATURA</td>
                <td class="font-weight-bold text-uppercase" >{{$reportes->asignatura}}</td>
            </tr>
        </table>
    </div>

    <div>
        <table class="table table-borderless table-white col-12 text-center">
            <tr>
                <td class="font-weight-bold text-right">GRADO:</td>
                <td class="font-weight-bold text-uppercase">{{$reportes->grado}}</td>
                <td class="font-weight-bold text-right">GRUPO:</td>
                <td class="font-weight-bold text-uppercase">{{$reportes->grupo}}</td>
                <td class="font-weight-bold text-right">TURNO:</td>
                <td class="font-weight-bold text-uppercase">{{$reportes->turno}}</td>
                <td class="font-weight-bold text-right">CARRERA:</td>
                <td class="font-weight-bold text-uppercase">{{$reportes->carrera}}</td>
            </tr>
        </table>
    </div>
    
    <div class="row">
        <table class="table table-bordered col-12 text-center">
            <tr>
                <th class="bg-secondary text-white" colspan="1">Semestre</th>
                <th colspan="3">{{$reportes->semestre}}</th>
            </tr>
            <tr class="bg-secondary text-white ">
                <th colspan="2">NÚMERO TOTAL DE ALUMNOS EN LISTA</th>
                <th colspan="2">NÚMERO DE ALUMNOS QUE APLICARON EXAMEN</th>
            </tr>
            <tr>
                <td colspan="2">{{$reportes->total_alumnos_lista}}</td>
                <td colspan="2">{{$reportes->total_alumnos_examen}}</td>
            </tr>
            <tr class="bg-secondary text-white ">
                <th colspan="2">UNIDAD EVALUADA</th>
                <th colspan="2">FECHA DE APLICACIÓN DEL EXAMEN</th>
            </tr>
            <tr>
                <td colspan="2">{{$reportes->unidad_evaluada}}</td>
                <td colspan="2">{{$reportes->fecha_aplicacion_examen}}</td>
            </tr>
            <tr class="bg-secondary text-white ">
                <th colspan="2">PROMEDIO DE ALUMNOS APROBADOS</th>
                <th colspan="2">PROMEDIO GENERAL DEL GRUPO</th>
            </tr>
            <tr>
                <td colspan="2">{{$reportes->prom_alumnos_aprobados}}</td>
                <td colspan="2">{{$reportes->promedio_general}}</td>
            </tr>
        </table>
    </div>

    <div class="row">
        <table class="table table-bordered border-dark col-12 text-center">  
            <tr class="bg-secondary text-white ">
                <th>COMENTARIOS</th>
            </tr>
            <tr class="bg-secondary text-white ">
                <th>GENERALES</th>
            </tr>
            <tr>
                <td style="height: 100px">{{$reportes->comen_generales}}</td>
            </tr>
            <tr class="bg-secondary text-white ">
                <th>CASOS PARTICULARES</th>
            </tr>
            <tr>
                <td style="height: 100px">{{$reportes->comen_particulares}}</td>
            </tr>
        </table>
    </div>

   
    {{-- <div class="row">
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
    </div> --}}
</div>
@endsection

