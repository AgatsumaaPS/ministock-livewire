<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Admin Registration</h2>
        <p class="text-gray-500">Apply for an administrator account (Requires Approval)</p>
    </div>

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 font-medium" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 space-y-2">
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-medium" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="admin@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 space-y-2">
             <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Min. 8 characters" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 space-y-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Re-enter password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="w-full justify-center text-base py-3 bg-purple-600 hover:bg-purple-700">
                {{ __('Submit for Approval') }}
            </x-primary-button>
        </div>

         <div class="mt-6 text-center text-sm text-gray-600 space-y-2">
            <div>
                Already have an admin account? 
                <a href="{{ route('admin.login') }}" class="font-bold text-purple-600 hover:text-purple-800 transition-colors">
                    Admin Log In
                </a>
            </div>
            <div>
                 <a href="{{ route('register') }}" class="text-gray-500 hover:text-gray-900 transition-colors">
                    &larr; Go to User Registration
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
