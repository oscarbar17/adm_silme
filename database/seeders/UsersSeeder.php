<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'  => 'Admin',
            'email' => 'admin@lazafra.com',
            'email_verified_at' => Carbon::now(),
            'password'  => bcrypt('admin*123'),
            'rol_id'  => 1,
            'estatus'   => 'ACTIVO'

        ]);
    }
}
