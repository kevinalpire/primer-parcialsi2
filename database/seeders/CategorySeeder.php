<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void //editar categorias de ropa
    {
        Category::create([
            'nombre' => 'Verano',
        ]);

        Category::create([
            'nombre' => 'Invierno',
        ]);

        Category::create([
            'nombre' => 'Primavera',
        ]);

        Category::create([
            'nombre' => 'Otoño',
        ]);

        Category::create([
            'nombre' => 'Calzados',
        ]);

        Category::create([
            'nombre' => 'Infantil',
        ]);

     
    }
}
