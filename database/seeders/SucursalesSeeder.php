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
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Izucar',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Colon',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Atencingo',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Progreso',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Centro',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Ejido',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Telixtac',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'San Ignacio',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Tepalcingo',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Amayuca',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Yecapixtla',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Casasano',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);

        Sucursal::create([
            'su_nombre'     => 'Anenecuilco',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);
 
        Sucursal::create([
            'su_nombre'     => 'Jojutla',
            'empleado_id'  => null,
            'su_telefono'   => rand(1111111111,999999999),
            'su_latitud'    => rand(1111111111,999999999),
            'su_longitud'   => rand(1111111111,999999999),
            'su_metros_geocerca'    => rand(100,400)
        ]);
 

    
    }
}
