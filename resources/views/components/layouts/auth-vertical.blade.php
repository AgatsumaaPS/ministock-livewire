@props(['title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ? $title . ' - ' : '' }}{{ config('app.name', 'MiniStock') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .auth-logo-bg {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        }
        
        .auth-card-border-top {
            background: linear-gradient(to right, #3b82f6, #8b5cf6, #ec4899);
            height: 4px;
            width: 100%;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .input-group:focus-within label {
            color: #4f46e5;
        }

        .input-group:focus-within input {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }
    </style>
</head>
<body class="h-full antialiased bg-slate-50 flex flex-col items-center justify-center p-6 min-h-screen">
    
    <!-- Logo Section -->
    <div class="mb-8 flex flex-col items-center space-y-3">
        <div class="w-14 h-14 auth-logo-bg rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200">
            <span class="text-white text-2xl font-bold">M</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">MiniStock</h1>
    </div>

    <!-- Main Card -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden relative">
        <!-- Top Gradient Border -->
        <div class="auth-card-border-top absolute top-0 left-0 right-0"></div>
        
        <div class="p-8 sm:p-10 pt-12">
            {{ $slot }}
        </div>
    </div>

    <!-- Footer Copyright -->
    <div class="mt-8 text-center text-xs text-slate-400 font-medium">
        &copy; {{ date('Y') }} MiniStock Inc. All rights reserved.
    </div>


</body>
</html>
