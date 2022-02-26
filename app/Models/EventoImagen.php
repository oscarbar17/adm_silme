<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoImagen extends Model
{
    use HasFactory;

    protected $table = 'eventos_imagenes';

    protected $fillable = [
        'evento_id','ei_path_imagen'
    ];

}
