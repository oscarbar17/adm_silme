<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    use HasFactory;

    protected $table = 'productores';

    protected $fillable = [
        'pr_nombre','pr_cultivo','producto_id','pr_correo','pr_telefono','pr_municipio'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
