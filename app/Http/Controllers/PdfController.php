<?php

namespace App\Http\Controllers;

use App\Models\Raa;
use App\Models\Raa_analisis_resultado;
use App\Models\Raa_pag;
use App\Models\Raa_pap;
use App\Models\Raa_unidad;
use App\Models\Rd_competencia;
use App\Models\Rd_pag;
use App\Models\Rd_pap;
use App\Models\RDepartamental;
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
        // $pdf = PDF::loadView('reporte.export',$competencias)->setPaper('letter', 'portrait'); //vertical  -----horizontal landscape

        return $pdf->download('reporte_diagnostico_'.$id.'.pdf');
    }

    public function downloadPDFRAA($id){
        
        $reportes = Raa::findOrFail($id);
        
        $unidades['unidad'] = Raa_unidad::where('raa_id','=',$id)->paginate(5);
        $pap['paps'] = Raa_pap::where('raa_id','=',$id)->paginate(5);
        $pag_def = Raa_pag::where('raa_id','=',$id)->value('deficiencia_general');
        $pag_id = Raa_pag::where('raa_id','=',$id)->value('id');
        $pag_ac = Raa_pag::where('raa_id','=',$id)->value('accion_general');
        $pag_time = Raa_pag::where('raa_id','=',$id)->value('tiempo_general');
        $analisis_descripcion = Raa_analisis_resultado::where('raa_id','=',$id)->value('analisis_descripcion');
        $analisis_acciones = Raa_analisis_resultado::where('raa_id','=',$id)->value('analisis_acciones');

        $unidades = Arr::add($unidades, 'pag_def',$pag_def);
        $unidades = Arr::add($unidades, 'pag_id',$pag_id);
        $unidades = Arr::add($unidades, 'pag_ac',$pag_ac);
        $unidades = Arr::add($unidades, 'pag_time',$pag_time);
        $unidades = Arr::add($unidades, 'pap',$pap);
        $unidades = Arr::add($unidades, 'reportes',$reportes);
        $unidades = Arr::add($unidades, 'analisis_descripcion',$analisis_descripcion);
        $unidades = Arr::add($unidades, 'analisis_acciones',$analisis_acciones);
        
        
        $pdf = PDF::loadView('reporte.reporte_avance_academico.raa_export', $unidades,  compact('reportes'))->setPaper('letter', 'portrait');// horizontal
        // $pdf = PDF::loadView('reporte.export',$competencias)->setPaper('letter', 'portrait'); //vertical

        return $pdf->download('reporte_avance_academico'.$id.'.pdf');
    }

    public function downloadPDFRAP($id){
        
        $reportes = Raa::findOrFail($id);
        
        $unidades['unidad'] = Raa_unidad::where('raa_id','=',$id)->paginate(5);
        $pap['paps'] = Raa_pap::where('raa_id','=',$id)->paginate(5);
        $pag_def = Raa_pag::where('raa_id','=',$id)->value('deficiencia_general');
        $pag_id = Raa_pag::where('raa_id','=',$id)->value('id');
        $pag_ac = Raa_pag::where('raa_id','=',$id)->value('accion_general');
        $pag_time = Raa_pag::where('raa_id','=',$id)->value('tiempo_general');
        $analisis_descripcion = Raa_analisis_resultado::where('raa_id','=',$id)->value('analisis_descripcion');
        $analisis_acciones = Raa_analisis_resultado::where('raa_id','=',$id)->value('analisis_acciones');

        $unidades = Arr::add($unidades, 'pag_def',$pag_def);
        $unidades = Arr::add($unidades, 'pag_id',$pag_id);
        $unidades = Arr::add($unidades, 'pag_ac',$pag_ac);
        $unidades = Arr::add($unidades, 'pag_time',$pag_time);
        $unidades = Arr::add($unidades, 'pap',$pap);
        $unidades = Arr::add($unidades, 'reportes',$reportes);
        $unidades = Arr::add($unidades, 'analisis_descripcion',$analisis_descripcion);
        $unidades = Arr::add($unidades, 'analisis_acciones',$analisis_acciones);
        
        
        $pdf = PDF::loadView('reporte.reporte_avance_academico.raa_export', $unidades,  compact('reportes'))->setPaper('letter', 'portrait');// horizontal
        // $pdf = PDF::loadView('reporte.export',$competencias)->setPaper('letter', 'portrait'); //vertical

        return $pdf->download('reporte_avance_academico'.$id.'.pdf');
    }

    public function downloadPDFRDEP($id){
        
        $reportes = RDepartamental::findOrFail($id);
        
        
        
        $pdf = PDF::loadView('reporte.reporte_departamental.rdep_export',  compact('reportes'))->setPaper('letter', 'portrait');// horizontal
        // $pdf = PDF::loadView('reporte.export',$competencias)->setPaper('letter', 'portrait'); //vertical

        return $pdf->download('reporte_departamental'.$id.'.pdf');
    }

    public function guest()
    {
        return view("docente.guest");
    }
}
