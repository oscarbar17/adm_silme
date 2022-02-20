<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'empleado_id','productor_id','municipio_id','marca_id','producto_id','ev_superficie','ev_estatus'
    ];
}
