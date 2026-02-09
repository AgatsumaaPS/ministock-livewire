<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DashboardStats extends Component
{
    public $filterCategoryId = null;
    public $search = '';

    public function render()
    {
        // Base queries
        $productsQuery = Product::query();
        
        // Apply Category Filter
        if ($this->filterCategoryId) {
            $productsQuery->where('category_id', $this->filterCategoryId);
        }

        // Apply Search (Product Name or Category Name)
        if ($this->search) {
            $productsQuery->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhereHas('category', function($catQuery) {
                      $catQuery->where('name', 'like', '%' . $this->search . '%');
                  });
            });
        }

        // Clone query for stats to avoid side effects
        // Note: Counting filtered results for "Total Products" and "Stock Levels"
        // But "Total Categories" and "Pending Users" usually remain global stats unless specifically requested otherwise.
        // However, for "Total Stock", it makes sense to sum the filtered stock.

        $totalProducts = (clone $productsQuery)->count();
        $totalStock = (clone $productsQuery)->sum('stock');
        $lowStockCount = (clone $productsQuery)->where('stock', '<=', 5)->where('stock', '>', 0)->count();
        $outOfStockCount = (clone $productsQuery)->where('stock', 0)->count();

        // Unfiltered stats (global) - kept static as these are general system stats
        $totalCategories = Category::count();
        $pendingUsers = User::where('is_admin', false)->count();
        
        // Recent Products - respecting the filters
        $recentProducts = (clone $productsQuery)->with('category')->latest()->take(5)->get();
        
        $categories = Category::orderBy('name')->get();

        return view('livewire.dashboard-stats', compact(
            'totalProducts',
            'totalCategories',
            'lowStockCount',
            'outOfStockCount',
            'totalStock',
            'recentProducts',
            'pendingUsers',
            'categories'
        ));
    }
}
