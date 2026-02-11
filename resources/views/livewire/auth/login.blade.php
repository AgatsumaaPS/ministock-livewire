<x-layouts.auth-vertical :title="__('Login')">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Sign In</h2>
        <p class="text-slate-500 text-sm mt-2">Welcome back to MiniStock</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
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

        <!-- Password -->
        <div class="input-group">
            <div class="flex justify-between items-center mb-2">
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider transition-colors">
                    Password
                </label>
            </div>
            <input 
                name="password" 
                type="password" 
                required 
                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white transition-all duration-200" 
                placeholder="Enter your password"
            >
        </div>

        <div class="flex items-center justify-between mt-4">
            <label class="flex items-center cursor-pointer group">
                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 transition-colors">
                <span class="ml-2 text-sm text-slate-500 group-hover:text-slate-700 transition-colors">Remember me</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
                Forgot Password?
            </a>
        </div>

        <button type="submit" class="w-full mt-6 flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:-translate-y-0.5 transition-all duration-200 uppercase tracking-wide">
            Sign In
        </button>
    </form>

    <div class="mt-8 text-center">
        <p class="text-sm text-slate-500">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500 ml-1 transition-colors" wire:navigate>
                Create Account
            </a>
        </p>
    </div>
</x-layouts.auth-vertical>
