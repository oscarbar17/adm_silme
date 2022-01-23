<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuloRol extends Model
{
    use HasFactory;

    protected $table = 'modulos_roles';
	
	protected $fillable = ['modulo_id','rol_id','ms_insert',
	    'ms_delete','ms_update','ms_habilitado',
	    'ms_eliminado'
	];
	
	protected $hidden = [];
	

	public function submodulos() {
		return $this->belongsToMany(Modulo::class,'modulos_rol','id');
	}
	
	public function rol(){
	    return $this->belongsTo(Rol::class,'rol_id','id');
	}
	
	public function modulo(){
	    return $this->belongsTo(Modulo::class,'modulo_id','id');
	}
}
