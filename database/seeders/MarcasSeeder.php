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
        for($i = 1; $i < 20 ; $i++){
            Marca::create([
                'ma_nombre'     => 'Marca '.$i ,
                'ma_producto'   => 'Producto Marca '.$i,
                'ma_contacto'   => 'Contacto '.$i , 
                'ma_telefono'   => rand(1111111111,9999999999)
            ]);
        }
        
    }
}
