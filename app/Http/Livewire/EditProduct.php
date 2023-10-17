<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    public $nombre, $descripcion, $precio, $category_id, $brand_id, $imagen, $stock, $n_imagen, $product_id;

    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
        'precio' => 'required',
        'category_id' => 'required', // 'category_id' => 'required|exists:categories,id
        'n_imagen' => 'nullable|image|max:1024',
        'stock' => 'required',
        'brand_id' => 'required',
    ];

    public function mount(Product $product)
    {
        $this->product_id = $product->id;
        $this->nombre = $product->nombre;
        $this->descripcion = $product->descripcion;
        $this->precio = $product->precio;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->imagen = $product->imagen;
        $this->stock = $product->stock;
    }

    public function editProduct()
    {
        $product = Product::find($this->product_id);
        $validatedData = $this->validate();

        //salvar cambios
        $product->nombre = $validatedData['nombre'];
        $product->descripcion = $validatedData['descripcion'];
        $product->precio = $validatedData['precio'];
        $product->category_id = $validatedData['category_id'];
        $product->stock = $validatedData['stock'];
        $product->brand_id = $validatedData['brand_id'];


        //Almacenar la imagen en el servidor (en caso de detectar cambios)
        if ($this->n_imagen) {
            $imagen = $this->n_imagen->store('public/products');
            $nombre_imagen = str_replace('public/products/', '', $imagen);
            $product->imagen = $nombre_imagen;
        }

        $product->save();

        //Mensaje flash
        session()->flash('message', 'Producto actualizado con éxito.');

        //Redirección de usuario
        return redirect()->route('product.index');
    }

    public function render()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('livewire.edit-product', [
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}
