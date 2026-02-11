<x-layouts.auth-vertical :title="__('Pending Approval')">
    <style>
        @keyframes breathe {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(251, 191, 36, 0.7);
            }
            50% { 
                transform: scale(1.1);
                box-shadow: 0 0 0 15px rgba(251, 191, 36, 0);
            }
        }
        @keyframes tick {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(6deg); }
            75% { transform: rotate(-6deg); }
        }
        .clock-container {
            animation: breathe 2s ease-in-out infinite;
        }
        .clock-hand {
            animation: tick 2s ease-in-out infinite;
            transform-origin: center;
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .shimmer-text {
            background: linear-gradient(90deg, #1e293b 0%, #fbbf24 50%, #1e293b 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 3s linear infinite;
        }
    </style>

    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-yellow-100 to-orange-100 text-yellow-600 mb-4 clock-container">
            <svg class="w-10 h-10 clock-hand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-slate-900 mb-3">Approval Pending</h2>
        <p class="text-slate-500 text-sm px-4 mb-4">
            Thanks for signing up! Your account is currently under review by our administrator.
        </p>
        
        <!-- Status Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-50 border border-yellow-200 rounded-full">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
            </span>
            <span class="text-xs font-semibold text-yellow-700 uppercase tracking-wide">Status: {{ auth()->user()->status }}</span>
        </div>
    </div>

    <div class="bg-indigo-50 rounded-xl p-4 mb-8 text-left border border-indigo-100">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-indigo-800">What happens next?</h3>
                <div class="mt-2 text-sm text-indigo-700">
                    <p>Once approved, you will be able to access your dashboard. We'll verify your details shortly and notify you via email.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full justify-center py-3 px-4 border border-red-200 rounded-xl shadow-sm text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 hover:text-red-800 hover:border-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                Log Out
            </button>
        </form>
    </div>
</x-layouts.auth-vertical>
