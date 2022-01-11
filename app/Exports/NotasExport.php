<?php

namespace App\Exports;

use App\Models\Nota;
use Maatwebsite\Excel\Concerns\FromCollection;

class NotasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nota::all();
    }
}
