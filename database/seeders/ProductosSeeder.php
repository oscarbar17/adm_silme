<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
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
            Producto::create([
                'pr_nombre' => 'Producto '. $i
            ]);
        }
    }
}
