<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — Rindu Alam Coffee</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,ital,wght@6..96,0,400;6..96,0,500;6..96,0,600;6..96,1,400&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Bodoni Moda', serif; }

        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e4e4e7; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #d4d4d8; }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
            -webkit-text-fill-color: #18181b;
            transition: background-color 5000s ease-in-out 0s;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .animate-delay-100 { animation-delay: 0.1s; opacity: 0; }
        .animate-delay-200 { animation-delay: 0.2s; opacity: 0; }
        .animate-delay-300 { animation-delay: 0.3s; opacity: 0; }
        .animate-delay-400 { animation-delay: 0.4s; opacity: 0; }
    </style>
</head>
<body class="bg-zinc-50 antialiased selection:bg-zinc-900 selection:text-white">

    <div class="min-h-screen flex">

        {{-- Left Branding Panel --}}
        <div class="hidden lg:flex lg:w-1/2 bg-zinc-900 relative overflow-hidden flex-col justify-between p-16">
            {{-- Subtle pattern overlay --}}
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

            {{-- Logo --}}
            <div class="relative z-10">
                <div class="flex items-center gap-4">
                    <div class="flex flex-col justify-center">
                        <h1 class="font-sans font-black text-2xl leading-none text-white tracking-tight uppercase">Rindu Alam</h1>
                        <p class="text-[9px] font-bold tracking-[0.15em] uppercase text-zinc-500 mt-1.5">Coffee & Roastery</p>
                    </div>
                </div>
            </div>

            {{-- Center content --}}
            <div class="relative z-10 flex-1 flex flex-col justify-center max-w-md">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-4">Sistem Manajemen</p>
                <h2 class="text-5xl font-serif text-white tracking-tight leading-[1.15] mb-6">
                    Kelola bisnis Anda<br>dengan mudah.
                </h2>
                <p class="text-sm text-zinc-400 leading-relaxed max-w-sm">
                    Panel administrasi untuk mengelola menu, galeri, tim, dan seluruh konten website Rindu Alam Coffee.
                </p>

                {{-- Decorative line --}}
                <div class="mt-12 flex items-center gap-4">
                    <div class="h-px w-16 bg-zinc-700"></div>
                    <i class="ph ph-coffee text-zinc-600"></i>
                    <div class="h-px w-16 bg-zinc-700"></div>
                </div>
            </div>

            {{-- Bottom credit --}}
            <div class="relative z-10 flex items-center gap-3 opacity-60">
                <div class="w-8 h-8 rounded-md bg-zinc-800 flex items-center justify-center">
                    <i class="ph ph-code text-zinc-500"></i>
                </div>
                <div>
                    <p class="text-[9px] text-zinc-600 uppercase tracking-widest font-bold mb-0.5">Dikembangkan oleh</p>
                    <p class="text-[11px] font-bold text-zinc-400 tracking-wide">TEAM WARAWIRI 04</p>
                </div>
            </div>
        </div>

        {{-- Right Login Panel --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-20 relative">

            {{-- Mobile logo (shown only on small screens) --}}
            <div class="lg:hidden mb-12 text-center animate-fade-in-up">
                <h1 class="font-sans font-black text-xl leading-none text-zinc-900 tracking-tight uppercase">Rindu Alam</h1>
                <p class="text-[8px] font-bold tracking-[0.15em] uppercase text-zinc-500 mt-1">Coffee & Roastery</p>
            </div>

            <div class="w-full max-w-sm">
                {{-- Header --}}
                <div class="mb-10 animate-fade-in-up">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Autentikasi</p>
                    <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">Masuk ke panel.</h2>
                    <p class="text-sm text-zinc-500 mt-2">Silakan masukkan kredensial Anda untuk melanjutkan.</p>
                </div>

                {{-- Session Status --}}
                @if (session('status'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-medium tracking-wide animate-fade-in-up">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Login Form --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-6 animate-fade-in-up animate-delay-100">
                        <label for="email" class="block text-xs font-bold uppercase tracking-widest text-zinc-500 mb-2">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-envelope text-zinc-400"></i>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="nama@email.com"
                                class="w-full pl-11 pr-4 py-3.5 bg-white border border-zinc-200 text-zinc-900 text-sm placeholder-zinc-400 focus:outline-none focus:border-zinc-400 focus:ring-0 transition-colors duration-300"
                            />
                        </div>
                        @error('email')
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-6 animate-fade-in-up animate-delay-200">
                        <label for="password" class="block text-xs font-bold uppercase tracking-widest text-zinc-500 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-lock text-zinc-400"></i>
                            </div>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="w-full pl-11 pr-4 py-3.5 bg-white border border-zinc-200 text-zinc-900 text-sm placeholder-zinc-400 focus:outline-none focus:border-zinc-400 focus:ring-0 transition-colors duration-300"
                            />
                        </div>
                        @error('password')
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember Me & Forgot --}}
                    <div class="flex items-center justify-between mb-8 animate-fade-in-up animate-delay-300">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 border-zinc-300 text-zinc-900 focus:ring-zinc-500 focus:ring-offset-0 rounded-sm cursor-pointer"
                            >
                            <span class="ml-2 text-xs text-zinc-500 font-medium">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-medium text-zinc-500 hover:text-zinc-900 transition-colors duration-300">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    {{-- Submit Button --}}
                    <div class="animate-fade-in-up animate-delay-400">
                        <button
                            type="submit"
                            class="w-full bg-zinc-900 text-white px-6 py-4 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 flex items-center justify-center gap-2"
                        >
                            Masuk ke Panel <i class="ph ph-arrow-right text-sm"></i>
                        </button>
                    </div>
                </form>

                {{-- Footer --}}
                <div class="mt-12 pt-8 border-t border-zinc-100 animate-fade-in-up animate-delay-400">
                    <p class="text-[10px] text-zinc-400 uppercase tracking-widest font-medium text-center">
                        &copy; {{ date('Y') }} Rindu Alam Coffee &mdash; Sistem Manajemen Internal
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
