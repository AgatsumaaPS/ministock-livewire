<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MiniStock') }} - Awaiting Admin Approval</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-800 bg-white selection:bg-indigo-500 selection:text-white overflow-x-hidden">
    
    <!-- Animated Background Layers (matching landing page) -->
    <div class="fixed inset-0 -z-10 bg-white overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[1000px] h-[1000px] bg-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-[1000px] h-[1000px] bg-indigo-200/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-1/3 w-[1000px] h-[1000px] bg-pink-200/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 10s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>

    <div class="relative overflow-x-hidden min-h-screen flex flex-col">
        
        <!-- Navigation Bar (simplified) -->
        <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-100 top-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center gap-2">
                        <!-- Branding -->
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-500/30">
                            M
                        </div>
                        <span class="font-bold text-2xl tracking-tight text-gray-900">Mini<span class="text-indigo-600">Stock</span></span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 flex items-center justify-center pt-32 pb-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl w-full">
                <!-- Card Container -->
                <div class="bg-white rounded-3xl shadow-xl shadow-indigo-500/10 border border-gray-100 p-8 md:p-12 text-center relative overflow-hidden">
                    
                    <!-- Background Decorations -->
                    <div class="absolute top-0 right-0 -mr-24 -mt-24 w-48 h-48 rounded-full bg-indigo-100/30 blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 -ml-24 -mb-24 w-48 h-48 rounded-full bg-purple-100/30 blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <!-- Icon -->
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-indigo-100 mb-8 mx-auto">
                            <svg class="w-10 h-10 text-indigo-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>

                        <!-- Heading -->
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                            Awaiting Admin Approval
                        </h1>

                        <!-- Description -->
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-lg mx-auto">
                            Welcome to <span class="font-semibold text-indigo-600">MiniStock</span>! Your account has been created successfully. 
                        </p>

                        <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-6 mb-8">
                            <p class="text-gray-700 mb-3">
                                <span class="font-semibold text-indigo-600">Please wait for admin approval</span> before you can access the full features of the application.
                            </p>
                            <p class="text-sm text-gray-600">
                                Our admin team will review your account and approve it shortly. You'll receive an email notification once your account is activated.
                            </p>
                        </div>

                        <!-- Status Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-50 border border-yellow-100 text-yellow-800 text-sm font-medium mb-8">
                            <div class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></div>
                            Pending Review
                        </div>

                        <!-- Additional Info -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                            <div class="p-4 bg-gray-50 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">Email Notification</h3>
                                <p class="text-xs text-gray-600">You'll be notified at your registered email</p>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">Quick Approval</h3>
                                <p class="text-xs text-gray-600">Usually approved within 24 hours</p>
                            </div>

                            <div class="p-4 bg-gray-50 rounded-xl">
                                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">Full Access</h3>
                                <p class="text-xs text-gray-600">Access all features once approved</p>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="space-y-3">
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="w-full px-8 py-4 rounded-full bg-indigo-600 text-white font-bold text-lg hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                                    Back to Landing Page
                                </button>
                            </form>
                            
                            <p class="text-sm text-gray-600">
                                Questions? <a href="mailto:support@ministock.local" class="text-indigo-600 font-semibold hover:underline">Contact support</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer Info -->
                <div class="mt-12 text-center">
                    <p class="text-gray-600 text-sm">
                        <span class="font-medium text-gray-900">{{ auth()->user()->name }}</span> • <span class="text-gray-500">{{ auth()->user()->email }}</span>
                    </p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-50 border-t border-gray-200 py-8 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-gray-600 text-sm">© {{ date('Y') }} MiniStock Inc. All rights reserved.</p>
            </div>
        </footer>

    </div>
</body>
</html>
