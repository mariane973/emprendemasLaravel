<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Vendedor']);
        $role2 = Role::create(['name'=>'Cliente']);

        Permission::create(['name'=>'agregarCarrito'])->syncRoles([$role2]);
        Permission::create(['name'=>'editarProducto'])->syncRoles([$role1]);
        Permission::create(['name'=>'eliminarProducto'])->syncRoles([$role1]);
        Permission::create(['name'=>'crearProducto'])->syncRoles([$role1]);
        Permission::create(['name'=>'verCarrito'])->syncRoles([$role2]);
        Permission::create(['name'=>'agregarVendedor'])->syncRoles([$role1]);
        Permission::create(['name'=>'accesoVendedor'])->syncRoles([$role1]);
        Permission::create(['name'=>'accesoPedidos'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'accesoPerfil'])->syncRoles([$role1,$role2]);
    }
}