<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Welcome Message & Filters -->
        <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="flex-1">
                <h1 class="text-2xl font-bold text-gray-900">Selamat datang, {{ auth()->user()->name }}!</h1>
                <p class="text-gray-600">Overview stok produk Anda.</p>
            </div>
            
            <!-- Filters -->
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <!-- Search Input -->
                <div class="w-full sm:w-64">
                    <label for="search" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Cari Produk/Kategori</label>
                    <div class="relative">
                        <input wire:model.live.debounce.300ms="search" 
                               id="search" 
                               type="text" 
                               class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-9" 
                               placeholder="Contoh: 'Sepatu' atau 'Gudang A'">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Category Dropdown -->
                <div class="w-full sm:w-48">
                    <label for="category_filter" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Filter Kategori</label>
                    <select wire:model.live="filterCategoryId" id="category_filter" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Products -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Produk</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalProducts }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-2">
                    @if($search) 
                        Hasil pencarian "{{ $search }}" 
                    @elseif($filterCategoryId) 
                        Dalam kategori terpilih 
                    @else 
                        Semua produk 
                    @endif
                </p>
            </div>

            <!-- Total Categories -->
            <a href="{{ route('admin.categories.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition block group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 group-hover:text-purple-600 transition">Total Kategori</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1 group-hover:text-purple-700 transition">{{ $totalCategories }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                </div>
                 <p class="text-xs text-gray-400 mt-2">Kategori aktif</p>
            </a>

            <!-- Low Stock Alert -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Stok Rendah</p>
                        <p class="text-3xl font-bold text-orange-600 mt-1">{{ $lowStockCount }}</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                </div>
                 <p class="text-xs text-gray-400 mt-2">≤ 5 unit</p>
            </div>

            <!-- Out of Stock -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Stok Habis</p>
                        <p class="text-3xl font-bold text-red-600 mt-1">{{ $outOfStockCount }}</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                    </div>
                </div>
                 <p class="text-xs text-gray-400 mt-2">Perlu Restock Segera</p>
            </div>
        </div>
        
        <!-- Total Stock Summary (Filter Target) -->
        <div class="mb-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl shadow-sm p-6 text-white relative overflow-hidden transition-all duration-500">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                     <div class="flex items-center gap-2 mb-1">
                        <p class="text-green-100 text-sm font-medium uppercase tracking-wider">Total Semua Stok</p>
                        @if($filterCategoryId || $search)
                        <span class="bg-white/20 px-2 py-0.5 rounded text-xs">Filtered Result</span>
                        @endif
                     </div>
                    <p class="text-5xl font-extrabold mt-1 tracking-tight">{{ number_format($totalStock) }} <span class="text-2xl font-normal text-green-100">unit</span></p>
                </div>
                <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Recent Products Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Quick Actions -->
            <div class="lg:col-span-1 space-y-4">
                 <h3 class="font-bold text-gray-800 text-lg">Aksi Cepat</h3>
                 
                <a href="{{ route('admin.products.create') }}" class="flex items-center p-4 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <div>
                        <span class="block font-bold text-gray-900">Tambah Produk</span>
                        <span class="text-xs text-gray-500">Input stok barang baru</span>
                    </div>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center p-4 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-purple-200 transition group">
                     <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    </div>
                    <div>
                        <span class="block font-bold text-gray-900">Kelola Kategori</span>
                        <span class="text-xs text-gray-500">Atur kategori produk</span>
                    </div>
                </a>
                
                @if(auth()->user()->is_admin)
                <a href="{{ route('admin.users.index') }}" class="flex items-center p-4 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-teal-200 transition group relative overflow-hidden">
                     <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-lg flex items-center justify-center mr-4 group-hover:bg-teal-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path></svg>
                    </div>
                    <div>
                        <span class="block font-bold text-gray-900">Kelola User</span>
                         <span class="text-xs text-gray-500">Verifikasi pengguna baru</span>
                    </div>
                    @if($pendingUsers > 0)
                        <span class="absolute top-2 right-2 flex h-3 w-3">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                        </span>
                    @endif
                </a>
                @endif
            </div>

            <!-- Recent Products -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-semibold text-gray-900">Produk Terbaru {{ ($filterCategoryId || $search) ? '(Filtered)' : '' }}</h3>
                    <a href="{{ route('admin.products.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Lihat Semua →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($recentProducts as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                         @if($product->image_path)
                                            <img src="{{ asset('storage/' . $product->image_path) }}" class="w-8 h-8 rounded object-cover mr-3">
                                        @else
                                            <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center mr-3 text-xs">📷</div>
                                        @endif
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $product->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $product->category?->name ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 font-medium">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {!! $product->status_badge !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                    <p class="text-sm">Tidak ada produk ditemukan.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
