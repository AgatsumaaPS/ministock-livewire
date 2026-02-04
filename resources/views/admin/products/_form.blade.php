<div class="space-y-5">
    <!-- SKU -->
    <div>
        <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">SKU <span class="text-red-500">*</span></label>
        <input type="text" 
               name="sku" 
               id="sku"
               value="{{ old('sku', $product->sku ?? '') }}" 
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition font-mono"
               placeholder="Contoh: SKU-001"
               required />
        @error('sku')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Name -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
        <input type="text" 
               name="name" 
               id="name"
               value="{{ old('name', $product->name ?? '') }}" 
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
               placeholder="Masukkan nama produk"
               required />
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Category -->
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
        <select name="category_id" 
                id="category_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white" 
                required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id ?? '') == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Stock -->
    <div>
        <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stok <span class="text-red-500">*</span></label>
        <input type="number" 
               name="stock" 
               id="stock"
               value="{{ old('stock', $product->stock ?? 0) }}" 
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
               min="0" 
               required />
        @error('stock')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Location -->
    <div>
        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Penyimpanan</label>
        <input type="text" 
               name="location" 
               id="location"
               value="{{ old('location', $product->location ?? '') }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
               placeholder="Contoh: Rak A1, Gudang Utama" />
        @error('location')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
