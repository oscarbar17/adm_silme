<?php

namespace Database\Seeders;

use App\Library\ModRolHelper;
use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empleados
        $mod = Modulo::create([
            'parent_id'         => null,
            'mo_descripcion'    => 'Empleados' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => '',
            'mo_atributos'      => 'id="m-empleados"',
            'mo_icono'			=> 'fa fa-user',
            'mo_publicado'		=> true
        ]);
        ModRolHelper::set($mod->id);

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Gestión de Empleados' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'empleados.index',
            'mo_atributos'      => ' id="m-gestion-empleados" ',
            'mo_icono'	    => 'fa fa-users',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);

        //Catalogos
        $mod = Modulo::create([
            'parent_id'         => null,
            'mo_descripcion'    => 'Catálogos' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => '',
            'mo_atributos'      => 'id="m-catalogos"',
            'mo_icono'			=> 'fa fa-list',
            'mo_publicado'		=> true
        ]);
        ModRolHelper::set($mod->id);

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Marcas' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'marcas.index',
            'mo_atributos'      => ' id="m-marcas" ',
            'mo_icono'	    => 'fa fa-users',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Productos' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'productos.index',
            'mo_atributos'      => ' id="m-productos" ',
            'mo_icono'	    => 'fa fa-users',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);
        
        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Productores' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'productores.index',
            'mo_atributos'      => ' id="m-productores" ',
            'mo_icono'	    => 'fa fa-users',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Sucursales' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'sucursales.index',
            'mo_atributos'      => ' id="m-sucursales" ',
            'mo_icono'	    => 'fa fa-users',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);
    }
}
