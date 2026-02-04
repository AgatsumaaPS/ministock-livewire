<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalProducts = 0;
    public $totalCategories = 0;
    public $lowStockCount = 0;
    public $totalStock = 0;

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        // Protect against empty tables
        $this->totalProducts   = Product::count() ?? 0;
        $this->totalCategories = Category::count() ?? 0;
        $this->lowStockCount   = Product::where('stock', '<=', 5)
                                         ->where('stock', '>', 0)
                                         ->count() ?? 0;
        $this->totalStock      = Product::sum('stock') ?? 0;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
