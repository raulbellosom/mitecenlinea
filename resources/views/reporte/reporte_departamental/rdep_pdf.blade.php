<style>
    body {
        margin-top: 3cm;
        margin-left: 2cm;
        margin-right: 2cm;
        margin-bottom: 2cm;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
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
            <img style="width: 100%; height: 100px" src="{{asset('/assets/img/img/logo/background-top.png')}}" alt="adydo-logo">
        </div>
    </header>
    <footer>
        <img style="width: 100%" src="{{asset('/assets/img/img/logo/background-bot.png')}}" alt="adydo-logo"  >
    </footer>
    <div>
        <p style="text-align: center; font-weight: bold;">REPORTE DE EXAMEN DEPARTAMENTAL</p>
        <table style="border: 0px; padding-top: 30px;">
            <tr style="border: 0px;"> 
                <td style="text-align: left; border: 0px;">NOMBRE DEL DOCENTE</td>
                <td style="text-align: left; border: 0px;">{{$reportes->autor}}</td>
            </tr>
            <tr style="border: 0px;">
                <td style="text-align: left; border: 0px;">ASIGNATURA</td>
                <td style="text-align: left; border: 0px;">{{$reportes->asignatura}}</td>
            </tr>
        </table>
    </div>
    <div>
        <table style="border: 0px; padding-top: 50px;">
            <tr style="border: 0px;">
                <td style="border: 0px;">GRADO:</td>
                <td style="border: 0px;">{{$reportes->grado}}</td>
                <td style="border: 0px;">GRUPO:</td>
                <td style="border: 0px; text-transform: uppercase;">{{$reportes->grupo}}</td>
                <td style="border: 0px;">TURNO:</td>
                <td style="border: 0px; text-transform: uppercase;">{{$reportes->turno}}</td>
                <td style="border: 0px;">CARRERA:</td>
                <td style="border: 0px; text-transform: uppercase;">{{$reportes->carrera}}</td>
            </tr>
        </table>
    </div>
    <br>
    
    <div>
        <table>
            <tr>
                <th colspan="1" style="font-size: 10px;">SEMESTRE</th>
                <td colspan="3" style="font-size: 11px;">{{$reportes->semestre}}</td>
            </tr>
            <tr>
                <th colspan="2" style="font-size: 10px;">NÚMERO TOTAL DE ALUMNOS EN LISTA</th>
                <th colspan="2" style="font-size: 10px;">NÚMERO DE ALUMNOS QUE APLICARON EXAMEN</th>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 11px;">{{$reportes->total_alumnos_lista}}</td>
                <td colspan="2" style="font-size: 11px;">{{$reportes->total_alumnos_examen}}</td>
            </tr>
            <tr>
                <th colspan="2" style="font-size: 10px;">UNIDAD EVALUADA</th>
                <th colspan="2" style="font-size: 10px;">FECHA DE APLICACIÓN DEL EXAMEN</th>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 11px;">{{$reportes->unidad_evaluada}}</td>
                <td colspan="2" style="font-size: 11px;">{{$reportes->fecha_aplicacion_examen}}</td>
            </tr>
            <tr>
                <th colspan="2" style="font-size: 10px;">PROMEDIO DE ALUMNOS APROBADOS</th>
                <th colspan="2" style="font-size: 10px;">PROMEDIO GENERAL DEL GRUPO</th>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 11px;">{{$reportes->prom_alumnos_aprobados}}</td>
                <td colspan="2" style="font-size: 11px;">{{$reportes->promedio_general}}</td>
            </tr>
        </table>
    </div>
    <div>
        <table style="padding-top: 30px;">  
            <tr>
                <th style="font-size: 15px;">COMENTARIOS</th>
            </tr>
            <tr>
                <th style="font-size: 10px;">GENERALES</th>
            </tr>
            <tr>
                <td style="height: 100px">{{$reportes->comen_generales}}</td>
            </tr>
            <tr>
                <th style="font-size: 10px;">CASOS PARTICULARES</th>
            </tr>
            <tr>
                <td style="height: 100px">{{$reportes->comen_particulares}}</td>
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
                    <td style="border: 0px;">Nombre y firma del docente responsable</td>
                    <td style="border: 0px;">Nombre y firma del  <br> Coordinador Académico</td>
                </tr>
        </table>
    </div>
</body>

