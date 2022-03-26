<?php

namespace App\Exports;

use App\Models\Evento;
use Maatwebsite\Excel\Concerns\FromCollection;

class EventosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($sucursal_id,$empleado_id,$producto_id,$municipio_id,$tipo_evento,$estatus,$fecha_inicio,$fecha_fin)
    {
        $this->sucursal_id   = $sucursal_id;
        $this->empleado_id   = $empleado_id;
        $this->producto_id    = $producto_id;
        $this->municipio_id  = $municipio_id;
        $this->tipo_evento   = $tipo_evento;
        $this->estatus       = $estatus;
        $this->fecha_inicio  = $fecha_inicio;
        $this->fecha_fin     = $fecha_fin;
    }

    public function collection()
    {
        $eventos = Evento::with([
            'sucursal','municipio','empleado','productor','producto'
        ]);

        if($this->sucursal_id != ""){
        $eventos = $eventos->where('sucursal_id',$this->sucursal_id);
        }

        if($this->empleado_id != ""){
        $eventos = $eventos->where('empleado_id',$this->empleado_id);
        }

        if($this->producto_id != ""){
        $eventos = $eventos->where('producto_id',$this->producto_id);
        }

        if($this->municipio_id != ""){
        $eventos = $eventos->where('municipio_id',$this->municipio_id);
        }

        if($this->tipo_evento != ""){
        $eventos = $eventos->where('ev_tipo_evento',$this->tipo_evento);
        }

        if($this->estatus != ""){
        $eventos = $eventos->where('ev_estatus',$this->estatus);
        }

        if($this->fecha_inicio != ""){
        $eventos = $eventos->where('created_at','>=',$this->fecha_inicio);
        }

        if($this->fecha_fin != ""){
        $eventos = $eventos->where('created_at','<=',$this->fecha_fin);
        }

        $eventos = $eventos->get();
        
        $output = [];
        $output[] = [
            "ID",
            "Sucursal",
            "Empleado",
            "Cultivo",
            "Tipo de Cultivo",
            "Municipio",
            "Tipo de Evento",
            "Estatus"
        ];

        foreach($eventos as $evento){

            $output[] = [
                $evento->id,
                $evento->sucursal->su_nombre,
                $evento->empleado->em_nombre. " ".$evento->empleado->em_apellido_paterno . " ". $evento->empleado->em_apellido_materno ,
                $evento->producto->pr_nombre,
                $evento->productor->pr_cultivo,
                $evento->municipio->mu_nombre,
                $evento->ev_tipo_evento,
                $evento->ev_estatus
            ];
        }

        return collect($output);

    }
}
