@extends('layouts.app')

@section('header', 'Konfigurasi Sistem')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-zinc-200 pb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Pengaturan Global</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">Parameter Situs Web</h2>
            <p class="text-sm text-zinc-500 mt-2">Kelola informasi utama, jam operasional, kontak, dan tautan integrasi pada halaman publik.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-6 mb-10 text-sm flex gap-4 items-start">
            <i class="ph ph-check-circle text-2xl shrink-0 mt-0.5"></i>
            <div>
                <p class="font-bold uppercase tracking-widest text-[10px] mb-1">Status Operasi</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="group pb-24">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-8 space-y-8">
                
                <div class="bg-white border border-zinc-200 shadow-sm">
                    <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <i class="ph ph-browser text-xl text-zinc-400"></i>
                        <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">1. Konten Halaman Utama</h3>
                    </div>
                    <div class="p-8 space-y-6">
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Judul Utama (Gunakan &lt;br&gt; untuk baris baru) <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <textarea name="home_hero_title" rows="2" required class="peer w-full px-4 py-3 pr-10 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="Masukkan judul utama website...">{{ $setting->home_hero_title }}</textarea>
                                <div class="absolute top-3 right-0 pr-4 flex items-center pointer-events-none">
                                    <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-xl"></i>
                                    <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-xl"></i>
                                </div>
                            </div>
                            <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Kolom judul wajib diisi.</p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Sub-judul / Deskripsi Singkat <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <textarea name="home_hero_subtitle" rows="3" required class="peer w-full px-4 py-3 pr-10 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="Masukkan deskripsi singkat usaha...">{{ $setting->home_hero_subtitle }}</textarea>
                                <div class="absolute top-3 right-0 pr-4 flex items-center pointer-events-none">
                                    <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-xl"></i>
                                    <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-xl"></i>
                                </div>
                            </div>
                            <p class="mt-2 text-[10px] font-bold text-red-500 hidden peer-invalid:block uppercase tracking-widest">Peringatan: Kolom deskripsi wajib diisi.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-zinc-200 shadow-sm">
                    <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <i class="ph ph-leaf text-xl text-zinc-400"></i>
                        <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">2. Profil & Filosofi</h3>
                    </div>
                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Judul Profil <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <textarea name="home_philosophy_title" rows="2" required class="peer w-full px-4 py-3 pr-10 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500">{{ $setting->home_philosophy_title }}</textarea>
                                    <div class="absolute top-3 right-0 pr-4 flex items-center pointer-events-none">
                                        <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-xl"></i>
                                        <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Isi Konten (Paragraf) <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <textarea name="home_philosophy_content" rows="6" required class="peer w-full px-4 py-3 pr-10 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500">{{ $setting->home_philosophy_content }}</textarea>
                                    <div class="absolute top-3 right-0 pr-4 flex items-center pointer-events-none">
                                        <i class="ph ph-warning-circle text-red-500 hidden peer-invalid:block text-xl"></i>
                                        <i class="ph ph-check-circle text-emerald-500 hidden peer-valid:block text-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Gambar Ilustrasi <span class="text-red-500">*</span></label>
                            <div class="relative w-full h-full min-h-[250px] border-2 border-dashed border-zinc-300 bg-zinc-50 hover:bg-zinc-100 hover:border-zinc-900 transition-colors duration-300 flex justify-center items-center overflow-hidden group shadow-inner">
                                <input type="file" name="home_philosophy_image" id="imageInput" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewImage(event)" {{ $setting->home_philosophy_image ? '' : 'required' }}>
                                
                                @if($setting->home_philosophy_image)
                                    <img id="imagePreview" src="{{ asset('storage/' . $setting->home_philosophy_image) }}" class="absolute inset-0 w-full h-full object-cover z-10 group-hover:opacity-40 transition-opacity">
                                    <div id="uploadPlaceholder" class="text-center z-10 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity drop-shadow-md">
                                        <i class="ph ph-arrows-clockwise text-4xl text-zinc-900 mb-2"></i>
                                        <p class="text-xs text-zinc-900 font-bold tracking-widest uppercase bg-white/80 px-3 py-1 rounded">Perbarui Foto</p>
                                    </div>
                                @else
                                    <img id="imagePreview" src="#" class="absolute inset-0 w-full h-full object-cover hidden z-10">
                                    <div id="uploadPlaceholder" class="text-center z-10 pointer-events-none p-4">
                                        <i class="ph ph-image-square text-4xl text-zinc-400 mb-2"></i>
                                        <p class="text-xs font-bold tracking-widest text-zinc-500 uppercase mb-1">Unggah Baru</p>
                                        <p class="text-[10px] text-zinc-400">Maks 2MB (Rasio 4:3)</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-4 space-y-8">
                
                <div class="bg-white border border-zinc-200 shadow-sm">
                    <div class="border-b border-zinc-200 px-6 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <i class="ph ph-address-book text-xl text-zinc-400"></i>
                        <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">3. Integrasi Kontak</h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-zinc-500 mb-2">Nomor WhatsApp <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="ph ph-whatsapp-logo text-zinc-400 text-lg"></i></div>
                                <input type="number" name="whatsapp" value="{{ $setting->whatsapp }}" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="6281234567890">
                            </div>
                        </div>

                        @php
                            $jam = explode(' - ', $setting->open_hours);
                            $jamBuka = trim($jam[0] ?? '08:00');
                            $jamTutup = trim($jam[1] ?? '22:00');
                        @endphp
                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-zinc-500 mb-2">Jam Operasional <span class="text-red-500">*</span></label>
                            <div class="flex items-center gap-3">
                                <input type="time" name="open_time" value="{{ $jamBuka }}" required class="peer w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300">
                                <span class="text-zinc-400 font-bold">-</span>
                                <input type="time" name="close_time" value="{{ $jamTutup }}" required class="peer w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-zinc-500 mb-2">Tautan Instagram <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="ph ph-instagram-logo text-zinc-400 text-lg"></i></div>
                                <input type="url" name="instagram" value="{{ $setting->instagram }}" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="https://instagram.com/...">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-zinc-500 mb-2">Tautan TikTok <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="ph ph-tiktok-logo text-zinc-400 text-lg"></i></div>
                                <input type="url" name="tiktok" value="{{ $setting->tiktok }}" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500" placeholder="https://tiktok.com/...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-zinc-200 shadow-sm">
                    <div class="border-b border-zinc-200 px-6 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <i class="ph ph-map-pin text-xl text-zinc-400"></i>
                        <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">4. Alamat Cabang</h3>
                    </div>
                    <div class="p-6 space-y-8">
                        
                        <div class="space-y-4">
                            <h4 class="font-bold text-xs uppercase tracking-widest mb-4 border-b border-zinc-200 pb-2 text-zinc-900">Pusat Operasional</h4>
                            <div>
                                <label class="block text-[10px] font-bold tracking-widest uppercase text-zinc-500 mb-2">Alamat Lengkap</label>
                                <textarea name="address_central" rows="2" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm">{{ $setting->address_central }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold tracking-widest uppercase text-zinc-500 mb-2">Kode Semat Peta (Iframe)</label>
                                <input type="text" name="map_url_central" value="{{ $setting->map_url_central }}" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm font-mono text-xs">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h4 class="font-bold text-xs uppercase tracking-widest mb-4 border-b border-zinc-200 pb-2 text-zinc-900">Fasilitas Cabang</h4>
                            <div>
                                <label class="block text-[10px] font-bold tracking-widest uppercase text-zinc-500 mb-2">Alamat Lengkap</label>
                                <textarea name="address_branch" rows="2" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm">{{ $setting->address_branch }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold tracking-widest uppercase text-zinc-500 mb-2">Kode Semat Peta (Iframe)</label>
                                <input type="text" name="map_url_branch" value="{{ $setting->map_url_branch }}" required class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm font-mono text-xs">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="fixed bottom-0 left-0 lg:left-72 right-0 bg-white/90 backdrop-blur-md border-t border-zinc-200 p-6 flex justify-between items-center z-30 shadow-[0_-4px_24px_rgba(0,0,0,0.02)]">
            <p class="text-[10px] text-red-500 font-bold uppercase tracking-widest hidden group-invalid:block">⚠ Mohon lengkapi seluruh formulir yang disorot merah.</p>
            <p class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest block group-invalid:hidden">Semua field telah terisi dengan benar.</p>
            
            <button type="submit" class="bg-zinc-900 text-white px-10 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-800 transition-all duration-300 flex items-center gap-3 shadow-md group-invalid:bg-zinc-300 group-invalid:text-zinc-500 group-invalid:cursor-not-allowed group-invalid:shadow-none">
                Simpan Konfigurasi <i class="ph ph-floppy-disk text-lg"></i>
            </button>
        </div>
    </form>

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
                    placeholder.innerHTML = '<i class="ph ph-arrows-clockwise text-4xl text-zinc-900 mb-2"></i><p class="text-xs text-zinc-900 font-bold tracking-widest uppercase bg-white/80 px-3 py-1 rounded">Perbarui Foto</p>';
                    placeholder.classList.add('opacity-0', 'group-hover:opacity-100', 'drop-shadow-md');
                    preview.classList.add('group-hover:opacity-40', 'transition-opacity');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection