<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

	protected $fillable = ['ro_descripcion','ro_eliminado',
        'ro_ruta_home','ro_admin'
    ];

}
