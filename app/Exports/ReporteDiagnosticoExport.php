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
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReporteDiagnosticoExport implements FromView, WithStyles, WithEvents
{
    use Exportable;
    /**
    // * @return \Illuminate\Support\Collection
    */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size'=> 16 ]],
            2    => ['font' => ['bold' => true, 'size'=> 8 ]],
            3    => ['font' => ['bold' => true , 'size'=> 8 ]],
            't'    => ['font' => ['size'=> 7 ]],
            'u'    => ['font' => ['size'=> 7 ]],
            'v'    => ['font' => ['size'=> 7 ]],
            'w'    => ['font' => ['size'=> 7 ]],
            'x'    => ['font' => ['size'=> 7 ]],
            'y'    => ['font' => ['size'=> 7 ]],


            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:Y3')
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
            },
        ];
    }



    public function view():View
    {
        $detalles['reporte']= DB::select('SELECT rd.* ,pags.*,
        AVG(compe.ponderacion) as ponderacion, 
        GROUP_CONCAT(DISTINCT paps.alumno_particular) as alumnos,
        GROUP_CONCAT(DISTINCT paps.deficiencia_particular) as deficiencia,
        GROUP_CONCAT(DISTINCT paps.accion_particular) as accion
        FROM reporte_diagnosticos as rd
                INNER JOIN rd_pags as pags ON pags.r_diagnostico_id = rd.id
                INNER JOIN rd_competencias as compe ON compe.r_diagnostico_id = rd.id
                INNER JOIN rd_paps as paps ON paps.r_diagnostico_id = rd.id
        WHERE status = 2
        GROUP BY compe.r_diagnostico_id, rd.id,pags.id
        ORDER BY rd.autor');

        // $detalles['reporte']= DB::select('SELECT rd.*,pags.*, pags.id as pag_id, AVG(compe.ponderacion) as ponderacion FROM `reporte_diagnosticos` as rd 
        // INNER JOIN `rd_pags` as pags ON pags.r_diagnostico_id = rd.id
        // INNER JOIN `rd_competencias` as compe ON compe.r_diagnostico_id = rd.id
        // GROUP BY rd.id');


        // var_dump($detalles['reporte']);
        // die;
        
        return view('reporte.reporte_diagnostico.viewExportExcel', $detalles);

    }
// $reportes['reportes'] = ReporteDiagnosticoi8.::all();
        // // $ids = ReporteDiagnostico::all('id');
        // $ids =  DB::table('reporte_diagnosticos')->pluck('id');
        // // var_dump($ids);
        // // die;
        // $detalles['reporte']= DB::table('reporte_diagnosticos')
        // ->join('rd_pags','reporte_diagnosticos.id','=','rd_pags.r_diagnostico_id')->get();
        // foreach ($ids as $id) {
            
        //         // ->join('rd_competencias','reporte_diagnosticos.id','=','rd_competencias.r_diagnostico_id')
                
        //         // ->join('rd_paps','reporte_diagnosticos.id','=','rd_paps.r_diagnostico_id')
        //         // ->select('reporte_diagnosticos.*','rd_pags.*')
        //         // ->get();
        //         // $detalles=[];
        //     $r_diagnostico['r_diagnostico'] =  ReporteDiagnostico::where('id','=',$id)->paginate(1);
        //     $competencia = DB::table('rd_competencias')->where('r_diagnostico_id','=',$id)->pluck('ponderacion');
        //     $pap = Rd_pap::where('r_diagnostico_id','=',$id)->paginate(10);
        //     $pag = Rd_pag::where('r_diagnostico_id','=',$id)->paginate(10);
            
        //     $ponderacion = ($competencia->sum())/(count($competencia));
            
        //     // $r_diagnostico = Arr::add($r_diagnostico, 'r_diagnostico',$r_diagnostico,);
        //     // $r_diagnostico = Arr::add($r_diagnostico, 'ponderacion',$ponderacion);
        //     // $r_diagnostico = Arr::add($r_diagnostico, 'pap',$pap);
        //     // $r_diagnostico = Arr::add($r_diagnostico, 'pag',$pag);         
            
        //     // $detalles[] = Arr::add($detalles, 'r_diagnostico', $r_diagnostico);
        //     $detalles[] = $r_diagnostico;
        //     // $r_diagnostico = Arr::pull($r_diagnostico);
        // }
        // $var['prueba']=$detalles;

        
    // public function collection():View
    // {
    //     $reportes['reportes'] = ReporteDiagnostico::all();
    //     return view('reporte.reporte_diagnostico.viewExportExcel', $reportes);
    //     // return ReporteDiagnostico::all();
    // }
}
