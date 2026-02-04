<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class StockAlert extends Component
{
    use WithPagination;

    public $lowStockThreshold = 5;
    public $showAlert = true;

    protected $listeners = ['stockUpdated' => 'checkStock'];

    public function checkStock()
    {
        $lowStockCount = Product::where('stock', '<=', $this->lowStockThreshold)
            ->where('stock', '>', 0)
            ->count();

        if ($lowStockCount > 0 && $this->showAlert) {
            $this->dispatchBrowserEvent('showNotification', [
                'title' => '⚠️ Low Stock Alert',
                'message' => "Ada $lowStockCount produk yang stocknya rendah!",
                'type' => 'warning'
            ]);
        }
    }

    public function render()
    {
        $lowStockProducts = Product::with('category')
            ->where('stock', '<=', $this->lowStockThreshold)
            ->where('stock', '>', 0)
            ->orderBy('stock')
            ->paginate(5);

        $criticalStock = Product::where('stock', '=', 0)->count();

        $this->checkStock();

        return view('livewire.stock-alert', [
            'lowStockProducts' => $lowStockProducts,
            'criticalStock' => $criticalStock,
        ]);
    }
}