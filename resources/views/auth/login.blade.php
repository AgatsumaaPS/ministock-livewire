@extends('layouts.guest')

@section('content')
<div class="mb-4">
    <h2 class="text-center text-2xl font-bold text-gray-900 dark:text-gray-100">
        Login to MiniStock
    </h2>
</div>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Email
        </label>
        <input id="email" 
               type="email" 
               name="email" 
               value="{{ old('email') }}" 
               required 
               autofocus 
               class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-white">
        @error('email')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="mt-4">
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Password
        </label>
        <input id="password" 
               type="password" 
               name="password" 
               required 
               class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-white">
        @error('password')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500">
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                Forgot your password?
            </a>
        @endif

        <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Log in
        </button>
    </div>
</form>
@endsection