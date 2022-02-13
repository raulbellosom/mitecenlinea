<?php

use App\Exports\ReporteDiagnosticoExport;
use App\Exports\ReportePrimerCorteExport;
use App\Exports\ReporteDepartamentalExport;
use App\Exports\ReporteProgramatico;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RaaAnalisisResultadoController;
use App\Http\Controllers\RaaController;
use App\Http\Controllers\RaaPagController;
use App\Http\Controllers\RaaPapController;
use App\Http\Controllers\RaaUnidadController;
use App\Http\Controllers\RapController;
use App\Http\Controllers\RapDesgloseHorasController;
use App\Http\Controllers\RapPracticaPlaneadaController;
use App\Http\Controllers\RapUnidadController;
use App\Http\Controllers\ReporteDiagnosticoController;
use App\Http\Controllers\RdCompetenciaController;
use App\Http\Controllers\RDepartamentalController;
use App\Http\Controllers\RdPagController;
use App\Http\Controllers\RdPapController;
use App\Http\Controllers\RfCursoController;
use App\Http\Controllers\RFinalController;
use App\Http\Controllers\RfPracticasEspacioController;

//probablemente borrar este auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('reporte.indexReporte');
});

//---------------------------Rutas para la autenticacion
// Auth::routes(['register'=>false,'reset'=>false]);
Auth::routes(['reset'=>false]);  //este es para habilitar el registro pero oculta el reseteo de contraseña
Auth::routes(['register'=>false,'reset'=>false]); //de esta manera queda oculto el registro y el reseteo de contraseña


//---------------------------Rutas para el index docente
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [DocenteController::class, 'index'])->name('home');
    Route::get('/home', [DocenteController::class, 'index']);
    Route::get('docente/perfil', [DocenteController::class, 'show']);
    
    Route::resource('docente',DocenteController::class);
});


//---------------------------Rutas para los reportes
Route::group(['middleware'=>'auth'], function(){
    Route::get('reporte/index', [ReporteController::class, 'index']);
    Route::get('reporte/show', [ReporteController::class, 'show']);
    // Route::get('administrativo', [ReporteController::class, 'admin'])->name('admin');
    Route::resource('reporte', ReporteController::class);
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('administrativo', [ReporteController::class, 'admin'])->name('administrativo');
});

//---------------------Reporte Diagnostico Rutas
Route::group(['middleware'=>'auth'], function(){
    Route::get('reporte_diagnostico/index', [ReporteDiagnosticoController::class, 'index']);
    Route::get('reporte_diagnostico/create', [ReporteDiagnosticoController::class, 'create']);
    Route::get('reporte_diagnostico/show', [ReporteDiagnosticoController::class, 'show']);
    Route::post('reporte_diagnostico/finalizar', [ReporteDiagnosticoController::class, 'update']);
    Route::post('reporte_diagnostico/competencia', [RdCompetenciaController::class, 'create']);
    // Route::post('reporte_diagnostico/competencia', [RdCompetenciaController::class, 'addComp']);
    Route::post('reporte_diagnostico/pag', [RdPagController::class, 'addPag']);
    Route::post('reporte_diagnostico/pap', [RdPapController::class, 'addPap']);
    Route::resource('reporte_diagnostico', ReporteDiagnosticoController::class);
});
Route::group(['middleware'=>'auth'], function(){
    Route::resource('rd_competencia', RdCompetenciaController::class);
    Route::resource('rd_pag', RdPagController::class);
    Route::resource('rd_pap', RdPapController::class);
});

//-------------------------Reporte Avance Academico
Route::group(['middleware'=>'auth'], function(){
    Route::get('reporte_avance_academico/index', [RaaController::class, 'index'])->name('raa-index');
    Route::get('reporte_avance_academico/create', [RaaController::class, 'create']);
    Route::post('reporte_avance_academico/evaluacion_por_unidad', [RaaUnidadController::class, 'addUnidad']);
    Route::post('reporte_avance_academico/crear_analisis', [RaaAnalisisResultadoController::class, 'addAnalisis']);
    Route::post('reporte_avance_academico/agregar_pag', [RaaPagController::class, 'addRaaPag']);
    Route::post('reporte_avance_academico/agregar_pap', [RaaPapController::class, 'addRaaPap']);
    Route::post('reporte_avance_academico/finalizar', [RaaController::class, 'update']);
    Route::resource('reporte_avance_academico', RaaController::class);
});
Route::group(['middleware'=>'auth'], function(){
    Route::resource('raa_evaluacion_unidad', RaaUnidadController::class);
    Route::resource('raa_analisis_resultados', RaaAnalisisResultadoController::class);
    Route::resource('raa_pag', RaaPagController::class);
    Route::resource('raa_pap', RaaPapController::class);
});

//-------------------------Reporte Avance Programatico
Route::group(['middleware'=>'auth'], function(){
    Route::get('reporte_avance_programatico/index', [RapController::class, 'index'])->name('rap-index');
    Route::get('reporte_avance_programatico/create', [RapController::class, 'create']);
    Route::post('reporte_avance_programatico/descripcion_de_la_unidad', [RapUnidadController::class, 'addUnidad']);
    Route::post('reporte_avance_programatico/borrar_unidad', [RapUnidadController::class, 'deleteUnidad']);
    Route::post('reporte_avance_programatico/crear_desglose_horas', [RapDesgloseHorasController::class, 'addDesgloseHoras']);
    Route::post('reporte_avance_programatico/borrar_desglose_horas', [RapDesgloseHorasController::class, 'deleteDesgloseHoras']);
    Route::post('reporte_avance_programatico/agregar_practicas_planeadas', [RapPracticaPlaneadaController::class, 'addPracticasPlaneadas']);
    Route::post('reporte_avance_programatico/borrar_practicas_planeadas', [RapPracticaPlaneadaController::class, 'deletePracticasPlaneadas']);
    Route::post('reporte_avance_programatico/finalizar', [RapController::class, 'update']);
    // Route::post('reporte_avance_academico/borrar_pap', [RaaPapController::class, 'deleteRaaPap']);
    Route::resource('reporte_avance_programatico', RapController::class);
});
Route::group(['middleware'=>'auth'], function(){
    Route::resource('rap_descripcion_unidad', RapUnidadController::class);
    Route::resource('rap_desglose_horas', RapDesgloseHorasController::class);
    Route::resource('rap_practicas_planeadas', RapPracticaPlaneadaController::class);
});


//-------------------------Reporte Departamental
Route::group(['middleware'=>'auth'], function(){
    Route::get('reporte_departamental/index', [RDepartamentalController::class, 'index'])->name('rdep-index');
    Route::get('reporte_departamental/create', [RDepartamentalController::class, 'create']);
    Route::resource('reporte_departamental', RDepartamentalController::class);
});

//-------------------------Reporte Final
Route::group(['middleware'=>'auth'], function(){
    Route::get('reporte_final/index', [RFinalController::class, 'index'])->name('rfinal-index');
    Route::get('reporte_final/create', [RFinalController::class, 'create']);
    Route::post('reporte_final/agregar_curso', [RfCursoController::class, 'addCurso']);
    Route::post('reporte_final/eliminar_curso', [RfCursoController::class, 'deleteCurso']);
    Route::post('reporte_final/addPracticasEspacio', [RfPracticasEspacioController::class, 'addPracticasEspacio']);
    Route::post('reporte_final/deletePracticasEspacio', [RfPracticasEspacioController::class, 'deletePracticasEspacio']);
    // Route::post('reporte_avance_programatico/agregar_practicas_planeadas', [RapPracticaPlaneadaController::class, 'addPracticasPlaneadas']);
    // Route::post('reporte_avance_programatico/borrar_practicas_planeadas', [RapPracticaPlaneadaController::class, 'deletePracticasPlaneadas']);
    // Route::post('reporte_avance_academico/agregar_pap', [RaaPapController::class, 'addRaaPap']);
    // Route::post('reporte_avance_academico/borrar_pap', [RaaPapController::class, 'deleteRaaPap']);
    Route::resource('reporte_final', RFinalController::class);
});

Route::get('download', function () {
    return (new ReporteDiagnosticoExport)->download('diagnosticos.xlsx');
})->middleware('auth');

Route::group(['middleware'=>'auth'], function(){
    Route::get('download_reporte_avance_programatico', function () {
        return (new ReportePrimerCorteExport)->download('reporte_primer_corte.xlsx');
    });
    Route::get('download_reporte_departamental', function () {
        return (new ReporteDepartamentalExport)->download('reporte_departamental.xlsx');
    });
    Route::get('download_programatico/{id}', function () {
        return (new ReporteProgramatico)->download('reporte_.pdf');
    });
});

Route::group(['middleware'=>'auth'], function(){
    // Route::get('reporte_diagnostico/', [ReporteDiagnosticoController::class, 'index']);
    Route::get('infoUser/index', [InfoUserController::class, 'index']);
    Route::get('infoUser/create', [InfoUserController::class, 'create']);
    // Route::get('info_user/edit', [InfoUserController::class, 'edit']);
    Route::resource('infoUser', InfoUserController::class);
});
Route::resource('infoUser', InfoUserController::class);

//---------------------------Rutas para los reportes
// Route::get('/get-all-reportes', [PdfController::class, 'getAllPdfController'])->middleware('auth');
// Route::get('/get-reporte', [PdfController::class, 'getReporte'])->middleware('auth');
Route::get('/downloadPDF/{id}', [PdfController::class, 'downloadPDF'])->middleware('auth');
Route::get('/download_reporte_avance_academico/{id}', [PdfController::class, 'downloadPDFRAA'])->middleware('auth');
Route::get('/download_reporte_avance_programatico/{id}', [PdfController::class, 'downloadPDFRAP'])->middleware('auth');
Route::get('/download_reporte_departamental/{id}', [PdfController::class, 'downloadPDFRDEP'])->middleware('auth');