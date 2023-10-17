<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void   //estados del carrito de compras.
    {
        Status::create(['nombre' => 'Carrito de compras']);
        Status::create(['nombre' => 'En proceso']);
        Status::create(['nombre' => 'Enviado']);
        Status::create(['nombre' => 'Entregado']);
        Status::create(['nombre' => 'Cancelado']);
    }
}
