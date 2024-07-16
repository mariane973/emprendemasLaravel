<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            ['nombre' => 'Accesorios'],
            ['nombre' => 'Artesanias'],
            ['nombre' => 'Comida'],
            ['nombre' => 'Ropa'],
            ['nombre' => 'Plantas'],
            ['nombre' => 'Cuidado Personal'],
            ['nombre' => 'Venta de Garaje'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
