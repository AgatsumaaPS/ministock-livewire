<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'stock',
        'location',
        'image_path'
    ];

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($product) {
            if ($product->isDirty('stock')) {
                $product->dispatchStockUpdate();
            }
        });
    }

    public function dispatchStockUpdate()
    {
        \Livewire::dispatch('stockUpdated');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusAttribute()
    {
        if ($this->stock === 0) {
            return 'out_of_stock';
        } elseif ($this->stock <= 5) {
            return 'low_stock';
        }
        return 'in_stock';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'out_of_stock' => '<span class="status-badge status-out">Out of Stock</span>',
            'low_stock' => '<span class="status-badge status-low">Low Stock</span>',
            'in_stock' => '<span class="status-badge status-active">In Stock</span>',
        ];

        return $badges[$this->status] ?? $badges['in_stock'];
    }
}