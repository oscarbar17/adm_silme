<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Seeder;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i < 20 ; $i++){
            Sucursal::create([
                'su_nombre'     => 'Sucursal ' .$i ,
                'su_encargado'  => 'Encargado '. $i,
                'su_telefono'   => rand(1111111111,999999999),
                'su_latitud'    => rand(1111111111,999999999),
                'su_longitud'   => rand(1111111111,999999999),
                'su_metros_geocerca'    => rand(100,400)
            ]);
        }
    }
}
