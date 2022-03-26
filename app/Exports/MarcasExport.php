<?php

namespace App\Exports;

use App\Models\Marca;
use Maatwebsite\Excel\Concerns\FromCollection;

class MarcasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $marcas = Marca::where('ma_eliminado',false)->get();

        $output = [];
        $output[] = [
            "ID",
            "Marca",
            "Teléfono",
            "Correo",
            "Contacto",
        ];

        foreach($marcas as $marca){

            $output[] = [
                $marca->id,
                $marca->ma_nombre,
                $marca->ma_telefono,
                $marca->ma_correo,
                $marca->ma_contacto
            ];
        }

        return collect($output);
    }
}
