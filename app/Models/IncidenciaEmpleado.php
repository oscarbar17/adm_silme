<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenciaEmpleado extends Model
{
    use HasFactory;

    protected $table = 'incidencias_empleados';

    protected $fillable = [
        'empleado_id','tipo_incidencia_id','ie_fecha','ie_comentarios',
        'ie_eliminado'
    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function tipo_incidencia(){
        return $this->belongsTo(TipoIncidencia::class,'tipo_incidencia_id');
    }
}
