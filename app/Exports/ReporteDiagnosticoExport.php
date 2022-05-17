<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReporteDiagnosticoExport implements FromView, WithStyles, WithEvents, WithDrawings
{
    use Exportable;
    /**
    // * @return \Illuminate\Support\Collection
    */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            3    => ['font' => ['bold' => true, 'size'=> 16 ]],
            't'    => ['font' => ['size'=> 7 ]],
            'u'    => ['font' => ['size'=> 7 ]],
            'v'    => ['font' => ['size'=> 7 ]],
            'w'    => ['font' => ['size'=> 7 ]],
            'x'    => ['font' => ['size'=> 7 ]],
            'y'    => ['font' => ['size'=> 7 ]],
            4    => ['font' => ['bold' => true, 'size'=> 8 ]],
            5    => ['font' => ['bold' => true , 'size'=> 8 ]],


            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/assets/img/logo/banner-tec.jpg'));
        $drawing->setWidth(1100);
        $drawing->setCoordinates('D1');

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                //asingar alto
                $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(25);
                $event->sheet->getDelegate()->getRowDimension('5')->setRowHeight(60);
                //asignar ancho
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('O')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('P')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('Q')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('R')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('S')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('T')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('U')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('V')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('W')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('X')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('Y')->setWidth(25);
                 //asignar rotacion
                $event->sheet->getStyle("D5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("E5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("F5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("G5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("H5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("I5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("J5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("K5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("L5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("M5")->getAlignment()->setTextRotation(90);

                $event->sheet->getStyle("N4")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("O4")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("P5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("Q5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("R5")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("S5")->getAlignment()->setTextRotation(90);

                //CENTRAR TEXTO
                $event->sheet->getDelegate()->getStyle('A1:Y5')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(90);
                $event->sheet->getDelegate()->getStyle('A3:Y3')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB('FBE4D5');
                $event->sheet->getStyle('A3:Y3')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getDelegate()->getStyle('A4:Y5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB('D8D8D8');
                $event->sheet->getStyle('A4:Y5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('B4:B5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('C4:C5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('E5:E5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('I5:I5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('G5:G5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('L5:L5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('Q5:Q5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('R5:R5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('D4:J4')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('D5:J5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('K4:M4')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('K5:M5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('O4:O5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('P4:S4')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('P5:S5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('U5:U5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('X5:X5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('T4:V4')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('T5:V5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('W4:Y4')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('W5:Y5')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
            },
        ];
    }



    public function view():View
    {
        $detalles['reporte']= DB::select('SELECT rd.* ,pags.*,
        AVG(compe.ponderacion) as ponderacion, 
        -- array_agg(DISTINCT paps.alumno_particular) as alumnos,
        -- array_agg(DISTINCT paps.deficiencia_particular) as deficiencia,
        -- array_agg(DISTINCT paps.accion_particular) as accion
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
