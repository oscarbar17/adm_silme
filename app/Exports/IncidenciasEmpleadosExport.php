<?php

namespace App\Exports;

use App\Models\IncidenciaEmpleado;
use Maatwebsite\Excel\Concerns\FromCollection;

class IncidenciasEmpleadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($fecha_inicio,$fecha_fin)
    {
        $this->fecha_inicio     = $fecha_inicio;
        $this->fecha_fin        = $fecha_fin;
        
    }

    public function collection()
    {
        $incidencias = IncidenciaEmpleado::where([
            'ie_eliminado'  => false
        ])->with(['empleado','tipo_incidencia']);
        

        if($this->fecha_inicio != ""){
        $incidencias->where('ie_fecha','>=',$this->fecha_inicio);
        }

        if($this->fecha_inicio != ""){
        $incidencias->where('ie_fecha','<=',$this->fecha_fin);
        }

        $incidencias = $incidencias->get();

        
        $output = [];
        $output[] = [
            "ID",
            "Empleado",
            "Tipo de Incidencia",
            "Fecha",
            "Comentarios"
        ];

        foreach($incidencias as $incidencia){

            $output[] = [
                $incidencia->id,
                $incidencia->empleado->em_nombre. " ".$incidencia->empleado->em_apellido_paterno . " ". $incidencia->empleado->em_apellido_materno ,
                $incidencia->tipo_incidencia->ti_nombre,
                $incidencia->ie_fecha,
                $incidencia->ie_comentarios
            ];
        }

        return collect($output);

        #return IncidenciaEmpleado::all();
    }
}
