<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $table = 'modulos';

    protected $fillable = [
	    'parent_id','mo_ruta','mo_descripcion','mo_orden','mo_atributos','mo_icono',
	    'mo_publicado','mo_params_ruta','mo_identificador','mo_predef',
	    'mo_admin','mo_eliminado'
	];

	protected $hidden = [];
	
	public function hijos(){
	
		return $this->hasMany(Modulo::class, 'parent_id')
		->where(['mo_publicado' => true])
		->with(['hijos' => function($q){
			$q->where(['mo_publicado' => true])
			->orderBy('mo_orden');
		}]);
	}
}
