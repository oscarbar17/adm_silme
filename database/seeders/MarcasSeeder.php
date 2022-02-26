<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Marca::create([
            'ma_nombre'     => 'BASF' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Bayer AG (BAYRY)' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Sumitomo Chemicals' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Syngenta' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Corteva' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'UPL' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Adama' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Jiangsu Yangnon' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Nufarm' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);

        Marca::create([
            'ma_nombre'     => 'Nissan Chemicals' ,
            'ma_contacto'   => null, 
            'ma_telefono'   => null
        ]);
    }
}
