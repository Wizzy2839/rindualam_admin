@extends('layouts.app')

@section('header', 'Manajemen Tim')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-zinc-200 pb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Direktori Internal</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">Daftar Anggota Tim</h2>
            <p class="text-sm text-zinc-500 mt-2">Kelola profil dan jabatan staf yang akan ditampilkan di halaman website publik.</p>
        </div>
        
        <div>
            <a href="{{ route('team-members.create') }}" class="inline-flex items-center gap-2 bg-zinc-900 text-white px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300">
                <i class="ph ph-plus text-base"></i> Tambah Anggota
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-6 mb-10 text-sm flex gap-4 items-start">
            <i class="ph ph-check-circle text-2xl shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold uppercase tracking-widest text-[10px] mb-1">Berhasil</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($teams as $person)
        <div class="bg-white border border-zinc-200 p-8 text-center flex flex-col items-center hover:border-zinc-400 transition-colors duration-300 group">
            
            <div class="w-24 h-24 rounded-full overflow-hidden bg-zinc-50 mb-6 border border-zinc-200 group-hover:border-zinc-900 transition-colors duration-300 p-1 flex-shrink-0">
                <div class="w-full h-full rounded-full overflow-hidden bg-zinc-100 relative">
                    @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" class="absolute inset-0 w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ph ph-user text-3xl text-zinc-300"></i>
                        </div>
                    @endif
                </div>
            </div>
            
            <h3 class="font-bold text-base text-zinc-900 mb-1">{{ $person->name }}</h3>
            <p class="text-[10px] text-zinc-500 uppercase tracking-[0.15em] font-bold mb-8">{{ $person->role }}</p>
            
            <div class="w-full mt-auto flex gap-2">
                <a href="{{ route('team-members.edit', $person->id) }}" class="flex-1 py-2.5 bg-zinc-50 border border-zinc-200 text-zinc-700 text-[10px] font-bold uppercase tracking-widest hover:bg-zinc-900 hover:text-white hover:border-zinc-900 transition-colors duration-300 flex items-center justify-center gap-1.5">
                    <i class="ph ph-pencil-simple text-sm"></i> Edit
                </a>
                
                <form action="{{ route('team-members.destroy', $person->id) }}" method="POST" class="flex-1 flex" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data anggota tim ini?')">
                    @csrf @method('DELETE')
                    <button class="w-full py-2.5 bg-zinc-50 border border-zinc-200 text-red-600 text-[10px] font-bold uppercase tracking-widest hover:bg-red-50 hover:border-red-200 hover:text-red-700 transition-colors duration-300 flex items-center justify-center gap-1.5">
                        <i class="ph ph-trash text-sm"></i> Hapus
                    </button>
                </form>
            </div>
            
        </div>
        @empty
        <div class="col-span-full py-20 bg-zinc-50 border border-zinc-200 flex flex-col items-center justify-center text-center">
            <i class="ph ph-users-three text-5xl text-zinc-300 mb-4"></i>
            <h3 class="text-xl font-serif text-zinc-900 mb-2">Direktori Kosong</h3>
            <p class="text-sm text-zinc-500 max-w-sm leading-relaxed">Sistem belum memiliki data profil anggota tim. Silakan tambahkan data baru melalui tombol di kanan atas.</p>
        </div>
        @endforelse
    </div>
@endsection