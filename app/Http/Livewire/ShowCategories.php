<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ShowCategories extends Component
{
    public $nombre;

    protected $listeners = ['deleteCategory'];

    public function createCategory()
    {
        $validados = $this->validate([
            'nombre' => 'required|max:19'
        ]);

        Category::create([
            'nombre' => $validados['nombre']
        ]);

        $this->reset('nombre');
        $this->emit('categoryCreated');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function render()
    {
        $categories = Category::paginate(18);
        return view('livewire.show-categories',[
            'categories' => $categories
        ]);
    }
}
