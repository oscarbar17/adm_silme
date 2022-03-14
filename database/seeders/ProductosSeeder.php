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
        Producto::create([
            'pr_nombre' => 'Maíz'
        ]);
        Producto::create([
            'pr_nombre' => 'Sorgo'
        ]);
        Producto::create([
            'pr_nombre' => 'Frijol'
        ]);
        Producto::create([
            'pr_nombre' => 'Cebolla'
        ]);
        Producto::create([
            'pr_nombre' => 'Jitomate'
        ]);
        Producto::create([
            'pr_nombre' => 'Caña de azúcar'
        ]);
        Producto::create([
            'pr_nombre' => 'Arroz'
        ]);
        Producto::create([
            'pr_nombre' => 'Nopal'
        ]);
        Producto::create([
            'pr_nombre' => 'Higo'
        ]);
        Producto::create([
            'pr_nombre' => 'Ejote'
        ]);
        Producto::create([
            'pr_nombre' => 'Aguacate'
        ]);
        Producto::create([
            'pr_nombre' => 'Cacahuate'
        ]);
        Producto::create([
            'pr_nombre' => 'Jicama'
        ]);
        Producto::create([
            'pr_nombre' => 'Papaya'
        ]);
        Producto::create([
            'pr_nombre' => 'Tomate'
        ]);
        Producto::create([
            'pr_nombre' => 'Pepino'
        ]);
        Producto::create([
            'pr_nombre' => 'Albahaca'
        ]);
    
    }
}
