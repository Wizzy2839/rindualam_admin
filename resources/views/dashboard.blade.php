@extends('layouts.app')

@section('header', 'Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Beranda</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">
                Halo, {{ Auth::user()->name }}! 👋
            </h2>
            <p class="text-sm text-zinc-500 mt-2">
                Ini ringkasan data website Rindu Alam Coffee saat ini.
            </p>
        </div>
        
        <div>
            <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 bg-zinc-900 text-white px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300">
                Lihat Website <i class="ph ph-arrow-right text-sm"></i>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        
        <div class="bg-white p-8 border border-zinc-200 hover:border-zinc-400 transition-colors duration-300 flex flex-col justify-between h-40">
            <div class="flex justify-between items-start">
                <p class="text-xs font-bold tracking-widest text-zinc-500 uppercase">Total Menu</p>
                <i class="ph ph-coffee text-xl text-zinc-400"></i>
            </div>
            <div>
                <h3 class="text-4xl font-serif text-zinc-900">{{ $stats['menu'] }}</h3>
            </div>
        </div>

        <div class="bg-white p-8 border border-zinc-200 hover:border-zinc-400 transition-colors duration-300 flex flex-col justify-between h-40">
            <div class="flex justify-between items-start">
                <p class="text-xs font-bold tracking-widest text-zinc-500 uppercase">Kategori</p>
                <i class="ph ph-folders text-xl text-zinc-400"></i>
            </div>
            <div>
                <h3 class="text-4xl font-serif text-zinc-900">{{ $stats['kategori'] }}</h3>
            </div>
        </div>

        <div class="bg-white p-8 border border-zinc-200 hover:border-zinc-400 transition-colors duration-300 flex flex-col justify-between h-40">
            <div class="flex justify-between items-start">
                <p class="text-xs font-bold tracking-widest text-zinc-500 uppercase">Foto Galeri</p>
                <i class="ph ph-aperture text-xl text-zinc-400"></i>
            </div>
            <div>
                <h3 class="text-4xl font-serif text-zinc-900">{{ $stats['gallery'] }}</h3>
            </div>
        </div>

        <div class="bg-white p-8 border border-zinc-200 hover:border-zinc-400 transition-colors duration-300 flex flex-col justify-between h-40">
            <div class="flex justify-between items-start">
                <p class="text-xs font-bold tracking-widest text-zinc-500 uppercase">Anggota Tim</p>
                <i class="ph ph-identification-card text-xl text-zinc-400"></i>
            </div>
            <div>
                <h3 class="text-4xl font-serif text-zinc-900">{{ $stats['team'] }}</h3>
            </div>
        </div>

    </div>

    <div>
        <div class="mb-6 border-b border-zinc-200 pb-4">
            <h3 class="font-serif text-xl text-zinc-900">Akses Cepat</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <a href="{{ route('menu-items.create') }}" class="group bg-zinc-50 p-8 border border-zinc-100 hover:bg-white hover:border-zinc-300 transition-all duration-300">
                <div class="w-10 h-10 bg-white border border-zinc-200 rounded-full flex items-center justify-center mb-6 group-hover:bg-zinc-900 group-hover:text-white transition-colors duration-300">
                    <i class="ph ph-plus text-lg"></i>
                </div>
                <h4 class="font-bold text-zinc-900 text-sm mb-2">Tambah Menu Baru</h4>
                <p class="text-xs text-zinc-500 leading-relaxed">Tambahkan minuman atau makanan baru ke daftar menu.</p>
            </a>

            <a href="{{ route('galleries.create') }}" class="group bg-zinc-50 p-8 border border-zinc-100 hover:bg-white hover:border-zinc-300 transition-all duration-300">
                <div class="w-10 h-10 bg-white border border-zinc-200 rounded-full flex items-center justify-center mb-6 group-hover:bg-zinc-900 group-hover:text-white transition-colors duration-300">
                    <i class="ph ph-upload-simple text-lg"></i>
                </div>
                <h4 class="font-bold text-zinc-900 text-sm mb-2">Upload Foto Galeri</h4>
                <p class="text-xs text-zinc-500 leading-relaxed">Tambahkan foto-foto terbaru untuk ditampilkan di halaman galeri.</p>
            </a>

            <a href="{{ route('settings.index') }}" class="group bg-zinc-50 p-8 border border-zinc-100 hover:bg-white hover:border-zinc-300 transition-all duration-300">
                <div class="w-10 h-10 bg-white border border-zinc-200 rounded-full flex items-center justify-center mb-6 group-hover:bg-zinc-900 group-hover:text-white transition-colors duration-300">
                    <i class="ph ph-sliders-horizontal text-lg"></i>
                </div>
                <h4 class="font-bold text-zinc-900 text-sm mb-2">Pengaturan Website</h4>
                <p class="text-xs text-zinc-500 leading-relaxed">Ubah jam buka, nomor WhatsApp, sosial media, dan alamat toko.</p>
            </a>

        </div>
    </div>
@endsection