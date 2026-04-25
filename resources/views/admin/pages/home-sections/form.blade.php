@extends('layouts.app')

@section('header', $pageTitle)

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-zinc-200 pb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Manajemen Halaman Beranda</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">{{ $pageTitle }}</h2>
        </div>
        <a href="{{ route('pages.home') }}" class="text-zinc-500 hover:text-zinc-900 text-sm font-bold uppercase tracking-widest transition-colors">
            <i class="ph ph-arrow-left mr-2 mt-0.5"></i> Kembali
        </a>
    </div>

    <form action="{{ $actionRoute }}" method="POST" enctype="multipart/form-data" class="group pb-24 max-w-4xl">
        @csrf
        @if(isset($isEdit) && $isEdit)
            @method('PUT')
        @endif

        <div class="space-y-8">
            <div class="bg-white border border-zinc-200 shadow-sm p-8 space-y-6">
                
                {{-- Label & Title --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Label (Teks kecil di atas judul)</label>
                        <input type="text" name="label" value="{{ old('label', $section->label) }}"
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors text-sm"
                            placeholder="Contoh: Our Philosophy">
                    </div>
                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Judul Utama <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $section->title) }}" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors text-sm font-mono"
                            placeholder="Judul Seksi">
                    </div>
                </div>

                {{-- Content --}}
                <div>
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Isi Konten <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="6" required
                        class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors text-sm"
                        placeholder="<p>Masukkan paragraf di sini...</p>">{{ old('content', $section->content) }}</textarea>
                    <p class="text-[10px] text-zinc-400 mt-1.5">Mendukung format HTML dasar (p, strong, em, br).</p>
                </div>

                {{-- Sort Order & Image Position --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-zinc-100">
                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Posisi Gambar</label>
                        <select name="image_position" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:outline-none focus:border-zinc-900 text-sm">
                            <option value="right" {{ old('image_position', $section->image_position) == 'right' ? 'selected' : '' }}>Di Kanan (Teks Kiri)</option>
                            <option value="left" {{ old('image_position', $section->image_position) == 'left' ? 'selected' : '' }}>Di Kiri (Teks Kanan)</option>
                        </select>
                        <p class="text-[10px] text-zinc-400 mt-1.5">Gunakan posisi bergantian agar layout zig-zag meriah.</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Nomor Urut Tampil <span class="text-red-500">*</span></label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $section->sort_order ?? 0) }}" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:outline-none focus:border-zinc-900 text-sm">
                    </div>
                </div>

                {{-- Image Upload --}}
                <div class="pt-4 border-t border-zinc-100">
                    <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Foto Seksi</label>
                    <div class="relative w-full md:w-64 aspect-[4/3] border-2 border-dashed border-zinc-300 bg-zinc-50 hover:bg-zinc-100 transition-all flex justify-center items-center overflow-hidden group cursor-pointer">
                        <input type="file" name="image" id="imgInput" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                            onchange="previewImg(event, 'imgPreview', 'imgPlaceholder')">
                        
                        @if($section->image)
                            <img id="imgPreview" src="{{ asset('storage/' . $section->image) }}" class="absolute inset-0 w-full h-full object-cover z-10">
                            <div id="imgPlaceholder" class="text-center z-10 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity bg-white/80 w-full h-full flex flex-col justify-center items-center">
                                <i class="ph ph-arrows-clockwise text-3xl text-zinc-900 mb-1"></i>
                                <p class="text-xs font-bold tracking-widest uppercase px-2">Ganti Foto</p>
                            </div>
                        @else
                            <img id="imgPreview" src="#" class="absolute inset-0 w-full h-full object-cover hidden z-10">
                            <div id="imgPlaceholder" class="text-center z-10 pointer-events-none p-4 w-full h-full flex flex-col justify-center items-center">
                                <i class="ph ph-image-square text-4xl text-zinc-300 mb-2"></i>
                                <p class="text-xs font-bold tracking-widest text-zinc-400 uppercase">Unggah Foto</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        {{-- Save Bar --}}
        <div class="fixed bottom-0 left-0 lg:left-72 right-0 bg-white/95 backdrop-blur-md border-t border-zinc-200 p-5 flex justify-between items-center z-30 shadow-[0_-4px_24px_rgba(0,0,0,0.04)]">
            <p class="text-[10px] text-zinc-400 font-bold uppercase tracking-widest">Seksi Beranda · Rindu Alam</p>
            <button type="submit" class="bg-zinc-900 text-white px-10 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-700 transition-all flex items-center gap-3 shadow-md">
                Simpan <i class="ph ph-floppy-disk text-lg"></i>
            </button>
        </div>
    </form>

    <script>
        function previewImg(event, previewId, placeholderId) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                const placeholder = document.getElementById(placeholderId);
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('bg-white/80', 'w-full', 'h-full', 'flex', 'flex-col', 'justify-center', 'items-center', 'opacity-0', 'group-hover:opacity-100');
                placeholder.innerHTML = '<i class="ph ph-arrows-clockwise text-3xl text-zinc-900 mb-1"></i><p class="text-xs font-bold tracking-widest uppercase px-2">Ganti Foto</p>';
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
