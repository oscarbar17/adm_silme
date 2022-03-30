<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'sucursal_id','user_id','em_nombre','em_apellido_paterno','em_apellido_materno','em_email',
        'em_fecha_nacimiento','em_nss','em_curp','em_telefono','em_cargo','em_fecha_antiguedad',
        'em_path_acta','em_path_ine','em_path_curp','em_path_comprobante_dom','em_path_contrato',
        'em_contacto_emergencia','em_eliminado'
    ];

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
