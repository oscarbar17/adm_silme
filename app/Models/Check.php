<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $table = 'checks';

    protected $fillable = [
        'empleado_id','sucursal_id','ch_check_in','ch_check_out','ch_photo_check_in','ch_photo_check_out',
        'ch_latitud_check_in','ch_longitud_check_in','ch_latitud_check_out','ch_longitud_check_out'
    ];
    
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }
}
