<?php

namespace Database\Seeders;

use App\Models\Modulo;
use App\Models\ModuloRol;
use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ra = Rol::create([
            'ro_descripcion'	=> 'Administrador',
            'ro_ruta_home'		=> 'home_admin.index',
            'ro_admin'          => true
        ]);

        $mods = Modulo::where(['mo_admin' => true])->get();
        
        foreach ($mods as $mod) {
            ModuloRol::create([
                'modulo_id' => $mod->id,
                'rol_id' => $ra->id,
                'ms_insert' => '1',
                'ms_delete' => '1',
                'ms_update' => '1'
            ]);
        }
        
    }
}
