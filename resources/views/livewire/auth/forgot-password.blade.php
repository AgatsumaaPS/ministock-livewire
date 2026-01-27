<x-layouts::auth :title="__('Forgot password')">
    <div class="min-h-screen bg-gradient-to-br from-violet-50 via-white to-violet-100 flex items-center justify-center px-6">

        <!-- OUTER CARD -->
        <div class="w-full max-w-6xl bg-gradient-to-br from-violet-600 to-violet-700 rounded-3xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                <!-- LEFT : FORM (WHITE) -->
                <div class="p-8 lg:p-12 bg-white text-slate-800 shadow-xl shadow-violet-200/50">

                    <x-auth-header
                        :title="__('Forgot password')"
                        :description="__('Enter your email to receive a password reset link')"
                    />

                    <!-- Session Status -->
                    <x-auth-session-status
                        class="text-center mb-6"
                        :status="session('status')"
                    />

                    <form
                        method="POST"
                        action="{{ route('password.email') }}"
                        class="flex flex-col gap-6"
                    >
                        @csrf

                        <flux:input
                            name="email"
                            :label="__('Email address')"
                            type="email"
                            required
                            autofocus
                            placeholder="email@example.com"
                        />

                        <flux:button
                            variant="primary"
                            type="submit"
                            class="w-full !bg-violet-600 hover:!bg-violet-700 !text-white"
                            data-test="email-password-reset-link-button"
                        >
                            {{ __('Email password reset link') }}
                        </flux:button>
                    </form>

                    <div class="mt-6 text-center text-sm text-slate-500">
                        <span>{{ __('Or, return to') }}</span>
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
                        Forgot your password? No worries.
                        MiniStock helps you recover access quickly
                        so you can get back to managing your inventory.
                    </p>

                    <div class="mt-8 text-sm text-violet-300">
                        Secure & reliable account recovery
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts::auth>
