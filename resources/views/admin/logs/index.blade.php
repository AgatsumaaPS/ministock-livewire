<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Aktivitas Logs') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filter & Search -->
            <div class="mb-6 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <form action="{{ route('admin.logs.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="relative col-span-1 md:col-span-2">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari berdasarkan produk atau user..." 
                               class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <div>
                        <select name="action" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                            <option value="">Semua Aksi</option>
                            <option value="created" @selected(request('action') == 'created')>Menambahkan</option>
                            <option value="updated" @selected(request('action') == 'updated')>Memperbarui</option>
                            <option value="deleted" @selected(request('action') == 'deleted')>Menghapus</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 bg-blue-600 text-white px-4 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Filter
                        </button>
                        @if(request()->anyFilled(['search', 'action']))
                        <a href="{{ route('admin.logs.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2.5 rounded-lg font-semibold hover:bg-gray-200 transition">
                            Reset
                        </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Logs Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk / Model</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                                <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($logs as $log)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs mr-3">
                                                {{ substr($log->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $log->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $log->ip_address }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {{ $log->action_badge }}">
                                            <span class="mr-1.5">{!! $log->action_icon !!}</span>
                                            {{ $log->action_text }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $log->model_name ?? '-' }}</div>
                                        <div class="text-xs text-gray-500">{{ $log->model_type }} #{{ $log->model_id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $log->created_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $log->created_at->format('H:i:s') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.logs.show', $log) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 px-3 py-1.5 rounded-lg transition">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="text-gray-400 mb-2">
                                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 text-lg">Tidak ada log aktivitas ditemukan</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($logs->hasPages())
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    {{ $logs->links() }}
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
