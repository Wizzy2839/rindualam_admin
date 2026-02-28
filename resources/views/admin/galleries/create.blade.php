@extends('layouts.app')

@section('header', 'Foto Galeri')

@section('content')
    <div class="mb-8">
        <a href="{{ route('galleries.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">
            <i class="ph ph-arrow-left text-base"></i> Kembali
        </a>
    </div>

    <div class="bg-white border border-zinc-200 shadow-sm overflow-hidden">
        <div class="border-b border-zinc-200 px-8 py-6 bg-zinc-50/50">
            <h3 class="font-serif text-2xl text-zinc-900 tracking-tight">Upload Foto</h3>
            <p class="text-xs text-zinc-500 mt-1">Pilih satu atau beberapa foto sekaligus untuk ditampilkan di halaman galeri.</p>
        </div>

        <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-8 group">
            @csrf
            
            <div class="mb-8">
                <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-3">Pilih Foto <span class="text-red-500">*</span></label>
                
                <div class="relative border-2 border-dashed border-zinc-300 bg-zinc-50 hover:bg-zinc-100 hover:border-zinc-900 transition-colors duration-300 flex justify-center items-center overflow-hidden min-h-[280px]">
                    
                    <input type="file" name="images[]" id="imageInput" accept="image/*" class="peer absolute inset-0 w-full h-full opacity-0 cursor-pointer z-30" required multiple onchange="previewImages(event)">
                    
                    <div class="absolute inset-0 pointer-events-none border-2 transition-colors duration-300 peer-invalid:border-red-500 peer-valid:border-emerald-500"></div>

                    <div id="uploadPlaceholder" class="text-center z-10 pointer-events-none p-6">
                        <div class="w-16 h-16 bg-white border border-zinc-200 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <i class="ph ph-files text-2xl text-zinc-600"></i>
                        </div>
                        <p class="text-sm font-bold text-zinc-900">Klik atau Seret & Lepas foto di area ini</p>
                        <p class="text-xs text-zinc-500 mt-2 font-medium">Ukuran maksimal 2MB per foto. Format: JPG, PNG, WEBP.</p>
                    </div>

                    <div id="imagePreviewContainer" class="hidden absolute inset-0 w-full h-full bg-zinc-50 z-20 p-6 grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 overflow-y-auto content-start border-t border-zinc-200"></div>
                </div>
                
                <p class="mt-2 text-[10px] font-bold text-red-500 hidden group-invalid:block uppercase tracking-widest">Pilih setidaknya satu foto.</p>
                <p class="mt-2 text-[10px] font-bold text-emerald-600 hidden group-valid:block uppercase tracking-widest">Foto sudah dipilih.</p>

                @error('images') 
                    <p class="text-red-500 text-xs mt-2 font-bold"><i class="ph ph-warning-circle"></i> {{ $message }}</p> 
                @enderror
            </div>

            <div class="mb-8 bg-zinc-50 border border-zinc-200 p-6 flex flex-col gap-4">
                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Keterangan Foto (Opsional)</label>
                    <input type="text" name="caption" class="w-full border-zinc-200 bg-white focus:bg-white focus:border-zinc-900 focus:outline-none px-4 py-3 transition-colors duration-300 text-sm" placeholder="Tambahkan deskripsi atau keterangan foto...">
                </div>
                <div class="flex items-start gap-3">
                    <i class="ph ph-info text-zinc-500 text-lg shrink-0"></i>
                    <p class="text-xs text-zinc-600 leading-relaxed">Keterangan ini akan dipakai untuk semua foto yang diupload. Kalau mau keterangan berbeda, upload fotonya satu-satu.</p>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-8 border-t border-zinc-200">
                <a href="{{ route('galleries.index') }}" class="px-6 py-3 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 transition-colors duration-300">Batal</a>
                <button type="submit" class="bg-zinc-900 text-white px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-colors duration-300 flex items-center gap-2 group-invalid:bg-zinc-300 group-invalid:text-zinc-500 group-invalid:cursor-not-allowed">
                    Upload Semua Foto <i class="ph ph-cloud-arrow-up text-base"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImages(event) {
            const input = event.target;
            const container = document.getElementById('imagePreviewContainer');
            const placeholder = document.getElementById('uploadPlaceholder');
            
            container.innerHTML = ''; 
            
            if (input.files && input.files.length > 0) {
                container.classList.remove('hidden');
                placeholder.classList.add('hidden');
                
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        // Disesuaikan agar bingkai foto pratinjau tidak membulat
                        img.className = 'w-full h-24 md:h-32 object-cover border border-zinc-200 shadow-sm bg-white p-1';
                        container.appendChild(img);
                    }
                    
                    reader.readAsDataURL(file);
                });
            } else {
                container.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        }
    </script>
@endsection