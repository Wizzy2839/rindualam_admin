@extends('layouts.app')

@section('header', 'Katalog Inventaris')

@section('content')
    <div class="mb-8">
        <a href="{{ route('menu-items.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">
            <i class="ph ph-arrow-left text-base"></i> Kembali ke Direktori
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-6 mb-8 text-sm flex gap-4 items-start shadow-sm">
            <i class="ph ph-warning-circle text-2xl shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold uppercase tracking-widest text-[10px] mb-2">Kesalahan Validasi</p>
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
                <h3 class="font-serif text-2xl text-zinc-900 tracking-tight">Registrasi Produk Baru</h3>
                <p class="text-xs text-zinc-500 mt-1">Lengkapi formulir di bawah ini untuk menambahkan produk ke dalam katalog pangkalan data.</p>
            </div>
            <i class="ph ph-coffee text-3xl text-zinc-300"></i>
        </div>

        <form action="{{ route('menu-items.store') }}" method="POST" enctype="multipart/form-data" class="p-8 group">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-8">
                
                <div class="space-y-8">
                    
                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Nama Produk <span class="text-red-500">*</span></label>
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
                        <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Nama produk wajib diisi.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Kategori <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-tag text-zinc-400 text-lg"></i>
                            </div>
                            <select name="menu_category_id" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 appearance-none invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500 text-sm">
                                <option value="">-- Pilih Klasifikasi --</option>
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
                        <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Silakan pilih kategori produk.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Harga Jual <span class="text-red-500">*</span></label>
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
                        <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Harga jual wajib diisi (angka).</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Deskripsi Produk (Opsional)</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm" placeholder="Jelaskan komposisi atau detail produk di sini..."></textarea>
                    </div>
                </div>

                <div class="space-y-8">
                    
                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Foto Representasi Produk</label>
                        
                        <div class="relative border-2 border-dashed border-zinc-300 bg-zinc-50 hover:bg-zinc-100 hover:border-zinc-900 transition-colors duration-300 flex justify-center items-center overflow-hidden h-[260px] shadow-inner group/upload">
                            
                            <input type="file" name="image" id="imageInput" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewImage(event)">
                            
                            <div id="uploadPlaceholder" class="text-center z-10 pointer-events-none p-6">
                                <div class="w-16 h-16 bg-white border border-zinc-200 rounded-full flex items-center justify-center mx-auto mb-4 group-hover/upload:scale-110 transition-transform duration-300">
                                    <i class="ph ph-camera-plus text-2xl text-zinc-600"></i>
                                </div>
                                <p class="text-sm font-bold text-zinc-900">Unggah Gambar</p>
                                <p class="text-xs text-zinc-500 mt-2">Maks. 2MB. Format: JPG/PNG/WEBP.</p>
                            </div>

                            <img id="imagePreview" src="#" alt="Pratinjau" class="absolute inset-0 w-full h-full object-cover hidden z-10">
                        </div>
                    </div>

                    <div class="border border-zinc-200 p-6 bg-zinc-50/50 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-zinc-900">Status Ketersediaan</p>
                            <p class="text-xs text-zinc-500 mt-1">Nonaktifkan jika produk sedang kosong (Sold Out).</p>
                        </div>
                        
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_available" value="1" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-zinc-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-zinc-900"></div>
                        </label>
                    </div>

                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-8 border-t border-zinc-200 mt-4">
                <a href="{{ route('menu-items.index') }}" class="px-6 py-3 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">Batal</a>
                <button type="submit" class="bg-zinc-900 text-white px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 flex items-center gap-2 shadow-md group-invalid:bg-zinc-300 group-invalid:text-zinc-500 group-invalid:cursor-not-allowed group-invalid:shadow-none">
                    Simpan Data <i class="ph ph-floppy-disk text-base"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('uploadPlaceholder');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        }
    </script>
@endsection