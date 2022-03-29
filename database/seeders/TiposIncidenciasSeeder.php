<?php

namespace Database\Seeders;

use App\Models\TipoIncidencia;
use Illuminate\Database\Seeder;

class TiposIncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TipoIncidencia::create([
            'ti_nombre' => 'ACTA ADMINISTRATIVA',
        ]);
        TipoIncidencia::create([
            'ti_nombre' => 'CARTA COMPROMISO',
        ]);
        TipoIncidencia::create([
            'ti_nombre' => 'FALTA INJUSTIFICADA',
        ]);
        TipoIncidencia::create([
            'ti_nombre' => 'OTROS',
        ]);
        TipoIncidencia::create([
            'ti_nombre' => 'PERMISO',
        ]);
    }
}
