<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(ModulosSeeder::class);
        $this->call(MarcasSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(ProductoresSeeder::class);
        $this->call(SucursalesSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(TiposIncidenciasSeeder::class);
    }
}
