
<table class="tg">
    <thead class="bg-secondary">
        <tr>
            <th class="text-center" colspan="10">SEMESTRE: FEBRERO - JULIO 2021</th>
        </tr>
        <tr>
            <th class="text-center" colspan="10">INGENIERÍA EN GESTIÓN EMPRESARIAL </th>
        </tr>
        <tr>
            <th class="text-center" colspan="10">EXAMENES DEPARTAMENTALES</th>
        </tr>
        <tr>
            <th class="text-center" colspan="10"></th>
        </tr>
        <tr>
            <th class="text-center" colspan="10">DOCENTES IGEM </th>
        </tr>
        <tr>
            <td rowspan="3">NO.</td>
            <td rowspan="3">DOCENTE</td>
            <td rowspan="3">MATERIA</td>
            <td rowspan="1" colspan="7">DEPARTAMENTALES </td>
        </tr>
        <tr>
			<td rowspan="2" >Elaboración de examen</td>
			<td colspan="4">Aplicación </td>
			<td rowspan="2">Reporte </td>
			<td rowspan="2">Evidencias </td>
		</tr>
		<tr>
			<td>Unidades a Evaluar </td>
			<td>Fecha de aplicación </td>
			<td>Grupo </td>
			<td>No. De Alumnos</td>
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
                <td>{{$reporte->unidad_evaluada}}</td>
                <td>{{$reporte->fecha_aplicacion_examen}}</td>
                <td>{{$reporte->grado}}{{$reporte->grupo}}</td>
                <td>{{$reporte->total_alumnos_lista}}</td>
                <td></td>
                <td></td>
                <td></td>
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