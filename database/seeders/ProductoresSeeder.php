<?php

namespace Database\Seeders;

use App\Models\Productor;
use Illuminate\Database\Seeder;

class ProductoresSeeder extends Seeder
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
            Productor::create([
                'producto_id'   => '1',
                'pr_nombre'     => 'Productor '. $i,
                'pr_cultivo'    => 'RIEGO',
                'pr_correo'     => 'Correo '. $i,
                'pr_telefono'   => rand(1111111111,99999999),
                'municipio_id'  => 1
            ]);
        }
    }
}
