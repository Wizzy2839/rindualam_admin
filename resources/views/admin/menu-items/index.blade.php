@extends('layouts.app')

@section('header', 'Katalog Inventaris')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-zinc-200 pb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Pangkalan Data</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">Daftar Item Menu</h2>
            <p class="text-sm text-zinc-500 mt-2">Kelola produk, klasifikasi, harga jual, dan status ketersediaan pada sistem.</p>
        </div>
        
        <div>
            <a href="{{ route('menu-items.create') }}" class="inline-flex items-center gap-2 bg-zinc-900 text-white px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 shadow-sm">
                <i class="ph ph-plus text-base"></i> Tambah Produk
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-6 mb-10 text-sm flex gap-4 items-start shadow-sm">
            <i class="ph ph-check-circle text-2xl shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold uppercase tracking-widest text-[10px] mb-1">Status Operasi</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="bg-white border border-zinc-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm min-w-max">
                <thead class="bg-zinc-50 border-b border-zinc-200 text-[10px] uppercase font-bold text-zinc-500 tracking-[0.15em]">
                    <tr>
                        <th class="px-8 py-5">Informasi Produk</th>
                        <th class="px-6 py-5">Klasifikasi</th>
                        <th class="px-6 py-5">Harga Jual</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse($items as $item)
                    <tr class="hover:bg-zinc-50 transition-colors duration-200 group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 border border-zinc-200 bg-zinc-50 p-1 flex-shrink-0">
                                    <div class="w-full h-full bg-zinc-100 relative overflow-hidden">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="absolute inset-0 w-full h-full object-cover">
                                        @else
                                            <div class="absolute inset-0 flex items-center justify-center text-zinc-300">
                                                <i class="ph ph-coffee text-2xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <p class="font-bold text-zinc-900 text-base mb-1">{{ $item->name }}</p>
                                    <p class="text-[10px] text-zinc-500 uppercase tracking-widest font-medium">
                                        {{ $item->description ? Str::limit($item->description, 40) : 'TIDAK ADA DESKRIPSI' }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-zinc-100 text-zinc-600 border border-zinc-200 px-3 py-1 text-[10px] font-bold uppercase tracking-widest">
                                {{ $item->menuCategory->name ?? 'TANPA KATEGORI' }}
                            </span>
                        </td>
                        <td class="px-6 py-5 font-serif font-bold text-zinc-900 text-lg">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-5">
                            @if($item->is_available)
                                <div class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 px-3 py-1.5 text-[10px] font-bold uppercase tracking-widest">
                                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_5px_rgba(16,185,129,0.5)]"></div>
                                    Tersedia
                                </div>
                            @else
                                <div class="inline-flex items-center gap-2 bg-red-50 border border-red-200 text-red-700 px-3 py-1.5 text-[10px] font-bold uppercase tracking-widest">
                                    <div class="w-1.5 h-1.5 rounded-full bg-red-500 shadow-[0_0_5px_rgba(239,68,68,0.5)]"></div>
                                    Sold Out
                                </div>
                            @endif
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center justify-end gap-2 opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">
                                
                                <a href="{{ route('menu-items.edit', $item->id) }}" class="w-8 h-8 flex items-center justify-center bg-white border border-zinc-200 text-zinc-600 hover:text-zinc-900 hover:border-zinc-900 transition-colors shadow-sm" title="Edit Data">
                                    <i class="ph ph-pencil-simple text-base"></i>
                                </a>

                                <form action="{{ route('menu-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item menu ini dari katalog secara permanen?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-8 h-8 flex items-center justify-center bg-white border border-zinc-200 text-red-600 hover:bg-red-50 hover:border-red-300 hover:text-red-700 transition-colors shadow-sm" title="Hapus Data">
                                        <i class="ph ph-trash text-base"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center bg-zinc-50/50">
                            <div class="flex flex-col items-center justify-center">
                                <i class="ph ph-list-magnifying-glass text-5xl text-zinc-300 mb-4"></i>
                                <h3 class="font-serif text-xl text-zinc-900 mb-2">Katalog Kosong</h3>
                                <p class="text-xs text-zinc-500 max-w-sm leading-relaxed">Sistem belum memiliki data produk. Silakan tambahkan produk baru untuk menampilkannya pada halaman publik.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection