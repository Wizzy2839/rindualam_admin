<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Manajemen - Rindu Alam Coffee</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,ital,wght@6..96,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style> 
        body { font-family: 'Inter', sans-serif; } 
        .font-serif { font-family: 'Bodoni Moda', serif; }
        
        /* Modifikasi Scrollbar agar selaras dengan tema terang */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e4e4e7; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #d4d4d8; }
    </style>
</head>
<body class="bg-zinc-50 flex h-screen overflow-hidden text-zinc-800 antialiased selection:bg-zinc-900 selection:text-white">

    <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-zinc-900/60 z-40 hidden backdrop-blur-sm transition-opacity lg:hidden"></div>

    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-white flex flex-col transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static lg:flex-shrink-0 shadow-[4px_0_24px_rgba(0,0,0,0.02)] border-r border-zinc-200">
        
        <div class="h-24 flex items-center justify-between px-8 border-b border-zinc-100 flex-shrink-0">
            <div class="flex items-center justify-start gap-4">
                <div class="flex flex-col justify-center translate-y-px">
                    <h1 class="font-sans font-black text-xl leading-none text-zinc-900 tracking-tight uppercase">Rindu Alam</h1>
                    <p class="text-[8px] font-bold tracking-[0.15em] uppercase text-zinc-500 mt-1">Coffee & Roastery</p>
                </div>
            </div>
            <button id="close-sidebar" class="lg:hidden text-zinc-400 hover:text-zinc-900 transition focus:outline-none">
                <i class="ph ph-x text-2xl"></i>
            </button>
        </div>
        
        <nav class="flex-1 py-8 px-4 space-y-1.5 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-squares-four text-xl"></i> Ringkasan Dasbor
            </a>
            
            <p class="px-4 pt-8 pb-3 text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Manajemen Konten</p>
            
            <a href="{{ route('menu-categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('menu-categories.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-tag text-xl"></i> Kategori Produk
            </a>
            <a href="{{ route('menu-items.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('menu-items.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-coffee text-xl"></i> Katalog Menu
            </a>
            <a href="{{ route('galleries.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('galleries.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-image text-xl"></i> Galeri Aset
            </a>
            <a href="{{ route('team-members.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('team-members.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-users text-xl"></i> Direktori Tim
            </a>
            
            <p class="px-4 pt-8 pb-3 text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Sistem</p>
            
            <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('settings.*') ? 'bg-zinc-900 text-white font-medium shadow-md' : 'text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900' }} transition-all duration-200">
                <i class="ph ph-gear text-xl"></i> Pengaturan Global
            </a>
        </nav>

        <div class="p-6 border-t border-zinc-100 bg-zinc-50/50 flex-shrink-0">
            <div class="flex items-center gap-3 opacity-70 hover:opacity-100 transition-opacity duration-300">
                <div class="w-8 h-8 rounded-md bg-zinc-200 flex items-center justify-center">
                    <i class="ph ph-code text-zinc-600"></i>
                </div>
                <div>
                    <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold mb-0.5">Dikembangkan oleh</p>
                    <p class="text-[11px] font-bold text-zinc-900 tracking-wide">TEAM WARAWIRI 04</p>
                </div>
            </div>
        </div>

    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <header class="h-24 bg-zinc-50 border-b border-zinc-200 flex items-center justify-between px-6 lg:px-12 flex-shrink-0 z-20">
            <div class="flex items-center gap-5">
                <button id="open-sidebar" class="lg:hidden text-zinc-500 hover:text-zinc-900 focus:outline-none transition bg-white p-2.5 rounded-lg border border-zinc-200 shadow-sm">
                    <i class="ph ph-list text-xl"></i>
                </button>
                <div>
                    <h2 class="text-xl font-serif font-bold text-zinc-900 tracking-tight">@yield('header', 'Dashboard')</h2>
                    <p class="hidden sm:block text-[10px] text-zinc-500 uppercase tracking-widest font-medium mt-1">Sistem Manajemen Internal</p>
                </div>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-sm font-bold text-zinc-900">{{ Auth::user()->name }}</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Administrator</span>
                </div>
                <div class="h-8 w-px bg-zinc-300 hidden sm:block"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-xs font-bold text-zinc-600 hover:text-zinc-900 hover:bg-zinc-200 px-4 py-2.5 rounded-lg uppercase tracking-widest transition-all duration-300 border border-transparent hover:border-zinc-300">
                        <span class="hidden sm:inline">Keluar</span> <i class="ph ph-sign-out text-lg"></i>
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-12 relative">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const openBtn = document.getElementById('open-sidebar');
            const closeBtn = document.getElementById('close-sidebar');
            const backdrop = document.getElementById('mobile-sidebar-backdrop');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('opacity-0');
                setTimeout(() => backdrop.classList.add('hidden'), 300);
            }

            openBtn.addEventListener('click', openSidebar);
            closeBtn.addEventListener('click', closeSidebar);
            backdrop.addEventListener('click', closeSidebar);
        });
    </script>
</body>
</html>