<div>
    <!-- Header with Filters -->
    <div class="mb-4 flex justify-between items-center">
        <h3 class="text-lg font-medium text-gray-900">All Products</h3>
        <div class="flex gap-3">
            <select wire:model="selectedCategory" class="border border-gray-300 rounded-lg px-3 py-2 bg-white text-gray-900">
                <option value="all">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="relative">
                <input type="text" 
                       wire:model.debounce.300ms="search" 
                       placeholder="Search products..." 
                       class="border border-gray-300 rounded-lg px-3 py-2 pl-10 bg-white text-gray-900"
                       style="width: 280px;">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🔍</span>
            </div>
        </div>
    </div>

    <!-- Product Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-12 h-12 rounded object-cover">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-xl">📦</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">
                        {{ $product->name }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-gray-600 font-mono text-sm">
                        {{ $product->sku }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <span class="category-badge">{{ $product->category->name }}</span>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-gray-600">
                        {{ $product->location ?? '-' }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <div class="stock-controls">
                            <button wire:click="decrement({{ $product->id }})" class="px-2 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">-</button>
                            <span class="mx-2 font-medium">{{ $product->stock }}</span>
                            <button wire:click="increment({{ $product->id }})" class="px-2 py-1 bg-green-100 text-green-700 rounded hover:bg-green-200">+</button>
                        </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        {!! $product->status_badge !!}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <button wire:click="$emit('editProduct', {{ $product->id }})" 
                                class="action-btn edit mr-1">Edit</button>
                        <button wire:click="deleteProduct({{ $product->id }})" 
                                class="action-btn delete"
                                onclick="return confirm('Are you sure?')">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-12 text-center text-sm text-gray-500">
                        <div class="text-4xl mb-2">📦</div>
                        <p>No products found</p>
                        @if($search || $selectedCategory !== 'all')
                            <button wire:click="$emit('resetFilters')" class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Clear Filters
                            </button>
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
    <div class="mt-4">
        {{ $products->links() }}
    </div>
    @endif

    <!-- Product Count -->
    <div class="mt-3 text-sm text-gray-600">
        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $totalProducts }} products
    </div>
</div>

<style>
.stock-controls {
    display: flex;
    align-items: center;
    gap: 8px;
}

.action-btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    border: none;
}

.action-btn.edit {
    background: #dbeafe;
    color: #1e40af;
}

.action-btn.delete {
    background: #fee2e2;
    color: #b91c1c;
}

.action-btn:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

.category-badge {
    background: #eef2ff;
    color: #4f46e5;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
    text-align: center;
}

.status-active {
    background: #dcfce7;
    color: #15803d;
}

.status-low {
    background: #fee2e2;
    color: #b91c1c;
}

.status-out {
    background: #f3f4f6;
    color: #6b7280;
}
</style>