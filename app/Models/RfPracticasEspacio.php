<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfPracticasEspacio extends Model
{
    use HasFactory;

    protected $fillable = [
        'espacios_aulas',
        'espacios_talleres',
        'espacios_laboratorios',
        'no_practicas_programadas',
        'porcentaje_practicas',
        'nombre_practicas',
        'e_canon_por_uso',
        'e_canon_tipo',
        'e_pc_por_uso',
        'e_pc_tipo',
        'e_rotafolio_por_uso',
        'e_rotafolio_tipo',
        'e_tv_por_uso',
        'e_tv_tipo',
        'e_dvd_por_uso',
        'e_dvd_tipo',
        'e_otro',
        'e_otro_por_uso',
        'e_otro_tipo',
        'rf_id',
    ];
}
