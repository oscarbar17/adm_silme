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
        
        Sucursal::create([
            'su_nombre'     => 'Cedis',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Izucar',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Colon',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Atencingo',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Progreso',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Centro',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Ejido',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Telixtac',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'San Ignacio',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Tepalcingo',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Amayuca',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Yecapixtla',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Casasano',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Anenecuilco',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);
 
        Sucursal::create([
            'su_nombre'     => 'Jojutla',
            'su_encargado'  => 'Encargado ',
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);
 

    
    }
}
