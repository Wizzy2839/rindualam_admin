@extends('layouts.app')

@section('header', 'Foto Galeri')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-zinc-200 pb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Kelola Website</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">Foto Galeri</h2>
            <p class="text-sm text-zinc-500 mt-2">Kelola foto-foto yang ditampilkan di halaman galeri website.</p>
        </div>
        
        <div>
            <a href="{{ route('galleries.create') }}" class="inline-flex items-center gap-2 bg-zinc-900 text-white px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 shadow-sm">
                <i class="ph ph-upload-simple text-base"></i> Upload Foto
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-6 mb-10 text-sm flex gap-4 items-start shadow-sm">
            <i class="ph ph-check-circle text-2xl shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold uppercase tracking-widest text-[10px] mb-1">Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $photo)
        <div class="bg-white border border-zinc-200 shadow-sm group hover:border-zinc-400 transition-colors duration-300 flex flex-col relative overflow-hidden">
            
            <div class="aspect-square bg-zinc-100 relative overflow-hidden">
                <img src="{{ asset('storage/' . $photo->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                
                <div class="absolute inset-0 bg-zinc-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm z-10">
                    <form action="{{ route('galleries.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aset visual ini secara permanen dari sistem?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-white text-red-600 px-5 py-3 text-[10px] font-bold uppercase tracking-widest hover:bg-red-50 hover:text-red-700 transition transform scale-90 group-hover:scale-100 duration-300 shadow-xl flex items-center gap-2">
                            <i class="ph ph-trash text-sm"></i> Hapus Foto
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="p-4 border-t border-zinc-200 bg-white relative z-20">
                <p class="text-xs text-zinc-600 truncate font-medium" title="{{ $photo->caption ?? 'Tanpa Keterangan' }}">
                    {{ $photo->caption ?? 'Tanpa Keterangan' }}
                </p>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 bg-zinc-50 border border-zinc-200 flex flex-col items-center justify-center text-center shadow-sm">
            <i class="ph ph-images text-5xl text-zinc-300 mb-4"></i>
            <h3 class="text-xl font-serif text-zinc-900 mb-2">Belum Ada Foto</h3>
            <p class="text-sm text-zinc-500 max-w-sm leading-relaxed">Klik tombol <strong>Upload Foto</strong> di atas untuk menambahkan foto ke galeri.</p>
        </div>
        @endforelse
    </div>
@endsection