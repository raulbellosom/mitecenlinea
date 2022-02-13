<style>
    body {
        margin-top: 4cm;
        margin-left: 2cm;
        margin-right: 2cm;
        margin-bottom: 3cm;
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
        <div>
            <table class="prueba">
                <tr>
                    <td rowspan="3" style="width: 125px"><img style="width: 125px" src="{{asset('/assets/img/logo/tec-vallarta.png')}}" alt="adydo-logo"  ></td>
                    <td><b>FORMULARIO</b></td>
                    <td colspan="2">Resultado de evaluacion diagnostica</td>
                </tr>
                <tr>
                    <td><b>CÓDIGO</b></td>
                    <td><b>VERSIÓN</b></td>
                    <td><b>ÚLTIMA REVISIÓN</b></td>
                </tr>
                <tr>
                    <td>AAP-PCR-04/F04</td>
                    <td>3</td>
                    <td>06-03-2017</td>
                </tr>
            </table>
        </div>
    </header>
    <footer>
        <img style="width: 16cm" src="{{asset('/assets/img/logo/background-bot.png')}}" alt="adydo-logo"  >
    </footer>

    <div style="text-align: right">
        <p><u><b>Fecha:</b>  {{$reportes->created_at}}</u> </p>
    </div>
    
    <div>
        <table >  
            <thead>
                <tr>
                    <th colspan="4">Nombre del Docente</th>
                    <th colspan="2">Nombre de la Asignatura</th>
                </tr>
                <tr>
                    <td colspan="4">{{$reportes->autor}}</td>
                    <td colspan="2">{{$reportes->asignatura}}</td>
                </tr>
                <tr>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Turno</th>
                    <th>Carrera</th>
                    <th>Tipo de evaluacion</th>
                    <th>No. de alumnos</th>
                </tr>
                <tr>
                    <td>{{$reportes->grado}}</td>
                    <td>{{$reportes->grupo}}</td>
                    <td>{{$reportes->turno}}</td>
                    <td>{{$reportes->carrera}}</td>
                    <td>{{$reportes->tipo_evaluacion}}</td>
                    <td>{{$reportes->cantidad_alumnos}}</td>
                </tr>
            </thead>
        </table>
    </div>

    <div style="padding-top: 1cm;">
        <table>
            <thead>
                <tr>
                    <th>Conocimientos, competencias especificas y/o genericas previas</th>
                    <th>Nivel alcanzado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competencia as $competencias)
                    <tr style="text-align: left">
                        <td style="text-align: left">{{$competencias->competencia}}</td>
                        <td >
                            @if ($competencias->ponderacion==0)
                                Nulo
                            @endif
                            @if ($competencias->ponderacion==1)
                                Bajo
                            @endif
                            @if ($competencias->ponderacion==2)
                                Aceptable
                            @endif
                            @if ($competencias->ponderacion==3)
                                Bueno
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <p><u><b>Plan de acción</b></u></p>
    </div>
    
    <div>
        <table>  
            <tr>
                <th rowspan="2">General</th>
                <th>Deficiencias</th>
                <th>Acciones sugeridas y recursos necesarios</th>
                <th>Tiempo de ejecución e impacto en cronograma</th>
            </tr>
            <tr>
                <td>{{$pag_def}}</td>
                <td>{{$pag_ac}}</td>
                <td>{{$pag_time}}</td>
            </tr>
            <tr >
                <th rowspan="5">Particular</th>
                <th>Nombre del alumno</th>
                <th>Deficiencias (temas, áreas, otros)</th>
                <th>Acción sugerida (académica, psicologica, etc)</th>
            </tr>
                @foreach ($pap as $paps)
                    @foreach ($paps as $datos)
                    <tr>
                        <td>{{$datos->alumno_particular}}</td>
                        <td>{{$datos->deficiencia_particular}}</td>
                        <td>{{$datos->accion_particular}}</td>]
                    </tr>
                    @endforeach
                @endforeach 
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
</body>

