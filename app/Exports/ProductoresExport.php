<?php

namespace App\Exports;

use App\Models\Productor;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $productores = Productor::where('pr_eliminado',false)->with(['producto','municipio'])->get();

        $output = [];
        $output[] = [
            "ID",
            "Productor",
            "Tipo de Cultivo",
            "Cultivo",
            "Correo",
            "Teléfono",
            "Municipio"
        ];

        foreach($productores as $productor){

            $output[] = [
                $productor->id,
                $productor->pr_nombre,
                $productor->pr_cultivo,
                $productor->producto->pr_nombre,
                $productor->pr_correo,
                $productor->pr_telefono,
                $productor->municipio->mu_nombre
            ];
        }

        return collect($output);
    }
}
