@extends('layouts.app')

@section('header', 'Halaman Beranda')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-zinc-200 pb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Manajemen Halaman</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">Beranda</h2>
            <p class="text-sm text-zinc-500 mt-2">Kelola teks intro (hero) dan tambah/kurangi berbagai seksi konten di halaman utama.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 border border-zinc-200 hover:border-zinc-900 px-4 py-2.5 transition-all duration-200 shrink-0">
            <i class="ph ph-arrow-square-out text-base"></i> Lihat Halaman
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-5 mb-8 text-sm flex gap-4 items-center">
            <i class="ph ph-check-circle text-2xl shrink-0"></i>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- 1. Bagian Hero --}}
    <form action="{{ route('pages.home.update') }}" method="POST" class="mb-12">
        @csrf
        @method('PUT')
        
        <div class="bg-white border border-zinc-200 shadow-sm">
            <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <i class="ph ph-monitor-play text-xl text-zinc-400"></i>
                    <div>
                        <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">Seksi Intro (Banner Video)</h3>
                        <p class="text-[10px] text-zinc-400 mt-0.5">Teks utama yang tampil di atas video latar.</p>
                    </div>
                </div>
                <button type="submit" class="text-xs font-bold uppercase tracking-widest bg-zinc-900 text-white px-4 py-2 hover:bg-zinc-700 transition">
                    Simpan Intro
                </button>
            </div>
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Judul Utama</label>
                    <textarea name="home_hero_title" rows="3" required
                        class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 text-sm font-mono"
                        placeholder="Wajah Baru...">{{ $setting->home_hero_title }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Sub-judul / Deskripsi</label>
                    <textarea name="home_hero_subtitle" rows="3" required
                        class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 text-sm"
                        placeholder="Hadir sebagai oase...">{{ $setting->home_hero_subtitle }}</textarea>
                </div>
            </div>
        </div>
    </form>

    {{-- 2. Daftar Seksi Dinamis --}}
    <div class="bg-white border border-zinc-200 shadow-sm mb-12">
        <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <i class="ph ph-stack text-xl text-zinc-400"></i>
                <div>
                    <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">Seksi Konten Dinamis</h3>
                    <p class="text-[10px] text-zinc-400 mt-0.5">Konten yang tampil secara berderet di bawah video.</p>
                </div>
            </div>
            <a href="{{ route('admin.pages.home-sections.create') }}" class="text-xs font-bold uppercase tracking-widest bg-zinc-900 text-white px-4 py-2 hover:bg-zinc-700 transition inline-flex items-center gap-2">
                <i class="ph ph-plus"></i> Tambah Seksi
            </a>
        </div>
        
        <div class="p-0">
            @if($sections->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse dataTable">
                        <thead>
                            <tr class="bg-zinc-50 border-b border-zinc-200 text-[10px] uppercase tracking-widest text-zinc-500">
                                <th class="p-4 font-bold w-16 text-center">Urutan</th>
                                <th class="p-4 font-bold">Judul Seksi</th>
                                <th class="p-4 font-bold text-center">Posisi Gambar</th>
                                <th class="p-4 font-bold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($sections as $sec)
                                <tr class="border-b border-zinc-100 hover:bg-zinc-50/50 transition-colors group">
                                    <td class="p-4 text-center font-mono text-zinc-500">{{ $sec->sort_order }}</td>
                                    <td class="p-4">
                                        <p class="font-bold text-zinc-900">{{ $sec->title }}</p>
                                        <p class="text-xs text-zinc-500">{{ Str::limit(strip_tags($sec->content), 60) }}</p>
                                    </td>
                                    <td class="p-4 text-center">
                                        @if($sec->image_position == 'left')
                                            <span class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-widest bg-zinc-100 text-zinc-600 px-2 py-1"><i class="ph ph-align-left"></i> Kiri</span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-widest bg-zinc-100 text-zinc-600 px-2 py-1"><i class="ph ph-align-right"></i> Kanan</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <a href="{{ route('admin.pages.home-sections.edit', $sec->id) }}" class="p-2 text-zinc-400 hover:text-zinc-900 transition-colors" title="Edit">
                                                <i class="ph ph-pencil-simple text-lg"></i>
                                            </a>
                                            <form action="{{ route('admin.pages.home-sections.destroy', $sec->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete p-2 text-red-400 hover:text-red-600 transition-colors" title="Hapus">
                                                    <i class="ph ph-trash text-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-12 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-zinc-100 mb-4">
                        <i class="ph ph-stack text-xl text-zinc-400"></i>
                    </div>
                    <h3 class="text-sm font-bold text-zinc-900 mb-1">Belum ada seksi konten</h3>
                    <p class="text-xs text-zinc-500 max-w-sm mx-auto mb-6">Tambahkan berbagai seksi seperti filosofi, cerita *roastery*, atau keunikan lainnya di halaman depan.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
