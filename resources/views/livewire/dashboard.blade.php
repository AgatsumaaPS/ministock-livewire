<div>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-900/30 p-3 rounded-lg">
                    <span style="font-size: 24px;">📦</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Products</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-100 dark:bg-green-900/30 p-3 rounded-lg">
                    <span style="font-size: 24px;">📂</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Categories</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-100 dark:bg-red-900/30 p-3 rounded-lg">
                    <span style="font-size: 24px;">⚠️</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Low Stock</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $lowStockCount }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-purple-100 dark:bg-purple-900/30 p-3 rounded-lg">
                    <span style="font-size: 24px;">📊</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Stock</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $totalStock }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Recent Products</h3>
        </div>
        <div class="p-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Product</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Category</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Stock</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($recentProducts as $product)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-10 h-10 rounded">
                                @else
                                    <div class="w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center">
                                        <span>📦</span>
                                    </div>
                                @endif
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $product->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="category-badge">{{ $product->category->name }}</span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 font-medium">
                            {{ $product->stock }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            {!! $product->status_badge !!}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                            No products yet
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Low Stock Alert -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Low Stock Alert</h3>
        </div>
        <div class="p-4">
            @if($lowStockProducts->count() > 0)
                <div class="space-y-3">
                    @foreach($lowStockProducts as $product)
                    <div class="p-3 bg-red-50 dark:bg-red-900/20 rounded-lg border-l-4 border-red-500">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-900 dark:text-gray-100">{{ $product->name }}</div>
                                <div class="text-sm text-red-700 dark:text-red-300 mt-1">
                                    Only <span class="font-bold">{{ $product->stock }}</span> left in stock
                                </div>
                            </div>
                            <span class="category-badge" style="background: white; color: #b91c1c;">{{ $product->category->name }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <div class="text-4xl mb-2">✅</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">All stock levels are good!</p>
                </div>
            @endif
        </div>
    </div>
</div>