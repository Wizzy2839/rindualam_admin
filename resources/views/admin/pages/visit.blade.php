@extends('layouts.app')

@section('header', 'Halaman Kunjungi Kami')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 border-b border-zinc-200 pb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-400 mb-2">Manajemen Halaman</p>
            <h2 class="text-3xl font-serif text-zinc-900 tracking-tight">Kunjungi Kami</h2>
            <p class="text-sm text-zinc-500 mt-2">Kelola alamat, peta, dan CTA kontak di halaman Visit.</p>
        </div>
        <a href="{{ route('visit') }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-900 border border-zinc-200 hover:border-zinc-900 px-4 py-2.5 transition-all duration-200 shrink-0">
            <i class="ph ph-arrow-square-out text-base"></i> Lihat Halaman
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-5 mb-8 text-sm flex gap-4 items-center">
            <i class="ph ph-check-circle text-2xl shrink-0"></i>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('pages.visit.update') }}" method="POST" class="pb-24">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- Kiri: Lokasi --}}
            <div class="lg:col-span-8 space-y-8">

                {{-- Lokasi Pusat --}}
                <div class="bg-white border border-zinc-200 shadow-sm">
                    <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <div class="w-8 h-8 bg-zinc-900 text-white flex items-center justify-center text-xs font-bold shrink-0">1</div>
                        <div>
                            <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">Lokasi Pusat — Ngebel Lake</h3>
                            <p class="text-[10px] text-zinc-400 mt-0.5">Alamat dan peta Google Maps untuk lokasi utama.</p>
                        </div>
                    </div>
                    <div class="p-8 space-y-6">
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Alamat Lengkap</label>
                            <textarea name="address_central" rows="2"
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors duration-200 text-sm"
                                placeholder="Jl. Ngebel, Kecamatan Ngebel, Ponorogo, Jawa Timur...">{{ $setting->address_central }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">
                                Kode Embed Google Maps (Iframe)
                            </label>
                            <textarea name="map_url_central" rows="3"
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors duration-200 text-xs font-mono"
                                placeholder='&lt;iframe src="https://www.google.com/maps/embed?pb=..." ...&gt;&lt;/iframe&gt; ← Paste kode lengkap dari Google Maps'>{{ $setting->map_url_central }}</textarea>
                            <p class="text-[10px] text-zinc-400 mt-1.5">
                                <i class="ph ph-info"></i> Pergi ke Google Maps → Bagikan → Sematkan peta → Salin kode &lt;iframe&gt;, lalu tempel di sini.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Lokasi Cabang --}}
                <div class="bg-white border border-zinc-200 shadow-sm">
                    <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <div class="w-8 h-8 bg-zinc-200 text-zinc-900 flex items-center justify-center text-xs font-bold shrink-0">2</div>
                        <div>
                            <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">Lokasi Cabang — City Hub</h3>
                            <p class="text-[10px] text-zinc-400 mt-0.5">Alamat dan peta Google Maps untuk cabang kota.</p>
                        </div>
                    </div>
                    <div class="p-8 space-y-6">
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Alamat Lengkap</label>
                            <textarea name="address_branch" rows="2"
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors duration-200 text-sm"
                                placeholder="Jl. Sudirman, Ponorogo, Jawa Timur...">{{ $setting->address_branch }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">
                                Kode Embed Google Maps (Iframe)
                            </label>
                            <textarea name="map_url_branch" rows="3"
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors duration-200 text-xs font-mono"
                                placeholder='&lt;iframe src="https://www.google.com/maps/embed?pb=..." ...&gt;&lt;/iframe&gt; ← Paste kode lengkap dari Google Maps'>{{ $setting->map_url_branch }}</textarea>
                            <p class="text-[10px] text-zinc-400 mt-1.5">
                                <i class="ph ph-info"></i> Salin kode &lt;iframe&gt; dari Google Maps untuk lokasi cabang.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Kanan: CTA & Info --}}
            <div class="lg:col-span-4 space-y-8">

                {{-- CTA Kontak --}}
                <div class="bg-white border border-zinc-200 shadow-sm">
                    <div class="border-b border-zinc-200 px-6 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <i class="ph ph-chat-teardrop-text text-xl text-zinc-400"></i>
                        <div>
                            <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">Seksi CTA Kontak</h3>
                            <p class="text-[10px] text-zinc-400 mt-0.5">Banner "Have a Question?" di paling bawah.</p>
                        </div>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Judul CTA</label>
                            <input type="text" name="visit_cta_title"
                                value="{{ $setting->visit_cta_title ?? 'Have a Question?' }}"
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors duration-200 text-sm"
                                placeholder="Have a Question?">
                        </div>
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-2">Sub-teks</label>
                            <textarea name="visit_cta_text" rows="4"
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none focus:border-zinc-900 transition-colors duration-200 text-sm"
                                placeholder="Kami siap menyambut Anda...">{{ $setting->visit_cta_text }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Info Panel --}}
                <div class="bg-zinc-900 text-white p-6">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400 mb-3">Tips Google Maps</p>
                    <ol class="space-y-3 text-xs text-zinc-300 font-light list-none">
                        <li class="flex gap-2 items-start">
                            <span class="bg-zinc-700 text-zinc-300 w-5 h-5 rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">1</span>
                            <span>Buka <strong class="text-white">Google Maps</strong> dan cari lokasi</span>
                        </li>
                        <li class="flex gap-2 items-start">
                            <span class="bg-zinc-700 text-zinc-300 w-5 h-5 rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">2</span>
                            <span>Klik tombol <strong class="text-white">Bagikan</strong></span>
                        </li>
                        <li class="flex gap-2 items-start">
                            <span class="bg-zinc-700 text-zinc-300 w-5 h-5 rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">3</span>
                            <span>Pilih tab <strong class="text-white">Sematkan peta</strong></span>
                        </li>
                        <li class="flex gap-2 items-start">
                            <span class="bg-zinc-700 text-zinc-300 w-5 h-5 rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">4</span>
                            <span>Salin seluruh kode <strong class="text-white">&lt;iframe&gt;</strong> dan tempel di field di atas</span>
                        </li>
                    </ol>
                </div>

                {{-- Jam Operasional Info --}}
                <div class="bg-zinc-50 border border-zinc-200 border-dashed p-5">
                    <div class="flex gap-3 items-start">
                        <i class="ph ph-clock text-zinc-400 text-xl shrink-0 mt-0.5"></i>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-zinc-500 mb-1">Jam Operasional</p>
                            <p class="text-xs text-zinc-500 leading-relaxed">
                                Jam operasional dikelola di
                                <a href="{{ route('settings.index') }}" class="text-zinc-900 font-bold underline">Pengaturan Global</a>.
                            </p>
                            <p class="text-[10px] font-bold text-zinc-700 mt-2 bg-white border border-zinc-200 px-3 py-1.5 inline-block">
                                {{ $setting->open_hours ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        {{-- Sticky Save Bar --}}
        <div class="fixed bottom-0 left-0 lg:left-72 right-0 bg-white/95 backdrop-blur-md border-t border-zinc-200 p-5 flex justify-between items-center z-30 shadow-[0_-4px_24px_rgba(0,0,0,0.04)]">
            <p class="text-[10px] text-zinc-400 font-bold uppercase tracking-widest">Halaman Kunjungi Kami · Rindu Alam Coffee</p>
            <button type="submit" class="bg-zinc-900 text-white px-10 py-3 text-xs font-bold uppercase tracking-widest hover:bg-zinc-700 transition-all duration-300 flex items-center gap-3 shadow-md">
                Simpan Perubahan <i class="ph ph-floppy-disk text-lg"></i>
            </button>
        </div>
    </form>
@endsection
