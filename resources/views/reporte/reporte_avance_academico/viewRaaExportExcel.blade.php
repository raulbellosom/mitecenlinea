
<table class="tg">
    <thead class="bg-secondary">
        <tr>
            <th></th>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th class="text-center" colspan="23">SEMESTRE: FEBRERO - JULIO 2021</th>
        </tr>
        <tr>
            <th class="text-center" colspan="23">INGENIERÍA EN GESTIÓN EMPRESARIAL </th>
        </tr>
        <tr>
            <th class="text-center" colspan="23">REPORTE DE PRIMER CORTE </th>
        </tr>
        <tr>
            <th class="text-center" colspan="23"></th>
        </tr>
        <tr>
            <th class="text-center" colspan="23">REPORTE GENERAL</th>
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

            <td>REPORTE ACADEMICO</td>
            <td>AVANCE PROGRAMATICO</td>
            <td>LISTA DE ASISTENCIA</td>
            <td>CALIFICACACIONES</td>
            <td>EVIDENCIAS</td>

            <td>No. UNIDADES EVALUADAS</td>
            <td>No. ALUMNOS REPROBADOS</td>
            <td>% REPROBACIÓN</td>
            <td>PROMEDIO DEL GRUPO POR UNIDAD.</td>
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
                {{-- <td>{{$raas->ht}}</td>
                <td>{{$raas->hp}}</td> --}}
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
                @if($raa)
                    <td>Si</td>
                @else
                    <td>NO</td>
                @endif
                <td></td>
                <td></td>
                <td></td>
                <td>{{$raas->no_unidad}}</td>
                <td>{{$raas->no_alu_reprobados}}</td>
                <td>{{$raas->porcentaje_reprobacion}}</td>
                <td>{{$raas->promedio_grupal}}</td>
                <td>{{$raas->porcentaje_asistencia}}</td>

                <td>{{$raas->no_criterios}}</td>
                <td>{{$raas->porcentaje_alumnos_aprobados}}</td>
                <td>{{$raas->promedio_calificaciones}}</td>
            </tr>  
        @endforeach
    </tbody>
</table>