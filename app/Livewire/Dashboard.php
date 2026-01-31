<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalProducts;
    public $totalCategories;
    public $lowStockCount;
    public $totalStock;

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        $this->totalProducts = Product::count();
        $this->totalCategories = Category::count();
        $this->lowStockCount = Product::where('stock', '<=', 5)->where('stock', '>', 0)->count();
        $this->totalStock = Product::sum('stock');
    }

    public function render()
    {
        $recentProducts = Product::with('category')->latest()->take(5)->get();
        $lowStockProducts = Product::with('category')
            ->where('stock', '<=', 5)
            ->where('stock', '>', 0)
            ->orderBy('stock')
            ->take(5)
            ->get();

        return view('livewire.dashboard', [
            'recentProducts' => $recentProducts,
            'lowStockProducts' => $lowStockProducts,
        ]);
    }
}