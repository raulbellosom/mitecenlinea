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
                <td rowspan="3" style="width: 100px"><img style="width: 125px" src="{{asset('../resources/img/logo/tec-vallarta.png')}}" alt="adydo-logo"  ></td>
                <td>FORMULARIO</td>
                <td colspan="2">Reporte de Avance Programático</td>
            </tr>
            <tr>
                <td>CÓDIGO</td>
                <td>VERSIÓN</td>
                <td>ÚLTIMA REVISIÓN</td>
            </tr>
            <tr>
                <td>AAP-PRC-04/F07</td>
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
            <p><b>Semestre:</b> {{$reportes->semestre}}</p>
        </div>
        
        <div>
            <table>
                <tr>
                    <th>Nombre del Docente</th>
                    <th colspan="4">Periodo de Monitoreo</th>
                </tr>
                <tr>
                    <td>{{$reportes->autor}}</td>
                    <td colspan="4">{{$reportes->asignatura}}</td>
                </tr>
                <tr>
                    <th>Nombre de la Asignatura</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Turno</th>
                    <th>Carrera</th>
                </tr>
                <tr>
                    <td>{{$reportes->asignatura}}</td>
                    <td>{{$reportes->grado}}</td>
                    <td>{{$reportes->grupo}}</td>
                    <td>{{$reportes->turno}}</td>
                    <td>{{$reportes->carrera}}</td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            <table>  
                <tr>
                    <th>Unidad</th>
                    <th>Anotar Nombre de la Unidad</th>
                    <th>% De Avance</th>
                    <th>No.de Criterios Aplicados a la Unidad</th>
                    <th>% De Alumnos Aprobados(por unidad)</th>
                    <th>Promedio de Calificaciones por Unidad (Solo de los alumnos aprobados)</th>
                </tr>
                @foreach ($unidad as $unidades)
                    <tr>
                        <td>{{$unidades->no_unidad}}</td>
                        <td>{{$unidades->nombre_unidad}}</td>
                        <td>{{$unidades->porcentaje_avance}}</td>
                        <td>{{$unidades->no_criterios}}</td>
                        <td>{{$unidades->porcentaje_alumnos_aprobados}}</td>
                        <td>{{$unidades->promedio_calificaciones}}</td>
                @endforeach
            </table>

            <table>  
                <tr>
                    <th colspan="6">Desglose de Horas Impartidas en el Monitoreo</th>
                    <th >% de Horas Clase con el Uso de la Tecnología (cañón, t.v, dvd talleres, etc)</th>
                </tr>
                <tr>
                    <td>Horas Teóricas</td>
                    <td>Horas Prácticas</td>
                    <td>Total</td>
                    <td><small>¿Cuántas horas prácticas fueron realizadas en aula?</small></td>
                    <td> <small>¿Cuántas horas prácticas fueron realizadas en eventos académicos Internos o externos? (Conferencias, visitas  a empresas, etc.)</small> </td>
                    <td>¿Cuántas horas Prácticas fueron realizadas en talleres o laboratorios?</td>
                    <td rowspan="2">{{$porcentaje_horas_tecnologia}}</td>
                </tr>
                @foreach ($horas as $hora)
                    <tr>
                        <td>{{$hora->horas_teoricas}}</td>
                        <td>{{$hora->horas_practicas}}</td>
                        <td>{{$hora->total_horas}}</td>
                        <td>{{$hora->cantidad_horas_aula}}</td>
                        <td>{{$hora->cantidad_horas_externas}}</td>
                        <td>{{$hora->cantidad_horas_taller}}</td>
                    </tr>
                @endforeach
            </table>

            <table>  
                <tr >
                    <th>Cantidad de Prácticas Realizadas Planeadas</th>
                    <th>¿Cuántas Prácticas Planeadas Realizó?</th>
                    <th>Nombre de las Prácticas  Realizadas</th>
                    <th>Observaciones</th>
                </tr>
                @foreach ($practicas as $practica)
                    <tr>
                        <td>{{$practica->practicas_planeadas}}</td>
                        <td>{{$practica->practicas_realizadas}}</td>
                        <td>{{$practica->nombre_practicas}}</td>
                        <td>{{$practica->observaciones}}</td>
                    </tr>
                @endforeach
            </table>

            <table>  
                <tr >
                    <th>Cantidad de Prácticas Realizadas no Planeadas</th>
                    <th>Nombre de la Práctica</th>
                    <th>Talleres y/o Laboratorios Utilizados</th>
                </tr>
                @foreach ($practicas as $practica)
                    <tr>
                        <td>{{$practica->practicas_no_planeadas}}</td>
                        <td>{{$practica->nombre_no_planeadas}}</td>
                        <td>{{$practica->talleres}}</td>
                    </tr>
                @endforeach
            </table>
            <table>  
                <tr>
                    <th>Observaciones (Diferencias de lo Planeado a lo Realizado)</th> 
                </tr>
                <tr>
                    <td>{{$diferencia}}</td>
                </tr>
            </table>
        </div>
    
        <div style="padding-top: 50px;">
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
    </main>
</body>

