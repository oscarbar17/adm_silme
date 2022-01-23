<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursales';

    protected $fillable = [ 'su_nombre', 'su_encargado',
            'su_telefono', 'su_latitud', 'su_longitud',
            'su_metros_geocerca'
    ];
}
