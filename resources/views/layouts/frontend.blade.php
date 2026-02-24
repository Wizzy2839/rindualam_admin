<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rindu Alam Coffee - Pengalaman Kopi Otentik')</title>
    
    <meta name="description" content="Nikmati pengalaman kopi otentik dengan suasana alam yang menenangkan di Rindu Alam Coffee.">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,ital,wght@6..96,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { 
                        'ra-black': '#0a0a0a', 
                        'ra-white': '#ffffff', 
                        'ra-gray': '#f4f4f5' 
                    },
                    fontFamily: { 
                        sans: ['Inter', 'sans-serif'], 
                        serif: ['Bodoni Moda', 'serif'] 
                    },
                    letterSpacing: { 
                        tight: '-0.02em', 
                        widest: '0.15em' 
                    }
                }
            }
        }
    </script>
    <style>
        .scrolled-nav {
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            background-color: rgba(255, 255, 255, 0.98);
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -4px;
            left: 0;
            background-color: #0a0a0a;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-white text-ra-black font-sans antialiased selection:bg-ra-black selection:text-white flex flex-col min-h-screen">

    <div class="bg-ra-black text-white py-2.5 hidden lg:block border-b border-white/10 relative z-[60]">
        <div class="container mx-auto px-6 flex justify-between items-center text-[10px] font-sans font-medium tracking-widest uppercase">
            <div class="flex items-center gap-3">
                <i class="ph ph-clock text-sm text-gray-400"></i>
                <span class="opacity-80 hover:opacity-100 transition-opacity">Jam Operasional: {{ $setting->open_hours ?? 'Hubungi Kami' }}</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ $setting->instagram ?? '#' }}" target="_blank" aria-label="Instagram" class="hover:text-gray-400 transition-colors transform hover:scale-110 duration-200"><i class="ph ph-instagram-logo text-base"></i></a>
                <a href="{{ $setting->tiktok ?? '#' }}" target="_blank" aria-label="TikTok" class="hover:text-gray-400 transition-colors transform hover:scale-110 duration-200"><i class="ph ph-tiktok-logo text-base"></i></a>
            </div>
            <div class="flex items-center gap-3">
                <i class="ph ph-map-pin text-sm text-gray-400"></i>
                <span class="opacity-80 hover:opacity-100 transition-opacity">Lokasi: Ponorogo, Jawa Timur</span>
            </div>
        </div>
    </div>

    <nav class="sticky top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300" id="main-navbar">
        <div class="container mx-auto px-6 h-20 flex justify-between items-center">
            
            <a href="{{ route('home') }}" class="relative block w-32 md:w-36 aspect-[2/1] transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('asset/logo.png') }}" alt="Rindu Alam Coffee Logo" class="absolute inset-0 w-full h-full object-contain">
            </a>

            <div class="hidden md:flex items-center gap-10 text-[11px] font-bold tracking-widest uppercase text-gray-500">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active text-ra-black' : 'hover:text-ra-black transition-colors' }}">Beranda</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active text-ra-black' : 'hover:text-ra-black transition-colors' }}">Cerita Kami</a>
                <a href="{{ route('menu') }}" class="nav-link {{ request()->routeIs('menu') ? 'active text-ra-black' : 'hover:text-ra-black transition-colors' }}">Menu</a>
                <a href="{{ route('visit') }}" class="nav-link {{ request()->routeIs('visit') ? 'active text-ra-black' : 'hover:text-ra-black transition-colors' }}">Visit</a>
            </div>

            <div class="hidden md:block">
                @if(!empty($setting->whatsapp))
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp) }}" target="_blank" class="bg-ra-black text-white px-7 py-3 text-[10px] font-bold tracking-widest uppercase hover:bg-gray-800 transition-all duration-300 rounded-sm shadow-md hover:shadow-lg flex items-center gap-2">
                    <i class="ph ph-whatsapp-logo text-base"></i> Hubungi Kami
                </a>
                @else
                <a href="{{ route('visit') }}" class="bg-ra-black text-white px-7 py-3 text-[10px] font-bold tracking-widest uppercase hover:bg-gray-800 transition-all duration-300 rounded-sm shadow-md hover:shadow-lg">
                    Hubungi Kami
                </a>
                @endif
            </div>

            <button class="md:hidden text-2xl focus:outline-none p-2" id="mobile-menu-btn" aria-label="Buka Menu">
                <i class="ph ph-list" id="menu-icon"></i>
            </button>
        </div>
        
        <div class="md:hidden fixed inset-0 bg-white z-40 transition-transform duration-500 transform translate-x-full h-screen pt-20 border-t border-gray-100" id="mobile-menu">
            <div class="flex flex-col p-10 gap-8 text-center text-3xl font-serif text-gray-800">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'italic font-medium' : 'hover:opacity-70 transition-opacity' }}">Beranda</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'italic font-medium' : 'hover:opacity-70 transition-opacity' }}">Cerita Kami</a>
                <a href="{{ route('menu') }}" class="{{ request()->routeIs('menu') ? 'italic font-medium' : 'hover:opacity-70 transition-opacity' }}">Menu</a>
                <a href="{{ route('visit') }}" class="{{ request()->routeIs('visit') ? 'italic font-medium' : 'hover:opacity-70 transition-opacity' }}">Visit</a>
            </div>
            @if(!empty($setting->whatsapp))
            <div class="px-10 mt-8">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp) }}" target="_blank" class="w-full bg-ra-black text-white px-6 py-4 text-xs font-bold tracking-widest uppercase rounded-sm flex items-center justify-center gap-2 shadow-lg">
                    <i class="ph ph-whatsapp-logo text-lg"></i> Hubungi Kami Melalui WhatsApp
                </a>
            </div>
            @endif
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white text-ra-black border-t border-gray-100 pt-16 pb-8 mt-auto">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left mb-16">
                
                <div class="space-y-4">
                    <div class="flex justify-center md:justify-start mb-6">
                        <img src="{{ asset('asset/logo.png') }}" alt="Rindu Alam" class="h-10 object-contain grayscale opacity-80">
                    </div>
                    <p class="text-sm text-gray-500 font-light leading-relaxed max-w-xs mx-auto md:mx-0">Menyajikan pengalaman kopi otentik dengan sentuhan alam yang menenangkan jiwa, tersembunyi di tepian Ponorogo.</p>
                </div>
                
                <div>
                    <h4 class="font-serif text-xl font-medium mb-6 relative inline-block">
                        Area Layanan
                        <span class="absolute -bottom-2 left-1/2 md:left-0 transform -translate-x-1/2 md:translate-x-0 w-1/2 h-px bg-gray-300"></span>
                    </h4>
                    <div class="space-y-5 text-sm text-gray-600 font-light">
                        <div>
                            <p class="font-bold uppercase tracking-widest text-[10px] text-ra-black mb-1.5 flex items-center justify-center md:justify-start gap-1">
                                <i class="ph ph-map-pin"></i> Pusat (Ngebel)
                            </p>
                            <p class="leading-relaxed">{{ $setting->address_central ?? 'Alamat pusat belum dikonfigurasi pada sistem.' }}</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase tracking-widest text-[10px] text-ra-black mb-1.5 flex items-center justify-center md:justify-start gap-1">
                                <i class="ph ph-storefront"></i> Cabang (Pusat Kota)
                            </p>
                            <p class="leading-relaxed">{{ $setting->address_branch ?? 'Alamat cabang belum dikonfigurasi pada sistem.' }}</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-serif text-xl font-medium mb-6 relative inline-block">
                        Jam & Kontak
                        <span class="absolute -bottom-2 left-1/2 md:left-0 transform -translate-x-1/2 md:translate-x-0 w-1/2 h-px bg-gray-300"></span>
                    </h4>
                    <div class="space-y-6">
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-1">Jam Oreasional</p>
                            <p class="text-lg font-serif">{{ $setting->open_hours ?? 'Jadwal belum tersedia' }}</p>
                        </div>
                        <div class="flex justify-center md:justify-start gap-3">
                            <a href="{{ $setting->instagram ?? '#' }}" target="_blank" aria-label="Instagram Rindu Alam" class="w-11 h-11 border border-gray-200 rounded-full flex items-center justify-center hover:bg-ra-black hover:text-white hover:border-ra-black transition-all duration-300 shadow-sm"><i class="ph ph-instagram-logo text-xl"></i></a>
                            <a href="{{ $setting->tiktok ?? '#' }}" target="_blank" aria-label="TikTok Rindu Alam" class="w-11 h-11 border border-gray-200 rounded-full flex items-center justify-center hover:bg-ra-black hover:text-white hover:border-ra-black transition-all duration-300 shadow-sm"><i class="ph ph-tiktok-logo text-xl"></i></a>
                            @if(!empty($setting->whatsapp))
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp) }}" target="_blank" aria-label="WhatsApp Rindu Alam" class="w-11 h-11 border border-gray-200 rounded-full flex items-center justify-center hover:bg-green-600 hover:text-white hover:border-green-600 transition-all duration-300 shadow-sm"><i class="ph ph-whatsapp-logo text-xl"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] uppercase tracking-widest font-bold text-gray-400">
                <p>&copy; {{ date('Y') }} Rindu Alam Coffee. Seluruh Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-2">
                    <span class="font-medium">Dikembangkan secara eksklusif oleh</span>
                    <span class="text-ra-black px-2.5 py-1 bg-gray-100 rounded-sm tracking-widest">TEAM WARAWIRI</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('main-navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled-nav');
            } else {
                navbar.classList.remove('scrolled-nav');
            }
        });

        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');
        let isMenuOpen = false;

        btn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                menu.classList.remove('translate-x-full');
                icon.classList.remove('ph-list');
                icon.classList.add('ph-x');
                document.body.style.overflow = 'hidden'; 
            } else {
                menu.classList.add('translate-x-full');
                icon.classList.remove('ph-x');
                icon.classList.add('ph-list');
                document.body.style.overflow = 'auto'; 
            }
        });
    </script>
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>