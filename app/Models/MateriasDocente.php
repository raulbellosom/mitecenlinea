<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriasDocente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'materia',
        'grado',
        'grupo',
        'turno',
        'carrera',
        'ht',
        'hp',
    ];
}
