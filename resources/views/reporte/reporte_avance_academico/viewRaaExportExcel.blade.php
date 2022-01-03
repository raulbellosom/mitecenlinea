{{-- <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}background-color:#c0c0c0;border-color:inherit;text-align:left;vertical-align:top}
    .tg .tg-f7v4{background-color:#c0c0c0;border-color:#000000;text-align:left;vertical-align:top}
    .tg .tg-vwhn{background-color:#ffce93;border-color:#000000;text-align:left;vertical-align:top}
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
<table class="tg">
    <thead class="bg-secondary">
        <tr>
            <th class="text-center" colspan="25">SEMESTRE: FEBRERO - JULIO 2021</th>
        </tr>
        <tr>
            <th class="text-center" colspan="25">INGENIERÍA EN GESTIÓN EMPRESARIAL </th>
        </tr>
        <tr>
            <th class="text-center" colspan="25">raas DE PRIMER CORTE </th>
        </tr>
        <tr>
            <th class="text-center" colspan="25"></th>
        </tr>
        <tr>
            <th class="text-center" colspan="25">raas GENERAL</th>
        </tr>
        <tr>
            <th rowspan="2">NO.</th>
            <th rowspan="2">DOCENTE</th>
            <th rowspan="2">MATERIA</th>
    
            <th colspan="7">GENERALES DE LA MATERIA</th>
            <th colspan="5">ENTREGA EN FORMATOS</th>
            <th colspan="5">AVANCE ACADÉMICO</th>
            <th colspan="3">REPORTE DE AVANCE PROGRAMATICO</th>
        </tr>
        <tr>
            <th>HT</th>
            <th>HP</th>
            <th>CR</th>
            <th>CARRERA</th>
            <th>GRADO</th>
            <th>GRUPO</th>
            <th>TURNO</th>

            <td>REPORTE ACADEM</td>
            <td>AVANCE PROGR.</td>
            <td>LISTA DE ASISTENCIA</td>
            <td>CALIFICAC.</td>
            <td>EVIDENCIAS</td>

            <td>No. UNIDADES EVALUADAS</td>
            <td>No. ALUMNOS REPROBADOS</td>
            <td>% REPROBACIÓN</td>
            <td>PROMEDIO DEL GRUPO POR UNIDAD .</td>
            <td>% DE ASISTENCIA</td>

            <td>CRITERIOS APLICADOS PARA LA EVALUACIÓN</td>
            <td>% ALUMNOS APROBADOS</td>
            <td>PROMEDIO DE CALIFICACIÓN</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($raa as $raas)
            <tr>
                <td>{{$raas->id}}</td>
                <td>{{$raas->autor}}</td>
                <td>{{$raas->asignatura}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$raas->carrera}}</td>
                <td>{{$raas->grado}}</td>
                <td>{{$raas->grupo}}</td>
                <td>{{$raas->turno}}</td>
                @if($raa)
                    <td>Si</td>
                @else
                    <td>NO</td>
                @endif
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$raas->no_unidad}}</td>
                <td>{{$raas->no_alu_reprobados}}</td>
                <td>{{$raas->porcentaje_reprobacion}}</td>
                <td>{{$raas->promedio_grupal}}</td>
                <td>{{$raas->porcentaje_asistencia}}</td>

                <td>{{$raas->deficiencia_general}}</td>
                <td>{{$raas->accion_general}}</td>
                <td>{{$raas->tiempo_general}}</td>
            </tr>  
        @endforeach
    </tbody>
</table>