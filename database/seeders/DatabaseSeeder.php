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
            'password'=>bcrypt('salome')
        ])->assignRole('Vendedor');

        User::create([
            'name'=>'Sofia',
            'email'=>'sofia@gmail.com',
            'password'=>bcrypt('sofia')
        ])->assignRole('Cliente');

        User::create([
            'name'=>'Santiago',
            'email'=>'santiago@gmail.com',
            'password'=>bcrypt('santiago')
        ])->assignRole('Vendedor');

        User::create([
            'name'=>'Carolina',
            'email'=>'carolina@gmail.com',
            'password'=>bcrypt('carolina')
        ])->assignRole('Vendedor');

        User::create([
            'name'=>'Lesly',
            'email'=>'lesly@gmail.com',
            'password'=>bcrypt('lesly')
        ])->assignRole('Vendedor');
        
        User::create([
            'name'=>'Alejandra',
            'email'=>'alejandra@gmail.com',
            'password'=>bcrypt('alejandra')
        ])->assignRole('Vendedor');

        User::create([
            'name'=>'Laura',
            'email'=>'laura@gmail.com',
            'password'=>bcrypt('laura')
        ])->assignRole('Cliente');
    }
}
