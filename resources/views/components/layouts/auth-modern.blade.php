@props(['title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ? $title . ' - ' : '' }}{{ config('app.name', 'MiniStock') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Modern Abstract Background Animation */
        .animated-bg {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* Floating Shapes */
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 20s infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); opacity: 0.8; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 0.4; }
            100% { transform: translateY(0px) rotate(360deg); opacity: 0.8; }
        }
    </style>
</head>
<body class="h-full antialiased animated-bg relative overflow-hidden">
    
    <!-- Floating Background Shapes -->
    <div class="absolute top-10 left-10 w-32 h-32 bg-white/20 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-10 right-10 w-48 h-48 bg-blue-400/20 rounded-full blur-2xl animate-bounce" style="animation-duration: 10s"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8 relative z-10">
        {{ $slot }}
    </div>

    @fluxScripts
</body>
</html>
