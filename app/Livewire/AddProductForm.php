<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductForm extends Component
{
    use WithFileUploads;

    public $name = '';
    public $sku = '';
    public $category_id = '';
    public $stock = 0;
    public $location = '';
    public $image;
    public $isEditing = false;
    public $editingId = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'sku' => 'required|string|max:100|unique:products,sku',
        'category_id' => 'required|exists:categories,id',
        'stock' => 'required|integer|min:0',
        'location' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:1024',
    ];

    protected $messages = [
        'name.required' => 'Nama produk wajib diisi',
        'sku.required' => 'SKU wajib diisi',
        'sku.unique' => 'SKU sudah digunakan',
        'category_id.required' => 'Kategori wajib dipilih',
        'stock.required' => 'Stock wajib diisi',
        'stock.integer' => 'Stock harus berupa angka',
        'stock.min' => 'Stock minimal 0',
        'image.image' => 'File harus berupa gambar',
        'image.max' => 'Ukuran gambar maksimal 1MB',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->edit($id);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->editingId = $id;
        $this->name = $product->name;
        $this->sku = $product->sku;
        $this->category_id = $product->category_id;
        $this->stock = $product->stock;
        $this->location = $product->location;
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $product = Product::find($this->editingId);
            $this->validate([
                'sku' => 'required|string|max:100|unique:products,sku,' . $this->editingId
            ]);
        } else {
            $product = new Product();
        }

        if ($this->image) {
            $imageName = time() . '_' . $this->image->getClientOriginalName();
            $this->image->storeAs('products', $imageName, 'public');
            $product->image_path = 'products/' . $imageName;
        }

        $product->name = $this->name;
        $product->sku = $this->sku;
        $product->category_id = $this->category_id;
        $product->stock = $this->stock;
        $product->location = $this->location;
        $product->save();

        $this->resetForm();
        $this->emit('productAdded');
        $this->emit('closeModal');

        $this->dispatchBrowserEvent('toast', [
            'message' => $this->isEditing ? 'Produk berhasil diupdate' : 'Produk berhasil ditambahkan',
            'type' => 'success'
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'sku', 'category_id', 'stock', 'location', 'image']);
        $this->isEditing = false;
        $this->editingId = null;
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.add-product-form', [
            'categories' => Category::all()
        ]);
    }
}