@extends('layouts.app')

@section('header', 'Kategori Menu')

@section('content')
    <div class="mb-8">
        <a href="{{ route('menu-categories.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">
            <i class="ph ph-arrow-left text-base"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-6 mb-8 text-sm flex gap-4 items-start shadow-sm">
            <i class="ph ph-warning-circle text-2xl shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold uppercase tracking-widest text-[10px] mb-2">Ada yang belum benar</p>
                <ul class="list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="bg-white border border-zinc-200 shadow-sm overflow-hidden max-w-3xl">
        <div class="border-b border-zinc-200 px-8 py-6 flex justify-between items-center bg-zinc-50/50">
            <div>
                <h3 class="font-serif text-2xl text-zinc-900 tracking-tight">Tambah Kategori Baru</h3>
                <p class="text-xs text-zinc-500 mt-1">Buat kategori baru untuk mengelompokkan menu.</p>
            </div>
            <i class="ph ph-folders text-3xl text-zinc-300"></i>
        </div>

        <form action="{{ route('menu-categories.store') }}" method="POST" class="p-8 group">
            @csrf
            
            <div class="space-y-8 mb-10">
                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Nama Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-tag text-zinc-400 text-lg"></i>
                        </div>
                        <input type="text" name="name" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="Contoh: Signature Coffee, Non-Coffee">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-lg"></i>
                            <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-lg"></i>
                        </div>
                    </div>
                    <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Nama kategori wajib diisi.</p>
                </div>

                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Urutan Tampil <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-list-numbers text-zinc-400 text-lg"></i>
                        </div>
                        <input type="number" name="sort_order" value="0" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-lg"></i>
                            <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-lg"></i>
                        </div>
                    </div>
                    <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Urutan tampil wajib diisi dengan angka.</p>
                    
                    <div class="bg-zinc-50 border border-zinc-200 p-5 mt-4 flex items-start gap-4">
                        <i class="ph ph-info text-zinc-500 text-xl shrink-0"></i>
                        <p class="text-xs text-zinc-600 leading-relaxed">Angka kecil tampil duluan. Contoh: urutan 1 akan muncul paling atas di website.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-8 border-t border-zinc-200">
                <a href="{{ route('menu-categories.index') }}" class="px-6 py-3 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">Batal</a>
                <button type="submit" class="bg-zinc-900 text-white px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 flex items-center gap-2 shadow-md group-invalid:bg-zinc-300 group-invalid:text-zinc-500 group-invalid:cursor-not-allowed group-invalid:shadow-none">
                    Simpan <i class="ph ph-floppy-disk text-base"></i>
                </button>
            </div>
        </form>
    </div>
@endsection