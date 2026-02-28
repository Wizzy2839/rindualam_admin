@extends('layouts.app')

@section('header', 'Daftar Menu')

@section('content')
    <div class="mb-8">
        <a href="{{ route('menu-items.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">
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

    <div class="bg-white border border-zinc-200 shadow-sm overflow-hidden">
        <div class="border-b border-zinc-200 px-8 py-6 flex justify-between items-center bg-zinc-50/50">
            <div>
                <h3 class="font-serif text-2xl text-zinc-900 tracking-tight">Tambah Menu Baru</h3>
                <p class="text-xs text-zinc-500 mt-1">Isi form di bawah untuk menambahkan menu baru.</p>
            </div>
            <i class="ph ph-coffee text-3xl text-zinc-300"></i>
        </div>

        <form action="{{ route('menu-items.store') }}" method="POST" class="p-8 group">
            @csrf
            
            <div class="space-y-8 max-w-2xl mb-8">
                
                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Nama Menu <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-text-t text-zinc-400 text-lg"></i>
                        </div>
                        <input type="text" name="name" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="Contoh: Kopi Susu Kelana">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-lg"></i>
                            <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-lg"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-tag text-zinc-400 text-lg"></i>
                        </div>
                        <select name="menu_category_id" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 appearance-none invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500 text-sm">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="ph ph-caret-down text-zinc-400 peer-invalid:hidden peer-valid:hidden"></i>
                            <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-lg"></i>
                            <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-lg"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Harga <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-zinc-500 font-bold text-sm">Rp</span>
                        </div>
                        <input type="number" name="price" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="Contoh: 25000">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-lg"></i>
                            <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-lg"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Deskripsi (Opsional)</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm" placeholder="Jelaskan menu ini..."></textarea>
                </div>

                <div class="border border-zinc-200 p-6 bg-zinc-50/50 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-zinc-900">Tersedia untuk dijual?</p>
                        <p class="text-xs text-zinc-500 mt-1">Matikan jika menu sedang habis.</p>
                    </div>
                    
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_available" value="1" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-zinc-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-zinc-900"></div>
                    </label>
                </div>

            </div>

            <div class="flex items-center justify-end gap-4 pt-8 border-t border-zinc-200 mt-4">
                <a href="{{ route('menu-items.index') }}" class="px-6 py-3 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">Batal</a>
                <button type="submit" class="bg-zinc-900 text-white px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 flex items-center gap-2 shadow-md group-invalid:bg-zinc-300 group-invalid:text-zinc-500 group-invalid:cursor-not-allowed group-invalid:shadow-none">
                    Simpan <i class="ph ph-floppy-disk text-base"></i>
                </button>
            </div>
        </form>
    </div>
@endsection