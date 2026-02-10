<x-layouts.auth-vertical :title="__('Forgot Password')">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Reset Password</h2>
        <p class="text-slate-500 text-sm mt-2">Enter your email to receive instructions</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div class="input-group">
            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 transition-colors">
                Email Address
            </label>
            <input 
                name="email" 
                type="email" 
                required 
                autofocus
                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white transition-all duration-200" 
                placeholder="you@example.com"
            >
        </div>

        <button type="submit" class="w-full mt-6 flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:-translate-y-0.5 transition-all duration-200 uppercase tracking-wide">
            Send Reset Link
        </button>
    </form>

    <div class="mt-8 text-center">
        <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors group">
            <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Login
        </a>
    </div>
</x-layouts.auth-vertical>
