<style>
    body {
        margin-top: 4cm;
        margin-left: 2cm;
        margin-right: 2cm;
        margin-bottom: 2cm;
        font-family: Arial, Helvetica, sans-serif;
    }
    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 3cm;
    }
    footer {
        position: fixed; 
        bottom: 1cm; 
        left: 0cm; 
        right: 0cm;
        height: 2cm;
    }
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
    table{
        width: 100%;
    }
    th{
        background-color: #828282;
        color: white;
    }
    .prueba{
        text-align: center;
    }
</style>
<body>
    <header>
        <table class="prueba">
            <tr>
                <td  rowspan="3" style="width: 100px"><img  style="width: 125px" src="{{asset('../resources/img/logo/tec-vallarta.png')}}" alt="adydo-logo"  ></td>
                <td><b>FORMULARIO</b></td>
                <td colspan="2">Reporte de Avance Académico de Alumnos</td>
            </tr>
            <tr>
                <td><b>CÓDIGO</b></td>
                <td><b>VERSIÓN</b></td>
                <td><b>ÚLTIMA REVISIÓN</b></td>
            </tr>
            <tr>
                <td>AAP-PRC-04/F05</td>
                <td>3</td>
                <td>06/03/2017</td>
            </tr>
        </table>
    </header>

    <footer>
        <img style="width: 15cm" src="{{asset('../resources/img/logo/background-bot.png')}}" alt="adydo-logo"  >
    </footer>
    <main>
        <div style="text-align: right">
            <p><b>Periodo del Corte:</b> {{$reportes->periodo_corte}}</p>
        </div>
        
        <div >
            <table >  
                <thead>
                    <tr>
                        <th colspan="4">Nombre del Docente</th>
                        <th colspan="3">Nombre de la Asignatura</th>
                    </tr>
                    <tr>
                        <td colspan="4">{{$reportes->autor}}</td>
                        <td colspan="3">{{$reportes->asignatura}}</td>
                    </tr>
                    <tr>
                        <th><small>Grado</small></th>
                        <th><small>Grupo</small></th>
                        <th><small>Turno</small></th>
                        <th><small>Carrera</small></th>
                        <th><small>Total de Alumnos</small></th>
                        <th><small>No. de alumnos que desde el inicio del semestre no se presentaron a las clases</small></th>
                        <th><small>No. de alumnos que desertaron en el periodo</small></th>
                    </tr>
                    <tr>
                        <td>{{$reportes->grado}}</td>
                        <td>{{$reportes->grupo}}</td>
                        <td>{{$reportes->turno}}</td>
                        <td>{{$reportes->carrera}}</td>
                        <td>{{$reportes->total_alumnos}}</td>
                        <td>{{$reportes->total_alumnos_ausentes}}</td>
                        <td>{{$reportes->total_alumnos_desertados}}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <br>
        
        <div >
            <table >  
                <thead >
                    <tr>
                        <th>No. de la Unidad Evaluada</th>
                        <th>No. de alumnos Reprobados</th>
                        <th>% De Reprobación</th>
                        <th>Promedio de calificaciones del grupo por unidad (considerar el total de alumnos en lista)</th>
                        <th>% de Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidad as $item)
                        <tr>
                            <td>{{$item->no_unidad}}</td>
                            <td>{{$item->no_alu_reprobados}}</td>
                            <td>{{$item->porcentaje_reprobacion}}</td>
                            <td>{{$item->promedio_grupal}}</td>
                            <td>{{$item->porcentaje_asistencia}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="padding-top: 1.5cm;">
            <table >  
                <thead >
                    <tr>
                        <th class="align-items-center" rowspan="2">Análisis de resultados (Retroalimentación)</th>
                        <th>Descripción de la causas de reprobación</th>
                        <th>Acciones aplicadas y/o Causas de éxito de la Aprobación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$analisis_descripcion}}</td>
                        <td>{{$analisis_acciones}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="padding-top: 1cm;">
            <p><u><b>Plan de acción</b></u></p>
        </div>
        
        <div >
            <table >  
            <tr >
                <th>General</th>
                <th>Deficiencias</th>
                <th>Acciones sugeridas y recursos necesarios</th>
                <th>Tiempo de ejecución e impacto en cronograma</th>
            </tr>
            <tr>
                <th></th>
                <td>{{$pag_def}}</td>
                <td>{{$pag_ac}}</td>
                <td>{{$pag_time}}</td>
            </tr>
            <tr >
                <th>Particular</th>
                <th>Nombre del alumno</th>
                <th>Deficiencias (temas, áreas, otros)</th>
                <th>Acción sugerida (académica, psicologica, etc)</th>
            </tr>
                @foreach ($pap as $paps)
                    @foreach ($paps as $datos)
                    <tr>
                        <th></th>
                        <td>{{$datos->alumno_particular}}</td>
                        <td>{{$datos->deficiencia_particular}}</td>
                        <td>{{$datos->accion_particular}}</td>
                        {{-- <td>{{Str::substr($datos->alumno_particular,3) }}</td>
                        <td>{{Str::substr($datos->deficiencia_particular,3)}}</td>
                        <td>{{Str::substr($datos->accion_particular,3)}}</td> --}}
                    </tr>
                    @endforeach
                @endforeach 
            </table>
        </div>
    </main>
    

    <div style="padding-top: 60px;">
        <table style="border: 0px;">
                <tr style="border: 0px;">
                    <td style="border: 0px; border-bottom: 1px solid black; border-collapse: collapse;">{{$reportes->autor}}</td>
                    <td style="border: 0px; border-bottom: 1px solid black; border-collapse: collapse;">Mtra. Martha Irene Sánchez Beltrán</td>
                </tr>
                <tr style="border: 0px;">
                    <td style="border: 0px;">Nombre y Firma del Docente</td>
                    <td style="border: 0px;">Vo. Bo. Nombre y firma <br> Coordinador Académico</td>
                </tr>
        </table>
    </div>
</body>

