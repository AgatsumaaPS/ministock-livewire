<x-layouts::auth :title="'Login to your account'">
    <div class="min-h-screen bg-gradient-to-br from-violet-50 via-white to-violet-100 flex items-center justify-center px-6">

        <!-- OUTER CARD -->
        <div class="w-full max-w-6xl bg-gradient-to-br from-violet-600 to-violet-700 rounded-3xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                <!-- LEFT : LOGIN FORM (WHITE) -->
                <div class="p-8 lg:p-12 bg-white text-slate-800 shadow-xl shadow-violet-200/50">
                    <h1 class="text-3xl font-bold mb-2">Welcome Back</h1>
                    <p class="text-slate-500 mb-8">Login to MiniStock Admin</p>

                    <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label class="text-sm font-medium text-slate-600">Email</label>
                            <input
                                type="email"
                                name="email"
                                required
                                placeholder="Enter your email"
                                class="mt-2 w-full rounded-xl bg-white border border-slate-300
                                       px-4 py-3 text-sm text-slate-800 placeholder-slate-400
                                       focus:ring-2 focus:ring-violet-500 focus:border-violet-500 focus:outline-none"
                            >
                        </div>
                                                    @error('email')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror


                        <!-- Password -->
                        <div>
                            <div class="flex justify-between text-sm">
                                <label class="font-medium text-slate-600">Password</label>
                                <a href="{{ route('password.request') }}"
                                   class="text-violet-600 hover:underline">
                                    Forgot Password?
                                </a>
                            </div>

                            <input
                                type="password"
                                name="password"
                                required
                                placeholder="••••••••"
                                class="mt-2 w-full rounded-xl bg-white border border-slate-300
                                       px-4 py-3 text-sm text-slate-800 placeholder-slate-400
                                       focus:ring-2 focus:ring-violet-500 focus:border-violet-500 focus:outline-none"
                            >
                        </div>

                        <!-- Remember -->
                        <label class="flex items-center gap-2 text-sm text-slate-600">
                            <input type="checkbox" class="rounded border-slate-300 text-violet-600">
                            Remember me
                        </label>

                        <!-- Button -->
                        <button
                            type="submit"
                            class="w-full bg-violet-600 hover:bg-violet-700
                                   py-3 rounded-xl font-semibold text-white transition">
                            Sign in to your account
                        </button>
                    </form>

                    <p class="mt-6 text-sm text-slate-500">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-violet-600 hover:underline">
                            Sign up
                        </a>
                    </p>
                </div>

                <!-- RIGHT : BRAND PANEL -->
                <div class="hidden lg:flex bg-violet-700 p-12 text-white flex-col justify-center">
                    <h2 class="text-4xl font-bold leading-tight">
                        MiniStock<br>
                        Stock & Warehouse System
                    </h2>

                    <p class="mt-4 text-violet-200 max-w-md">
                        Monitor stock levels, manage warehouse documentation,
                        and keep your inventory organized in one system.
                    </p>

                    <div class="mt-8 text-sm text-violet-300">
                        Trusted by <span class="font-semibold">15k+</span> users
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts::auth>
