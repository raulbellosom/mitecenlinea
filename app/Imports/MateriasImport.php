<?php

namespace App\Imports;

use App\Models\MateriasDocente;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MateriasImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    private $user_id;

    public function __construct()
    {
        $this->user_id = User::pluck('id', 'name');
        // var_dump($this->user_id);
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new MateriasDocente([
            'user_id'=> $this->user_id[$row['docente']],
            'materia'  => $row['materia'],
            'grado' => $row['grado'],
            'grupo'  => $row['grupo'],
            'turno' => $row['turno'],
            'carrera'  => $row['carrera'],
            'ht' => $row['ht'],
            'hp'  => $row['hp'],
        ]);
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
