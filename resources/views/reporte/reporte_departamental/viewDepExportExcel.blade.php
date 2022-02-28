
<table class="tg">
    <thead class="bg-secondary">
        <tr>
            <th colspan="10">
                <img src="{{asset('/assets/img/logo/banner-tec.jpg')}}" alt="Banner TecMM">
            </th>
        </tr>
        <tr>
            <th style="text-center" colspan="10">SEMESTRE: FEBRERO - JULIO 2021</th>
        </tr>
        <tr>
            <th style="text-center" colspan="10">INGENIERÍA EN GESTIÓN EMPRESARIAL </th>
        </tr>
        <tr>
            <th style="text-center" colspan="10">EXAMENES DEPARTAMENTALES</th>
        </tr>
        <tr>
            <th style="text-center" colspan="10"></th>
        </tr>
        <tr>
            <th style="text-center" colspan="10">DOCENTES IGEM </th>
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
                @if ($reporte->fecha_aplicacion_examen)
                    <td>SI</td>
                @else
                    <td>No</td>
                @endif
                <td>{{$reporte->unidad_evaluada}}</td>
                <td>{{$reporte->fecha_aplicacion_examen}}</td>
                <td>{{$reporte->grado}}{{$reporte->grupo}}</td>
                <td>{{$reporte->total_alumnos_lista}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>