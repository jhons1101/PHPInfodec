<?php

namespace App\Exports;

use App\Models\Prueba;
use Maatwebsite\Excel\Concerns\FromCollection;

class PruebaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prueba::all();
    }
}
