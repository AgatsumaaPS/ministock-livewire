<div>
    <form wire:submit.prevent="save">
        <!-- Name -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Product Name *</label>
            <input type="text" 
                   wire:model="name" 
                   placeholder="Enter product name"
                   class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   maxlength="255">
            @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- SKU -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SKU (Stock Keeping Unit) *</label>
            <input type="text" 
                   wire:model="sku" 
                   placeholder="Enter SKU code"
                   class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   maxlength="100">
            @error('sku') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category *</label>
            <select wire:model="category_id" 
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Stock -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Initial Stock *</label>
            <input type="number" 
                   wire:model="stock" 
                   placeholder="Enter initial stock quantity"
                   min="0"
                   class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('stock') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location (Optional)</label>
            <input type="text" 
                   wire:model="location" 
                   placeholder="Enter storage location"
                   class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   maxlength="255">
            @error('location') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Product Image (Optional)</label>
            <div class="border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-8 text-center cursor-pointer bg-gray-50 dark:bg-gray-900 hover:border-blue-500 hover:bg-gray-100 dark:hover:bg-gray-800 transition"
                 wire:click="$refs.fileInput.click">
                <div class="text-4xl mb-2">📷</div>
                <p class="text-gray-600 dark:text-gray-400">Click to upload product image</p>
                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">Max 1MB, JPG/PNG</p>
                @if($image)
                    <p class="text-green-600 dark:text-green-400 mt-2">✓ {{ $image->getClientOriginalName() }}</p>
                @endif
            </div>
            <input type="file" 
                   wire:model="image" 
                   ref="fileInput" 
                   class="hidden"
                   accept="image/*">
            @error('image') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition shadow-md">
            {{ $isEditing ? 'Update Product' : 'Add Product' }}
        </button>
    </form>
</div>