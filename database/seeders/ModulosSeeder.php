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
            'mo_icono'			=> 'fa fa-users',
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

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Incidencias Empleados' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'incidencias_empleados.index',
            'mo_atributos'      => ' id="m-incidencias-empleados" ',
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
            'mo_icono'			=> 'fa fa-book',
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

        //Eventos
         $mod = Modulo::create([
            'parent_id'         => null,
            'mo_descripcion'    => 'Eventos' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => '',
            'mo_atributos'      => 'id="m-eventos"',
            'mo_icono'			=> 'fa fa-map-marker',
            'mo_publicado'		=> true
        ]);
        ModRolHelper::set($mod->id);

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Eventos o Ventas' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'events.index',
            'mo_atributos'      => ' id="m-eventos-ventas" ',
            'mo_icono'	    => 'fa fa-users',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);

        //Checks
        $mod = Modulo::create([
            'parent_id'         => null,
            'mo_descripcion'    => 'Checks' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => '',
            'mo_atributos'      => 'id="m-checks"',
            'mo_icono'			=> 'fa fa-map-marker',
            'mo_publicado'		=> true
        ]);
        ModRolHelper::set($mod->id);

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Checks' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'checks.index',
            'mo_atributos'      => ' id="m-checks-hijo" ',
            'mo_icono'	        => '',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);

        //Empleados
        $mod = Modulo::create([
            'parent_id'         => null,
            'mo_descripcion'    => 'Usuarios' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => '',
            'mo_atributos'      => 'id="m-usuarios"',
            'mo_icono'			=> 'fa fa-users',
            'mo_publicado'		=> true
        ]);
        ModRolHelper::set($mod->id);

        $modHijo = Modulo::create([
            'parent_id'         => $mod->id,
            'mo_descripcion'    => 'Gestión de Usuarios' ,
            'mo_orden'			=> 1,
            'mo_ruta'           => 'usuarios.index',
            'mo_atributos'      => ' id="m-gestion-empleados" ',
            'mo_icono'	    => 'fa fa-users',
            'mo_publicado'	    => true
        ]);
        ModRolHelper::set($modHijo->id);
    }
}
