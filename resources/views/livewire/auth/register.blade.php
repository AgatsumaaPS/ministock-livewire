<x-layouts::auth :title="'Create an account'">
    <div class="min-h-screen bg-gradient-to-br from-violet-50 via-white to-violet-100 flex items-center justify-center px-6">

        <!-- OUTER CARD -->
        <div class="w-full max-w-6xl bg-gradient-to-br from-violet-600 to-violet-700 rounded-3xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                <!-- LEFT : REGISTER FORM (WHITE) -->
                <div class="p-8 lg:p-12 bg-white text-slate-800 shadow-xl shadow-violet-200/50">

                    <x-auth-header
                        :title="__('Create an account')"
                        :description="__('Enter your details below to create your account')"
                    />

                    <!-- Session Status -->
                    <x-auth-session-status class="text-center mb-6" :status="session('status')" />

                    <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
                        @csrf

                        <flux:input
                            name="name"
                            :label="__('Name')"
                            :value="old('name')"
                            type="text"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Full name"
                        />

                        <flux:input
                            name="email"
                            :label="__('Email address')"
                            :value="old('email')"
                            type="email"
                            required
                            autocomplete="email"
                            placeholder="email@example.com"
                        />

                        <flux:input
                            name="password"
                            :label="__('Password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="Password"
                            viewable
                        />

                        <flux:input
                            name="password_confirmation"
                            :label="__('Confirm password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm password"
                            viewable
                        />

                        <flux:button
                            type="submit"
                            variant="primary"
                            class="w-full !bg-violet-600 hover:!bg-violet-700 !text-white"
                        >
                            {{ __('Create account') }}
                        </flux:button>
                    </form>

                    <div class="mt-6 text-center text-sm text-slate-500">
                        <span>{{ __('Already have an account?') }}</span>
                        <flux:link
                            :href="route('login')"
                            wire:navigate
                            class="text-violet-600 hover:underline"
                        >
                            {{ __('Log in') }}
                        </flux:link>
                    </div>
                </div>

                <!-- RIGHT : BRAND PANEL -->
                <div class="hidden lg:flex bg-violet-700 p-12 text-white flex-col justify-center">
                    <h2 class="text-4xl font-bold leading-tight">
                        MiniStock<br>
                        Stock & Warehouse System
                    </h2>

                    <p class="mt-4 text-violet-200 max-w-md">
                        Create your MiniStock account and start monitoring inventory,
                        managing warehouse data, and tracking stock with ease.
                    </p>

                    <div class="mt-8 text-sm text-violet-300">
                        Trusted by <span class="font-semibold">15k+</span> users
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts::auth>
