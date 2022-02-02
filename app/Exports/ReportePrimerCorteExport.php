<?php

namespace App\Exports;

use App\Models\Rd_competencia;
use App\Models\Rd_pag;
use App\Models\Rd_pap;
use App\Models\ReporteDiagnostico;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportePrimerCorteExport implements FromView,  WithStyles
// ShouldAutoSize, ->es para que tengan ancho automatico
{
    use Exportable;
    /**
    // * @return \Illuminate\Support\Collection
    */
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true, 'size'=> 11 ]],
            2    => ['font' => ['bold' => true, 'size'=> 11 ]],
            3    => ['font' => ['bold' => true, 'size'=> 11 ]],
            5    => ['font' => ['bold' => true, 'size'=> 11 ]],
        ];
    }

    public function view():View
    {
        $detalles['raa']= DB::select('SELECT rap_unidads.*, raa_unidads.*, raas.*
        FROM raps INNER JOIN rap_unidads on raps.id = rap_unidads.rap_id, 
        raas INNER JOIN raa_unidads on raas.id = raa_unidads.raa_id
        WHERE raps.asignatura = raas.asignatura
        ORDER BY raps.autor');

        /* parte 1
        
        SELECT raa.*, pags.*, unidad.*, analisis.*, pags.id as pag_id,
            GROUP_CONCAT(DISTINCT paps.alumno_particular) as alumnos,
            GROUP_CONCAT(DISTINCT paps.deficiencia_particular) as deficiencia,
            GROUP_CONCAT(DISTINCT paps.accion_particular) as accion
        FROM `raas` as raa
            INNER JOIN `raa_pags` as pags ON pags.raa_id = raa.id
            INNER JOIN `raa_paps` as paps ON paps.raa_id = raa.id
            INNER JOIN `raa_unidads` as unidad ON unidad.raa_id = raa.id
            INNER JOIN `raa_analisis_resultados` as analisis ON analisis.raa_id = raa.id
        ORDER by raa.autor


        SELECT raa.*, unidad.*
        FROM `raas` as raa
            INNER JOIN `raa_unidads` as unidad ON unidad.raa_id = raa.id
        ORDER by raa.autor
        */ 
        
        return view('reporte.reporte_avance_academico.viewRaaExportExcel', $detalles);

    }
}
