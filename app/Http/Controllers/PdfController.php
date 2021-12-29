<?php

namespace App\Http\Controllers;

use App\Models\Rd_competencia;
use App\Models\Rd_pag;
use App\Models\Rd_pap;
use App\Models\Reporte;
use App\Models\ReporteDiagnostico;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PdfController extends Controller
{
    public function getReporte(Request $request)
    {
        $reportes = ReporteDiagnostico::findOrFail($request->input('r_diagnostico_id'));
        $pap['paps'] = Rd_pap::where('r_diagnostico_id','=',$request->input('r_diagnostico_id'))->paginate(5);
        $competencias['competencia'] = Rd_competencia::where('r_diagnostico_id','=',$request->input('r_diagnostico_id'))->paginate(5);
        $pag_def = Rd_pag::where('r_diagnostico_id','=',$request->input('r_diagnostico_id'))->value('deficiencia_general');
        $pag_id = Rd_pag::where('r_diagnostico_id','=',$request->input('r_diagnostico_id'))->value('id');
        $pag_ac = Rd_pag::where('r_diagnostico_id','=',$request->input('r_diagnostico_id'))->value('accion_general');
        $pag_time = Rd_pag::where('r_diagnostico_id','=',$request->input('r_diagnostico_id'))->value('tiempo_general');

        $competencias = Arr::add($competencias, 'pag_def',$pag_def);
        $competencias = Arr::add($competencias, 'pag_id',$pag_id);
        $competencias = Arr::add($competencias, 'pag_ac',$pag_ac);
        $competencias = Arr::add($competencias, 'pag_time',$pag_time);
        $competencias = Arr::add($competencias, 'pap',$pap);
        
        return view('reporte.export', $competencias,  compact('reportes'));
        // return $pdf->download('reporte.pdf');
        // return $dom->stream('reporte.pdf');
    }

    public function downloadPDF($id){
        
        $reportes = ReporteDiagnostico::findOrFail($id);
        
        $competencias['competencia'] = Rd_competencia::where('r_diagnostico_id','=',$id)->paginate(5);
        $pap['paps'] = Rd_pap::where('r_diagnostico_id','=',$id)->paginate(5);
        $pag_def = Rd_pag::where('r_diagnostico_id','=',$id)->value('deficiencia_general');
        $pag_id = Rd_pag::where('r_diagnostico_id','=',$id)->value('id');
        $pag_ac = Rd_pag::where('r_diagnostico_id','=',$id)->value('accion_general');
        $pag_time = Rd_pag::where('r_diagnostico_id','=',$id)->value('tiempo_general');

        $competencias = Arr::add($competencias, 'pag_def',$pag_def);
        $competencias = Arr::add($competencias, 'pag_id',$pag_id);
        $competencias = Arr::add($competencias, 'pag_ac',$pag_ac);
        $competencias = Arr::add($competencias, 'pag_time',$pag_time);
        $competencias = Arr::add($competencias, 'pap',$pap);
        $competencias = Arr::add($competencias, 'reportes',$reportes);
        
        
        $pdf = PDF::loadView('reporte.export', $competencias,  compact('reportes'))->setPaper('letter', 'landscape');// horizontal
        // $pdf = PDF::loadView('reporte.export',$competencias)->setPaper('letter', 'portrait'); //vertical

        return $pdf->download('reporte_diagnostico_'.$id.'.pdf');
    }

    public function guest()
    {
        return view("docente.guest");
    }
}
