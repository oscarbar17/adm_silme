<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'sucursal_id','empleado_id','productor_id','municipio_id','marca_id','producto_id','ev_superficie','ev_tipo_evento','ev_estatus',
        'ev_tipo_cultivo','ev_latitud','ev_longitud','ev_notas'
    ];

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function productor(){
        return $this->belongsTo(Productor::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
