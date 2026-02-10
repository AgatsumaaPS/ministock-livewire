<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50 scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MiniStock') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hero-gradient {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
        }
        .text-gradient {
            background: linear-gradient(to right, #4f46e5, #9333ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="antialiased text-slate-600 bg-slate-50">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold">M</div>
                    <span class="font-bold text-xl text-slate-900">MiniStock</span>
                </div>

                <!-- Navigation Links & Auth Buttons -->
                <div class="flex items-center gap-8">
                    <a href="#features" class="hidden md:block text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Features</a>
                    <a href="#benefits" class="hidden md:block text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">Benefits</a>
                    <a href="#faq" class="hidden md:block text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">FAQ</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ auth()->user()->isAdmin() ? url('/dashboard') : url('/user/dashboard') }}" 
                               class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition-colors">
                               Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition-colors">
                               Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                   class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-colors shadow-sm hover:shadow-md">
                                   Get Started
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-24 overflow-hidden hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-xs font-semibold uppercase tracking-wide mb-6 animate-fade-in-up">
                <span class="w-2 h-2 bg-indigo-500 rounded-full mr-2 animate-pulse"></span>
                Inventory Management Simplified
            </div>

            <h1 class="text-4xl sm:text-6xl font-extrabold text-slate-900 tracking-tight mb-6 leading-tight max-w-4xl mx-auto">
                Manage your stock with <br>
                <span class="text-gradient">precision and ease.</span>
            </h1>

            <p class="text-lg sm:text-xl text-slate-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                MiniStock provides powerful tools to track inventory, manage orders, and analyze performance—all in one modern interface.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-4 text-base font-bold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-all shadow-lg hover:shadow-indigo-500/30 hover:-translate-y-1">
                    Start for Free
                </a>
                <a href="{{ route('login') }}" class="px-8 py-4 text-base font-bold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm hover:shadow-md hover:-translate-y-1">
                    Live Demo
                </a>
            </div>

            <!-- Floating UI Elements (Decorative) -->
            <div class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-12 hidden lg:block opacity-40">
                <div class="w-64 h-64 bg-purple-200 rounded-full blur-3xl animate-blob"></div>
            </div>
            <div class="absolute bottom-0 right-0 translate-y-1/2 translate-x-12 hidden lg:block opacity-40">
                <div class="w-80 h-80 bg-blue-200 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-24 bg-white relative scroll-mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Everything you need</h2>
                <p class="text-slate-500 max-w-xl mx-auto">Powerful features designed to help your business grow and stay organized.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:border-indigo-100 hover:shadow-xl hover:shadow-indigo-100/50 transition-all duration-300 group">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Real-time Tracking</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Monitor stock levels in real-time. Get instant alerts when items are running low.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:border-purple-100 hover:shadow-xl hover:shadow-purple-100/50 transition-all duration-300 group">
                     <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Analytics Dashboard</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Visualize your data with beautiful charts. Understand trends and make data-driven decisions.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:border-pink-100 hover:shadow-xl hover:shadow-pink-100/50 transition-all duration-300 group">
                     <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-pink-600 mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Team Collaboration</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Manage roles and permissions. Work together seamlessly with your entire team.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div id="benefits" class="py-24 bg-slate-50 scroll-mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Why choose MiniStock?</h2>
                <p class="text-slate-500 max-w-xl mx-auto">Discover the advantages that set us apart from the competition.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 mb-2">Save Time & Money</h3>
                        <p class="text-slate-500">Automate repetitive tasks and reduce manual errors, saving hours of work every week.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 mb-2">Lightning Fast</h3>
                        <p class="text-slate-500">Built with modern technology for instant updates and blazing-fast performance.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 mb-2">Secure & Reliable</h3>
                        <p class="text-slate-500">Enterprise-grade security with regular backups to keep your data safe.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center text-orange-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 mb-2">24/7 Support</h3>
                        <p class="text-slate-500">Our dedicated team is always ready to help you succeed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div id="faq" class="py-24 bg-white scroll-mt-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-slate-500">Everything you need to know about MiniStock.</p>
            </div>

            <div class="space-y-6">
                <details class="group bg-slate-50 rounded-xl p-6 hover:bg-slate-100 transition-colors">
                    <summary class="flex justify-between items-center cursor-pointer font-semibold text-slate-900">
                        <span>How does MiniStock help manage inventory?</span>
                        <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <p class="mt-4 text-slate-500">MiniStock provides real-time tracking, automated alerts, and comprehensive analytics to help you manage stock levels efficiently and prevent stockouts.</p>
                </details>

                <details class="group bg-slate-50 rounded-xl p-6 hover:bg-slate-100 transition-colors">
                    <summary class="flex justify-between items-center cursor-pointer font-semibold text-slate-900">
                        <span>Is there a free trial available?</span>
                        <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <p class="mt-4 text-slate-500">Yes! You can start with our free plan and upgrade anytime as your business grows.</p>
                </details>

                <details class="group bg-slate-50 rounded-xl p-6 hover:bg-slate-100 transition-colors">
                    <summary class="flex justify-between items-center cursor-pointer font-semibold text-slate-900">
                        <span>Can I invite team members?</span>
                        <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <p class="mt-4 text-slate-500">Absolutely! MiniStock supports team collaboration with customizable roles and permissions for each member.</p>
                </details>

                <details class="group bg-slate-50 rounded-xl p-6 hover:bg-slate-100 transition-colors">
                    <summary class="flex justify-between items-center cursor-pointer font-semibold text-slate-900">
                        <span>What kind of support do you offer?</span>
                        <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <p class="mt-4 text-slate-500">We provide 24/7 email support, comprehensive documentation, and video tutorials to help you get the most out of MiniStock.</p>
                </details>

                <details class="group bg-slate-50 rounded-xl p-6 hover:bg-slate-100 transition-colors">
                    <summary class="flex justify-between items-center cursor-pointer font-semibold text-slate-900">
                        <span>Is my data secure?</span>
                        <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </summary>
                    <p class="mt-4 text-slate-500">Yes! We use enterprise-grade encryption and perform regular backups to ensure your data is always safe and secure.</p>
                </details>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 relative overflow-hidden">
        <!-- Animated Background Shapes -->
        <div class="absolute top-10 left-10 w-32 h-32 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-20 right-20 w-40 h-40 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-10 left-1/3 w-36 h-36 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        
        <!-- Floating Icons -->
        <div class="absolute top-1/4 left-1/4 opacity-20 animate-float">
            <svg class="w-16 h-16 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="absolute bottom-1/4 right-1/4 opacity-20 animate-float animation-delay-2000">
            <svg class="w-20 h-20 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
        </div>

        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-slate-900">Ready to streamline your inventory?</h2>
            <p class="text-slate-600 text-lg mb-8">Join thousands of businesses using MiniStock today.</p>
            <a href="{{ route('register') }}" class="inline-block px-8 py-4 text-base font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl hover:-translate-y-1 animate-pulse-slow">
                Get Started Now
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-50 py-12 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center gap-2 mb-4">
                <div class="w-6 h-6 bg-slate-800 rounded flex items-center justify-center text-white text-xs font-bold">M</div>
                <span class="font-bold text-slate-700">MiniStock</span>
            </div>
            <p class="text-slate-400 text-sm">&copy; {{ date('Y') }} MiniStock Inc. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
