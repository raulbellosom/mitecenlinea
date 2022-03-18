<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReporteDepartamentalExport implements FromView, WithStyles, WithEvents, WithDrawings
{
    use Exportable;
    /**
    // * @return \Illuminate\Support\Collection
    */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size'=> 12 ]],
            2    => ['font' => ['bold' => true, 'size'=> 12 ]],
            3    => ['font' => ['bold' => true, 'size'=> 12 ]],
            4    => ['font' => ['bold' => true, 'size'=> 12 ]],
            5    => ['font' => ['bold' => true, 'size'=> 12 ]],
            6    => ['font' => ['bold' => true, 'size'=> 12 ]],
            7    => ['font' => ['bold' => true, 'size'=> 11 ]],
            8    => ['font' => ['bold' => true, 'size'=> 11 ]],
            9    => ['font' => ['bold' => true, 'size'=> 11 ]],


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
        $drawing->setCoordinates('B1');

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:J9')
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getRowDimension('9')->setRowHeight(30);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(90);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(15);
                $event->sheet->getDelegate()->getStyle('A6:J6')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setRGB('D0D3D4');
                $event->sheet->getDelegate()->getStyle('A7:J9')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setRGB('D8D8D8');
                $event->sheet->getStyle('A6:J6')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('A7:J9')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('B7:B100')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('C7:C100')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('D8:D100')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('J8:J100')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('D7:J7')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                    $event->sheet->getStyle('E9:E100')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('E8:H8')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('F9:F100')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('G9:G100')->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                'color' => ['rgb' => '000000'],
                            ],
                        ]
                    ]);
                $event->sheet->getStyle('H9:H100')->applyFromArray([
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
        
        $detalles['reporte']= DB::select('SELECT * FROM r_departamentals
        ORDER by autor');

        // $detalles['reporte']= DB::select('SELECT rd.*,pags.*, pags.id as pag_id, AVG(compe.ponderacion) as ponderacion FROM `reporte_diagnosticos` as rd 
        // INNER JOIN `rd_pags` as pags ON pags.r_diagnostico_id = rd.id
        // INNER JOIN `rd_competencias` as compe ON compe.r_diagnostico_id = rd.id
        // GROUP BY rd.id');


        // var_dump($detalles['reporte']);
        // die;
        
        return view('reporte.reporte_departamental.viewDepExportExcel', $detalles);

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
