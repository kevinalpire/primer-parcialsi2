<?php

namespace Database\Seeders; //son para rellenar bd pero no con datos aleatoroios 

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kevin = User::create([
            'name' => 'kevin',
            'email' => 'kevinalpire2708@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 0, //administrador
        ]);
        Storage::deleteDirectory('products');
        Storage::makeDirectory("public/products");

        $dario = User::create([ //rol 0 adm, rol 1 cliente
            'name' => 'dario',
            'email' => 'dario2708@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 1, //administrador
        ]);
    }

}
