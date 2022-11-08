<?php

namespace App\Exports;

use App\Models\Sucursal;
use Maatwebsite\Excel\Concerns\FromCollection;

class SucursalesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sucursales = Sucursal::where('su_eliminado',false)->with(['empleado'])->get();

        $output = [];
        $output[] = [
            "ID",
            "Nombre de la Sucursal",
            "Encargado",
            "Teléfono",
            "Latitud",
            "Longitud",
            "Metros Geocerca"
        ];

        foreach($sucursales as $sucursal){
            $encargado = "";
            
            if($sucursal->empleado_id){
                $encargado = $sucursal->empleado->em_nombre . " ". $sucursal->empleado->em_apellido_paterno . " " . $sucursal->empleado->em_apellido_materno;
            }

            $output[] = [
                $sucursal->id,
                $sucursal->su_nombre,
                $encargado,
                $sucursal->su_telefono,
                $sucursal->su_latitud,
                $sucursal->su_longitud,
                $sucursal->su_metros_geocerca
            ];
        }

        return collect($output);
    }
}
