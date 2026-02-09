<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('admin.logs.index') }}" class="mr-3 text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Log Aktivitas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Info Side -->
                <div class="md:col-span-1 space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Informasi Dasar</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs text-gray-400">Dilakukan Oleh</label>
                                <p class="text-sm font-medium text-gray-900">{{ $log->user->name }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-xs text-gray-400">Aksi</label>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold border {{ $log->action_badge }} mt-1">
                                    {{ $log->action_text }}
                                </span>
                            </div>

                            <div>
                                <label class="block text-xs text-gray-400">Waktu</label>
                                <p class="text-sm font-medium text-gray-900">{{ $log->created_at->format('d M Y, H:i:s') }}</p>
                            </div>

                            <div>
                                <label class="block text-xs text-gray-400">Target</label>
                                <p class="text-sm font-medium text-gray-900">{{ $log->model_name }}</p>
                                <p class="text-xs text-gray-500">{{ $log->model_type }} #{{ $log->model_id }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Meta Data</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs text-gray-400">IP Address</label>
                                <code class="text-xs font-mono bg-gray-50 px-2 py-1 rounded">{{ $log->ip_address }}</code>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-400">User Agent</label>
                                <p class="text-[10px] text-gray-500 leading-tight mt-1">{{ $log->user_agent }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Changes Table -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden h-full">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-900">Perubahan Data</h3>
                        </div>

                        <div class="p-6">
                            @if($log->action === 'updated' && $log->changes)
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Field</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Lama</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Baru</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100">
                                            @foreach($log->changes as $field => $change)
                                                <tr>
                                                    <td class="px-4 py-3 text-sm font-bold text-gray-600 capitalize">{{ str_replace('_', ' ', $field) }}</td>
                                                    <td class="px-4 py-3 text-sm text-red-600 line-through whitespace-pre-wrap">{{ $change['old'] ?? '-' }}</td>
                                                    <td class="px-4 py-3 text-sm text-green-600 font-medium whitespace-pre-wrap">{{ $change['new'] ?? '-' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @elseif($log->action === 'created')
                                <div class="flex flex-col items-center justify-center py-12 text-center">
                                    <div class="bg-green-100 text-green-600 p-3 rounded-full mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-medium text-gray-900">Data Baru Dibuat</h4>
                                    <p class="text-gray-500 text-sm max-w-xs mt-2">Log ini mencatat pembuatan data baru: <strong>{{ $log->model_name }}</strong></p>
                                </div>
                            @elseif($log->action === 'deleted')
                                <div class="flex flex-col items-center justify-center py-12 text-center">
                                    <div class="bg-red-100 text-red-600 p-3 rounded-full mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-medium text-gray-900">Data Dihapus</h4>
                                    <p class="text-gray-500 text-sm max-w-xs mt-2">Log ini mencatat penghapusan data: <strong>{{ $log->model_name }}</strong></p>
                                </div>
                            @else
                                <p class="text-center text-gray-500 py-12">Tidak ada detail perubahan yang tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
