<x-layouts.auth-vertical :title="__('Register')">
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Create Account</h2>
        <p class="text-slate-500 text-sm mt-2">Join MiniStock to manage your inventory</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div class="input-group">
            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 transition-colors">
                Full Name
            </label>
            <input 
                name="name" 
                type="text" 
                required 
                autofocus
                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white transition-all duration-200" 
                placeholder="John Doe"
            >
        </div>

        <!-- Email -->
        <div class="input-group">
            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 transition-colors">
                Email Address
            </label>
            <input 
                name="email" 
                type="email" 
                required 
                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white transition-all duration-200" 
                placeholder="you@example.com"
            >
        </div>

        <!-- Password -->
        <div class="input-group">
            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 transition-colors">
                Password
            </label>
            <input 
                name="password" 
                type="password" 
                required 
                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white transition-all duration-200" 
                placeholder="Min. 8 characters"
            >
        </div>

        <!-- Confirm Password -->
        <div class="input-group">
            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 transition-colors">
                Confirm Password
            </label>
            <input 
                name="password_confirmation" 
                type="password" 
                required 
                class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white transition-all duration-200" 
                placeholder="Re-enter password"
            >
        </div>

        <button type="submit" class="w-full mt-6 flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:-translate-y-0.5 transition-all duration-200 uppercase tracking-wide">
            Get Started
        </button>
    </form>

    <div class="mt-8 text-center">
        <p class="text-sm text-slate-500">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500 ml-1 transition-colors" wire:navigate>
                Log In
            </a>
        </p>
    </div>
</x-layouts.auth-vertical>
