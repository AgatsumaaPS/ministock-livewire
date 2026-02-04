<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = 'all';
    public $perPage = 10;

    protected $listeners = ['productAdded' => '$refresh', 'productUpdated' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function increment($id)
    {
        $product = Product::find($id);
        $product->increment('stock');
        $this->emit('stockUpdated');
        $this->dispatchBrowserEvent('toast', [
            'message' => 'Stock berhasil ditambahkan',
            'type' => 'success'
        ]);
    }

    public function decrement($id)
    {
        $product = Product::find($id);
        if ($product->stock > 0) {
            $product->decrement('stock');
            $this->emit('stockUpdated');
            $this->dispatchBrowserEvent('toast', [
                'message' => 'Stock berhasil dikurangi',
                'type' => 'success'
            ]);
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $productName = $product->name;
        $product->delete();
        
        $this->dispatchBrowserEvent('toast', [
            'message' => "Produk '$productName' berhasil dihapus",
            'type' => 'success'
        ]);
    }

    public function render()
    {
        $query = Product::with('category')->orderBy('created_at', 'desc');

        if ($this->selectedCategory !== 'all') {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('sku', 'like', '%' . $this->search . '%')
                  ->orWhere('location', 'like', '%' . $this->search . '%');
            });
        }

        $products = $query->paginate($this->perPage);
        $categories = Category::all();

        $totalProducts = $query->toBase()->getCountForPagination();

        return view('livewire.product-list', [
            'products' => $products,
            'categories' => $categories,
            'totalProducts' => $totalProducts,
        ]);
    }
}