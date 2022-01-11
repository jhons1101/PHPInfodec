<?php

namespace App\Imports;

use App\Models\Nota;
use Maatwebsite\Excel\Concerns\ToModel;

class NotasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nota([
            'cod_nota' => $row[0],
            'nom_estudiante' => $row[1],
            'parcial1' => $row[2],
            'parcial2' => $row[3],
            'parcial3' => $row[4],
            'final' => $row[5],
            'created_at' => $row[6],
            'updated_at' => $row[7],
        ]);
    }
}
