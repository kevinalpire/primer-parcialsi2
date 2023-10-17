<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void // aqui las marcas de ropa editar
    {
        Brand::create(['nombre' => 'Zara']);
        Brand::create(['nombre' => 'Gucci']);
        Brand::create(['nombre' => 'Prada']);
        Brand::create(['nombre' => 'Balenciaga']);
        Brand::create(['nombre' => 'Louis Vuitton']);
        Brand::create(['nombre' => 'H&M']);
        Brand::create(['nombre' => 'Dolce & Gabbana']);
        Brand::create(['nombre' => 'Victoria Secret']);
        Brand::create(['nombre' => 'Forever 21']);
        Brand::create(['nombre' => 'Puma']);
        Brand::create(['nombre' => 'Adidas']);
        Brand::create(['nombre' => 'Nike']);
      
    }
}
