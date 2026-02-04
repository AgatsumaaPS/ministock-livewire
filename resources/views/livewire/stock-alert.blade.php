<div>
    <div class="flex justify-between items-center mb-3">
        <h3 class="text-base font-medium text-gray-900">Stock Alerts</h3>
        @if($criticalStock > 0)
        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
            {{ $criticalStock }} Out of Stock
        </span>
        @endif
    </div>

    @if($lowStockProducts->count() > 0)
        <div class="space-y-2">
            @foreach($lowStockProducts as $product)
            <div class="p-3 bg-red-50 rounded-lg border-l-4 border-red-500">
                <div class="flex justify-between items-start mb-2">
                    <div class="font-medium text-gray-900 text-sm">{{ $product->name }}</div>
                    <span class="category-badge" style="background: white; color: #b91c1c; font-size: 11px;">{{ $product->category->name }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span class="text-xl">⚠️</span>
                        <span class="text-xs text-red-700 font-medium">
                            Only <strong>{{ $product->stock }}</strong> left in stock
                        </span>
                    </div>
                    <button wire:click="$emit('editProduct', {{ $product->id }})" 
                            class="px-3 py-1 bg-white text-red-700 border border-red-300 rounded hover:bg-red-50 transition text-xs font-medium">
                        Restock
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        @if($lowStockProducts->hasMorePages())
        <div class="text-center mt-3">
            <button wire:click="loadMore" 
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition text-sm">
                Load More
            </button>
        </div>
        @endif
    @else
        <div class="text-center py-8">
            <div class="text-4xl mb-2">✅</div>
            <p class="text-sm font-medium text-gray-900 mb-1">All Stock Levels Are Good</p>
            <p class="text-xs text-gray-600">No products are running low on stock</p>
        </div>
    @endif
</div>