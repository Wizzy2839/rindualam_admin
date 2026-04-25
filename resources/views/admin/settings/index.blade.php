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
                <p class="font-bold uppercase tracking-widest text-[10px] mb-1">Notifikasi Sistem</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="group pb-24">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            {{-- Seksi 1: Integrasi Kontak --}}
            <div class="space-y-8">
                <div class="bg-white border border-zinc-200 shadow-sm h-full">
                    <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <i class="ph ph-address-book text-xl text-zinc-400"></i>
                        <div>
                            <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">1. Integrasi Kontak</h3>
                            <p class="text-[10px] text-zinc-400 mt-0.5">WhatsApp, Jam Operasional, & Media Sosial.</p>
                        </div>
                    </div>
                    <div class="p-8 space-y-6">
                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-zinc-500 mb-3 text-justify">Nomor WhatsApp <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="ph ph-whatsapp-logo text-zinc-400 text-lg"></i></div>
                                <input type="number" name="whatsapp" value="{{ $setting->whatsapp }}" required class="peer w-full pl-12 pr-10 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 invalid:border-red-500 invalid:ring-1 invalid:ring-red-500 valid:border-emerald-500 valid:ring-1 valid:ring-emerald-500 text-sm" placeholder="6281234567890">
                            </div>
                        </div>

                        @php
                            $jam = explode(' - ', $setting->open_hours);
                            $jamBuka = trim($jam[0] ?? '08:00');
                            $jamTutup = trim($jam[1] ?? '22:00');
                        @endphp
                        <div>
                            <label class="block text-xs font-bold tracking-widest uppercase text-zinc-500 mb-3">Jam Operasional <span class="text-red-500">*</span></label>
                            <div class="flex items-center gap-3">
                                <input type="time" name="open_time" value="{{ $jamBuka }}" required class="peer w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm font-medium">
                                <span class="text-zinc-400 font-bold">-</span>
                                <input type="time" name="close_time" value="{{ $jamTutup }}" required class="peer w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm font-medium">
                            </div>
                        </div>

                        <div class="pt-4 border-t border-zinc-100 flex flex-col gap-4">
                            <div>
                                <label class="block text-[10px] font-bold tracking-widest uppercase text-zinc-400 mb-2">Tautan Instagram</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="ph ph-instagram-logo text-zinc-400 text-lg"></i></div>
                                    <input type="url" name="instagram" value="{{ $setting->instagram }}" required class="peer w-full pl-12 pr-10 py-2.5 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-xs" placeholder="https://instagram.com/...">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold tracking-widest uppercase text-zinc-400 mb-2">Tautan TikTok</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="ph ph-tiktok-logo text-zinc-400 text-lg"></i></div>
                                    <input type="url" name="tiktok" value="{{ $setting->tiktok }}" required class="peer w-full pl-12 pr-10 py-2.5 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-xs" placeholder="https://tiktok.com/...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Seksi 2: Konfigurasi Footer --}}
            <div class="space-y-8">
                <div class="bg-white border border-zinc-200 shadow-sm h-full">
                    <div class="border-b border-zinc-200 px-8 py-5 bg-zinc-50/50 flex items-center gap-3">
                        <i class="ph ph-layout text-xl text-zinc-400"></i>
                        <div>
                            <h3 class="font-bold text-zinc-900 text-sm uppercase tracking-widest">2. Konfigurasi Footer</h3>
                            <p class="text-[10px] text-zinc-400 mt-0.5">Informasi & Kredit di bagian bawah situs.</p>
                        </div>
                    </div>
                    <div class="p-8 space-y-8">
                        <div>
                            <label class="block text-xs font-bold tracking-widest text-zinc-500 uppercase mb-3 text-justify">Deskripsi Singkat Footer <span class="text-red-500">*</span></label>
                            <textarea name="footer_description" rows="5" required class="peer w-full px-4 py-3 bg-zinc-50 border border-zinc-200 focus:bg-white focus:outline-none transition-colors duration-300 text-sm leading-relaxed" placeholder="Masukkan deskripsi footer...">{{ $setting->footer_description }}</textarea>
                            <div class="flex items-center gap-2 mt-2">
                                <i class="ph ph-info text-zinc-400"></i>
                                <span class="text-[10px] text-zinc-400 italic">Tampil pada kolom pertama footer situs web.</span>
                            </div>
                        </div>


                        
                        <div class="bg-amber-50 border border-amber-200 p-4 rounded-lg flex items-start gap-3 mt-4">
                            <i class="ph ph-lightbulb text-amber-500 text-xl shrink-0 mt-0.5"></i>
                            <p class="text-[11px] text-amber-800 leading-relaxed font-medium">
                                Untuk perubahan konten halaman (Hero, Alamat, Peta, dll), silakan gunakan menu <strong class="uppercase text-amber-900 border-b border-amber-900">Manajemen Halaman</strong> di sidebar untuk pengalaman yang lebih spesifik.
                            </p>
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
@endsection