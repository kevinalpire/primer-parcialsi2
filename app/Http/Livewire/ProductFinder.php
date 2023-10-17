<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;

class ProductFinder extends Component
{
    public $term;
    public $category;
    public $brand;

    protected $listeners = ['readForm'];

    public function readForm(){
        $this->emit('findProduct', $this->term, $this->category, $this->brand);
    }

    public function render()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.product-finder', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
}
