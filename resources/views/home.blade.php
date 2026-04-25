@extends('layouts.frontend')

@section('title', 'RINDU ALAM - Farm to Cup')

@section('content')
    <header class="relative h-[calc(100vh-64px)] lg:h-[calc(100vh-100px)] min-h-[600px] bg-black overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <video autoplay muted loop playsinline class="w-full h-full object-cover opacity-70">
                <source src="{{ asset('asset/video/teaser.webm') }}" type="video/webm">
            </video>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>
        </div>

        <div class="relative z-20 container mx-auto px-6 h-full flex flex-col justify-center md:justify-end pb-32 text-white">
            <div class="max-w-4xl reveal-up">
                <h2 class="font-serif text-4xl md:text-7xl leading-tight mb-8 font-normal">
                    {!! $setting->home_hero_title ?? 'Wajah Baru di <br> <span class="italic font-light opacity-90">Tepian Telaga.</span>' !!}
                </h2>
                <div class="h-[1px] w-16 bg-white/50 mb-8"></div>
                <p class="text-sm md:text-lg font-light tracking-wide max-w-2xl text-white/90 leading-relaxed font-sans">
                    {!! $setting->home_hero_subtitle ?? 'Hadir sebagai oase elegan di tengah kesederhanaan Telaga Ngebel.' !!}
                </p>
            </div>
        </div>
    </header>

    <div class="bg-white">
        @forelse($homeSections as $index => $sec)
            <section class="py-28 {{ $index % 2 == 1 ? 'bg-zinc-50' : 'bg-white' }}">
                <div class="container mx-auto px-6">
                    <div class="flex flex-col md:flex-row gap-20 items-start {{ $sec->image_position == 'left' ? 'md:flex-row-reverse' : '' }}">
                        <div class="w-full md:w-5/12 reveal-up">
                            @if($sec->label)
                                <span class="text-[10px] font-bold tracking-widest text-gray-400 mb-6 block uppercase border-b border-gray-200 pb-4">{{ $sec->label }}</span>
                            @endif
                            <h2 class="font-serif text-4xl md:text-5xl mb-8 leading-tight font-medium">
                                {!! $sec->title !!}
                            </h2>
                            <div class="space-y-6 text-gray-700 font-light text-[15px] leading-relaxed text-justify font-sans">
                                {!! $sec->content !!}
                            </div>
                        </div>
                        <div class="w-full md:w-7/12 relative reveal-up delay-100">
                            <div class="aspect-[4/3] overflow-hidden bg-gray-50">
                                @if($sec->image)
                                    <img src="{{ asset('storage/' . $sec->image) }}" loading="lazy" class="w-full h-full object-cover grayscale-0 md:grayscale md:hover:grayscale-0 transition duration-700 ease-in-out" alt="{{ strip_tags($sec->title) }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?q=80&w=1000&auto=format&fit=crop" loading="lazy" class="w-full h-full object-cover grayscale-0 md:grayscale md:hover:grayscale-0 transition duration-700 ease-in-out" alt="Placeholder">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @empty
            <section class="py-28 bg-white text-center">
                <p class="text-zinc-400 font-mono text-sm">Belum ada seksi konten beranda. Tambahkan via admin panel.</p>
            </section>
        @endforelse
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.querySelector('video');
        if (video) {
            let isFreezing = false;
            video.addEventListener('timeupdate', function() {
                if (this.currentTime >= 13 && !isFreezing) {
                    isFreezing = true;
                    this.pause();
                    
                    setTimeout(() => {
                        this.currentTime = 0;
                        this.play();
                        isFreezing = false;
                    }, 1000); // 1 second freeze
                }
            });
        }
    });
</script>
@endpush