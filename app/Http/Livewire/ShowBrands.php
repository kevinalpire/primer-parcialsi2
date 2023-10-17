<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class ShowBrands extends Component
{
    public $nombre;
    protected $listeners = ['deleteBrand'];

    public function createBrand()
    {
        $validados = $this->validate([
            'nombre' => 'required|max:19'
        ]);

        Brand::create([
            'nombre' => $validados['nombre']
        ]);

        $this->reset('nombre');
        $this->emit('brandCreated');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
    }

    public function render()
    {
        $brands = Brand::paginate(18);
        return view('livewire.show-brands', [
            'brands' => $brands
        ]);
    }
}
