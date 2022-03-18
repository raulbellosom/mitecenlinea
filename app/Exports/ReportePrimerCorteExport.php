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

class ReportePrimerCorteExport implements FromView, WithStyles, WithEvents, WithDrawings
// ShouldAutoSize, ->es para que tengan ancho automatico
{
    use Exportable;
    /**
    // * @return \Illuminate\Support\Collection
    */
    public function styles(Worksheet $sheet)
    {
        return [
            // 1    => ['font' => ['bold' => true, 'size'=> 11 ]],
            3    => ['font' => ['bold' => true, 'size'=> 12 ]],
            4    => ['font' => ['bold' => true, 'size'=> 12 ]],
            5    => ['font' => ['bold' => true, 'size'=> 12 ]],
            7    => ['font' => ['bold' => true, 'size'=> 14 ]],
            8    => ['font' => ['bold' => true, 'size'=> 8 ]],
            9    => ['font' => ['bold' => true, 'size'=> 8 ]],
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/assets/img/logo/banner-tec.jpg'));
        $drawing->setWidth(1100);
        $drawing->setCoordinates('C1');

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                //asingar alto
                $event->sheet->getDelegate()->getRowDimension('8')->setRowHeight(25);
                $event->sheet->getDelegate()->getRowDimension('9')->setRowHeight(80);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(90);
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
                $event->sheet->getDelegate()->getColumnDimension('P')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('Q')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('R')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('S')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('T')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('U')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('V')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('W')->setWidth(12);
                 //asignar rotacion
                $event->sheet->getStyle("D9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("E9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("F9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("G9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("H9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("I9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("J9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("K9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("L9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("M9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("N9")->getAlignment()->setTextRotation(90);
                $event->sheet->getStyle("O9")->getAlignment()->setTextRotation(90);

                //CENTRAR TEXTO
                $event->sheet->getDelegate()->getStyle('A1:W9')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // AJUSTAR TEXTO A LA CELDA
                $event->sheet->getStyle('P8:W9')->getAlignment()->setWrapText(true);
                
                // COLOR DE FONDO
                $event->sheet->getDelegate()->getStyle('A7:W7')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB('FBE4D5');

                // BORDER MEDIO
                $event->sheet->getStyle('A7:W7')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);

                $event->sheet->getDelegate()->getStyle('A8:W9')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB('D8D8D8');

                $event->sheet->getStyle('A8:W9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);

                $event->sheet->getStyle('B8:B9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('C8:C9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('E9:E9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('G9:G9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('I9:I9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('L9:L9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('N9:N9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('Q9:Q9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('S9:S9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('D8:J8')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('D9:J9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('K8:O8')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('K9:O9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('P8:T8')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('V9:V9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('P9:T9')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('U9:W8')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]);
                $event->sheet->getStyle('U9:W9')->applyFromArray([
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
