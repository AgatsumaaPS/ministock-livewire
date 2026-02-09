<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Admin Login</h2>
        <p class="text-gray-500">Please sign in to your administrator account</p>
    </div>

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-medium" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="admin@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 space-y-2">
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-indigo-600 hover:text-indigo-800 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
            </div>
            <div class="relative">
                 <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                 </div>
                <x-text-input id="password" class="block mt-1 w-full pl-10"
                                type="password"
                                name="password"
                                required autocomplete="current-password" 
                                placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative">
                    <input id="remember_me" type="checkbox" class="peer sr-only" name="remember">
                    <div class="block bg-gray-200 w-10 h-6 rounded-full peer-checked:bg-purple-600 transition"></div>
                    <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition peer-checked:translate-x-4"></div>
                </div>
                <span class="ms-3 text-sm text-gray-600 group-hover:text-gray-900 transition-colors">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="w-full justify-center text-base py-3 bg-purple-600 hover:bg-purple-700">
                {{ __('Admin Sign In') }}
            </x-primary-button>
        </div>
        
        <div class="mt-6 text-center text-sm text-gray-600 space-y-2">
            <div>
                Don't have an admin account? 
                <a href="{{ route('admin.register') }}" class="font-bold text-purple-600 hover:text-purple-800 transition-colors">
                    Register as Administrator
                </a>
            </div>
            <div>
                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-900 transition-colors">
                    &larr; Go to User Login
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
