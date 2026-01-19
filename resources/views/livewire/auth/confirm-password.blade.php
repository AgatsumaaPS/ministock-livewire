<<<<<<< HEAD
<x-layouts::auth>
=======
<x-layouts.auth>
>>>>>>> 9c48dd41e66a10a08a044f371e7df927a2a92f09
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Confirm password')"
            :description="__('This is a secure area of the application. Please confirm your password before continuing.')"
        />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.confirm.store') }}" class="flex flex-col gap-6">
            @csrf

            <flux:input
                name="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Password')"
                viewable
            />

            <flux:button variant="primary" type="submit" class="w-full" data-test="confirm-password-button">
                {{ __('Confirm') }}
            </flux:button>
        </form>
    </div>
<<<<<<< HEAD
</x-layouts::auth>
=======
</x-layouts.auth>
>>>>>>> 9c48dd41e66a10a08a044f371e7df927a2a92f09
