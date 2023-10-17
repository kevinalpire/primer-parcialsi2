<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{

    public $nombre, $descripcion, $precio, $category_id, $brand_id, $imagen, $stock;

    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
        'precio' => 'required',
        'category_id' => 'required', // 'category_id' => 'required|exists:categories,id
        'imagen' => 'required|image|max:1024',
        'stock' => 'required',
        'brand_id' => 'required',
    ];

    public function createProduct()
    {
        $validatedData = $this->validate();

        //Almacenar la imagen en el servidor
        $imagen = $this->imagen->store('public/products');
        $nombre_imagen = str_replace('public/products/', '', $imagen);

        //dd($this->brand_id);
        // //Crear el producto
        Product::create([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
            'precio' => $validatedData['precio'],
            'category_id' => $validatedData['category_id'],
            'imagen' => $nombre_imagen,
            'stock' => $validatedData['stock'],
            'brand_id' => $validatedData['brand_id'],
        ]);

        // //Enviar mensaje de éxito
        session()->flash('message', 'Producto registrado con éxito.');

        //Redirección de usuario
        return redirect()->route('product.index');
    }

    public function render()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('livewire.create-product', [
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}
