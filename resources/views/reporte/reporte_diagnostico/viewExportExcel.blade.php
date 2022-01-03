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
            <th class="text-center" colspan="25">REPORTE GENERAL</th>
        </tr>
        <tr>
            <td rowspan="2">NO.</td>
            <td rowspan="2">DOCENTE</td>
            <td rowspan="2">MATERIA</td>
            <td colspan="7">GENERALES DE LA MATERIA</td>
            <td colspan="3">ENTREGA EN FORMATOS</td>
            <td rowspan="2">TIPO DE EVALUACION</td>
            <td rowspan="2">N° ALUMNOS EVALUADOS</td>
            <td colspan="4">CONOCIMIENTOS PREVIOS</td>
            <td colspan="3">PLAN DE ACCION GENERAL</td>
            <td colspan="3">PLAN DE ACCION PARTICULAR</td>
        </tr>
        <tr>
            <td >HT</td>
            <td >HP</td>
            <td >CR</td>
            <td >CARRERA</td>
            <td >GRADO</td>
            <td >GRUPO</td>
            <td >TURNO</td>
            <td >FORMATO</td>
            <td >EVIDENCIA</td>
            <td >CRONO. FIR</td>
            <td >NULO</td>
            <td >BAJO</td>
            <td >ACEPTABLE</td>
            <td >BUENO</td>
            <td >DEFICIENCIAS</td>
            <td >ACCIOES SUGER. Y RECUR.</td>
            <td >TIEMPO E IMPACTO</td>
            <td >NOMBRE ALUMNO</td>
            <td >DEFICIENCIA</td>
            <td >ACCION SUGERIDA</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($reporte as $reporte)
            <tr>
                {{-- <td>
                    {{$item->id}}  
                </td> --}}
                <td>{{$reporte->id}}</td>
                <td>{{$reporte->autor}}</td>
                <td>{{$reporte->asignatura}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$reporte->carrera}}</td>
                <td>{{$reporte->grado}}</td>
                <td>{{$reporte->grupo}}</td>
                <td>{{$reporte->turno}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$reporte->tipo_evaluacion}}</td>
                <td>{{$reporte->cantidad_alumnos}}</td>
                @if ($reporte->ponderacion === 0)
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                @elseif ($reporte->ponderacion > 0 && $reporte->ponderacion <= 1)
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                @elseif ($reporte->ponderacion > 1 && $reporte->ponderacion <= 2)
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                @elseif ($reporte->ponderacion > 2)
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                @endif  
                    <td>{{$reporte->deficiencia_general}}</td>
                    <td>{{$reporte->accion_general}}</td>
                    <td>{{$reporte->tiempo_general}}</td>
                    <td>{{$reporte->alumnos}}</td>
                    <td>{{$reporte->deficiencia}}</td>
                    <td>{{$reporte->accion}}</td>
                </tr>  
        @endforeach
        {{-- @foreach ($pap as $reporte)
                    <td>{{$reporte->alumno_particular}}</td>
                    <td>{{$reporte->deficiencia_particular}}</td>
                    <td>{{$reporte->accion_particular}}</td>
        @endforeach --}}
        
        
            {{-- <tr>
                @foreach ($r_diagnostico as $reporte)
                    <td>{{$reporte->id}}</td>
                    <td>{{$reporte->autor}}</td>
                    <td>{{$reporte->asignatura}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$reporte->carrera}}</td>
                    <td>{{$reporte->grado}}</td>
                    <td>{{$reporte->grupo}}</td>
                    <td>{{$reporte->turno}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$reporte->tipo_evaluacion}}</td>
                    <td>{{$reporte->cantidad_alumnos}}</td>
                @endforeach
                
                @foreach ($pag as $reporte)
                    <td>{{$reporte->deficiencia_general}}</td>
                    <td>{{$reporte->accion_general}}</td>
                    <td>{{$reporte->tiempo_general}}</td>
                @endforeach
                @foreach ($pap as $reporte)
                    <td>{{$reporte->alumno_particular}}</td>
                    <td>{{$reporte->deficiencia_particular}}</td>
                    <td>{{$reporte->accion_particular}}</td>
                @endforeach
            </tr> --}}
    </tbody>
</table>