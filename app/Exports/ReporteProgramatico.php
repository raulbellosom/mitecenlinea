<?php

namespace App\Exports;

use App\Models\Rap;
use App\Models\Rap_unidad;
use App\Models\RapDesgloseHoras;
use App\Models\RapPracticaPlaneada;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReporteProgramatico implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
    // * @return \Illuminate\Support\Collection
    */
    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         // Style the first row as bold text.
    //         1    => ['font' => ['bold' => true, 'size'=> 13 ]],
    //         2    => ['font' => ['bold' => true, 'size'=> 13 ]],
    //         3    => ['font' => ['bold' => true, 'size'=> 13 ]],


    //         // Styling a specific cell by coordinate.
    //         // 'B2' => ['font' => ['italic' => true]],

    //         // Styling an entire column.
    //         // 'C'  => ['font' => ['size' => 16]],
    //     ];
    // }

    public function view(): View
    {
        $id = 5;
        $reportes = Rap::findOrFail($id);
        
        $unidades['unidad'] = Rap_unidad::where('rap_id','=',$id)->paginate(5);
        $horas = DB::select('select * from rap_desglose_horas where rap_id = ?', [$id]);
        $porcentaje_horas_tecnologia = RapDesgloseHoras::where('rap_id','=',$id)->value('porcentaje_horas_tecnologia');
        $diferencia = RapPracticaPlaneada::where('rap_id','=',$id)->value('diferencias');
        $practicas = DB::select('select * from rap_practica_planeadas where rap_id = ?', [$id]);

        $unidades = Arr::add($unidades, 'porcentaje_horas_tecnologia',$porcentaje_horas_tecnologia);
        $unidades = Arr::add($unidades, 'diferencia',$diferencia);
        $unidades = Arr::add($unidades, 'horas',$horas);
        $unidades = Arr::add($unidades, 'practicas',$practicas);
        
        return view('reporte.reporte_avance_programatico.rap_export', $unidades,  compact('reportes'));
    }
}
