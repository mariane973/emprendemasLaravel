<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        User::create([
            'name'=>'Mariane',
            'email'=>'mariane9quintero@gmail.com',
            'password'=>bcrypt('1072644106')
        ])->assignRole('Vendedor');

        User::create([
            'name'=>'Salome',
            'email'=>'salome26u.u@gmail.com',
            'password'=>bcrypt('4567890')
        ])->assignRole('Vendedor');

        User::create([
            'name'=>'Sofia',
            'email'=>'sofi@gmail.com',
            'password'=>bcrypt('67890')
        ])->assignRole('Cliente');

        //\App\Models\User::factory(10)->create();
    }
}
