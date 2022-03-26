<?php

namespace App\Exports;

use App\Models\Evento;
use Maatwebsite\Excel\Concerns\FromCollection;

class EventosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Evento::all();
    }
}
