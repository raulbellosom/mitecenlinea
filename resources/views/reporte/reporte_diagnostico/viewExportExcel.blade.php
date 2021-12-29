<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-llyw{background-color:#c0c0c0;border-color:inherit;text-align:left;vertical-align:top}
    .tg .tg-f7v4{background-color:#c0c0c0;border-color:#000000;text-align:left;vertical-align:top}
    .tg .tg-vwhn{background-color:#ffce93;border-color:#000000;text-align:left;vertical-align:top}
    </style>
<table class="tg">
    <thead>
        <tr>
            <th class="tg-vwhn" colspan="25">REPORTE GENERAL</th>
        </tr>
        <tr>
            <td class="tg-f7v4" rowspan="2">NO.</td>
            <td class="tg-llyw" rowspan="2">DOCENTE</td>
            <td class="tg-llyw" rowspan="2">MATERIA</td>
            <td class="tg-llyw" colspan="7">GENERALES DE LA MATERIA</td>
            <td class="tg-llyw" colspan="3">ENTREGA EN FORMATOS</td>
            <td class="tg-llyw" rowspan="2">TIPO DE EVALUACION</td>
            <td class="tg-llyw" rowspan="2">N° ALUMNOS EVALUADOS</td>
            <td class="tg-llyw" colspan="4">CONOCIMIENTOS PREVIOS</td>
            <td class="tg-llyw" colspan="3">PLAN DE ACCION GENERAL</td>
            <td class="tg-llyw" colspan="3">PLAN DE ACCION PARTICULAR</td>
        </tr>
        <tr>
            <td class="tg-llyw">HT</td>
            <td class="tg-llyw">HP</td>
            <td class="tg-llyw">CR</td>
            <td class="tg-llyw">CARRERA</td>
            <td class="tg-llyw">GRADO</td>
            <td class="tg-llyw">GRUPO</td>
            <td class="tg-llyw">TURNO</td>
            <td class="tg-llyw">FORMATO</td>
            <td class="tg-llyw">EVIDENCIA</td>
            <td class="tg-llyw">CRONO. FIR</td>
            <td class="tg-llyw">NULO</td>
            <td class="tg-llyw">BAJO</td>
            <td class="tg-llyw">ACEPTABLE</td>
            <td class="tg-llyw">BUENO</td>
            <td class="tg-llyw">DEFICIENCIAS</td>
            <td class="tg-llyw">ACCIOES SUGER. Y RECUR.</td>
            <td class="tg-llyw">TIEMPO E IMPACTO</td>
            <td class="tg-llyw">NOMBRE ALUMNO</td>
            <td class="tg-llyw">DEFICIENCIA</td>
            <td class="tg-llyw">ACCION SUGERIDA</td>
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
              
        @endforeach
        {{-- @foreach ($pap as $reporte)
                    <td>{{$reporte->alumno_particular}}</td>
                    <td>{{$reporte->deficiencia_particular}}</td>
                    <td>{{$reporte->accion_particular}}</td>
        @endforeach --}}
        </tr>  
        
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

<script>

</script>