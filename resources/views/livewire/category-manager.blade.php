<div>
    <!-- Add Category Form -->
    <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
        <div class="flex gap-3">
            <div class="flex-1">
                <input type="text" 
                       wire:model="name" 
                       placeholder="Enter category name"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       maxlength="255">
                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-2">
                @if($isEditing)
                    <button wire:click="updateCategory" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        Update
                    </button>
                    <button wire:click="resetForm" 
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                        Cancel
                    </button>
                @else
                    <button wire:click="createCategory" 
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                        Add Category
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap">
                        <span class="category-badge">{{ $category->name }}</span>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-center font-medium text-gray-900">
                        {{ $category->products_count }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <button wire:click="editCategory({{ $category->id }})" 
                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition text-sm mr-1">
                            Edit
                        </button>
                        <button wire:click="deleteCategory({{ $category->id }})" 
                                class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm"
                                onclick="return confirm('Delete this category? Products in this category will not be deleted.')">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-12 text-center text-sm text-gray-500">
                        <div class="text-4xl mb-2">📂</div>
                        <p>No categories yet</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($categories->hasPages())
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
    @endif
</div>