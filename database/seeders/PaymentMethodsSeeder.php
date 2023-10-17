<?php

namespace Database\Seeders;

use App\Models\Payment_Method;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void //los metodos de pagos.
    {

        Payment_Method::create([
            'nombre' => 'P2P',
        ]);

        Payment_Method::create([
            'nombre' => 'Tarjeta VISA',
        ]);

        Payment_Method::create([
            'nombre' => 'Paypal',
        ]);

        Payment_Method::create([
            'nombre' => 'Tarjeta MASTERCARD',
        ]);

        Payment_Method::create([
            'nombre' => 'Google Pay',
        ]);

        Payment_Method::create([
            'nombre' => 'Apple Pay',
        ]);

        Payment_Method::create([
            'nombre' => 'Tarjeta WESTERN UNION',
        ]);

        Payment_Method::create([
            'nombre' => 'Tarjeta AMERICAN EXPRESS',
        ]);

    }
}
