<?php

namespace App\Exports;

use App\Models\Check;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChecksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($sucursal_id,$empleado_id,$estatus,$fecha_inicio,$fecha_fin)
    {
        $this->sucursal_id   = $sucursal_id;
        $this->empleado_id   = $empleado_id;
        $this->estatus       = $estatus;
        $this->fecha_inicio  = $fecha_inicio;
        $this->fecha_fin     = $fecha_fin;
    }

    public function collection()
    {
        $checks = Check::with(['empleado','sucursal']);
        
        if($this->sucursal_id != ""){
            $checks = $checks->where('sucursal_id',$this->sucursal_id);
        }

        if($this->empleado_id != ""){
            $checks = $checks->where('empleado_id',$this->empleado_id);
        }

        if($this->estatus != ""){
            $checks = $checks->where('ch_estatus',$this->estatus);
        }

        if($this->fecha_inicio != ""){
            $checks = $checks->where('created_at','>=',$this->fecha_inicio);
        }

        if($this->fecha_fin != ""){
            $checks = $checks->where('created_at','<=',$this->fecha_fin);
        }

        $checks = $checks->get();

        $output = [];
        $output[] = [
            "ID",
            "Sucursal",
            "Empleado",
            "CheckIn",
            "CheckOut",
            "Estatus"
        ];

        foreach($checks as $check){

            $output[] = [
                $check->id,
                $check->sucursal->su_nombre,
                $check->empleado->em_nombre. " ".$check->empleado->em_apellido_paterno . " ". $check->empleado->em_apellido_materno ,
                $check->ch_check_in,
                $check->ch_check_out,
                $check->ch_estatus
            ];
        }

        return collect($output);
    }
}
