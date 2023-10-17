<?php

namespace App\Http\Livewire;

use App\Models\Payment_Method;
use Livewire\Component;

class ShowMethods extends Component
{
    public $payment_method_id;

    public function buy(){
        dd($this->payment_method_id);
    }

    public function render()
    {
        $methods = Payment_Method::all();
        return view('livewire.show-methods', [
            'methods' => $methods
        ]);
    }
}
