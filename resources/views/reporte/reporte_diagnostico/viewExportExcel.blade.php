
<table class="tg">
    <thead class="bg-secondary">
        <tr>
            <th></th>
        </tr>
        <tr>
            <th></th>
        </tr>
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
    </tbody>
</table>