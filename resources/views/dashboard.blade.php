<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard - Mini Stock') }}
            </h2>
            <div class="relative" style="width: 320px;">
                <input type="text" 
                       placeholder="Search products..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                       style="font-size: 14px;">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" style="font-size: 16px;">🔍</span>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Livewire Dashboard Component -->
            @livewire('dashboard')

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                <!-- Products Table -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">All Products</h3>
                                <button wire:click="$emit('openModal')" 
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                    + Add Product
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            @livewire('product-list')
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="space-y-6">
                    <!-- Add Product Form -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Quick Add</h3>
                        </div>
                        <div class="p-6">
                            @livewire('add-product-form')
                        </div>
                    </div>

                    <!-- Stock Alerts -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Stock Alerts</h3>
                        </div>
                        <div class="p-6">
                            @livewire('stock-alert')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Section -->
            <div class="mt-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Category Management</h3>
                    </div>
                    <div class="p-6">
                        @livewire('category-manager')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast-container" class="fixed top-20 right-4 z-[9999]"></div>
</x-app-layout>

@push('scripts')
<script>
document.addEventListener('livewire:load', function() {
    Livewire.on('toast', (event) => {
        const { message, type = 'success' } = event;
        const icon = type === 'success' ? '✓' : '✗';
        
        const toast = document.createElement('div');
        toast.className = `mb-3 px-4 py-3 rounded-lg shadow-lg flex items-center gap-3 ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        toast.innerHTML = `
            <span class="text-2xl">${icon}</span>
            <span class="font-medium">${message}</span>
        `;
        
        document.getElementById('toast-container').appendChild(toast);
        
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(400px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    });

    Livewire.on('showNotification', (event) => {
        const { title, message, type = 'warning' } = event;
        
        const notification = document.createElement('div');
        notification.className = `mb-3 px-4 py-3 rounded-lg shadow-lg border-l-4 ${
            type === 'warning' ? 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-500 text-yellow-700 dark:text-yellow-300' : 
            'bg-red-50 dark:bg-red-900/20 border-red-500 text-red-700 dark:text-red-300'
        }`;
        notification.innerHTML = `
            <h4 class="font-semibold">${title}</h4>
            <p class="text-sm mt-1">${message}</p>
        `;
        
        const container = document.querySelector('.notifications');
        if (!container) {
            const newContainer = document.createElement('div');
            newContainer.className = 'notifications fixed top-4 right-4 z-[9999] w-80';
            newContainer.appendChild(notification);
            document.body.appendChild(newContainer);
        } else {
            container.appendChild(notification);
        }
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    });
});
</script>
@endpush