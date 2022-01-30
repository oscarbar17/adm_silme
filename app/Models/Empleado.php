<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'sucursal_id','em_nombre','em_fecha_nacimiento','em_nss','em_curp','em_telefono','em_cargo','em_fecha_antiguedad',
        'em_path_acta','em_path_ine','em_path_curp','em_comprobante_dom','em_contrato','em_eliminado'
    ];

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

}
