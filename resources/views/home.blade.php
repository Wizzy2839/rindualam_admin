@extends('layouts.frontend')

@section('title', 'RINDU ALAM - Farm to Cup')

@section('content')
    <header class="relative h-[calc(100vh-40px)] min-h-[700px] bg-black overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <video autoplay muted loop playsinline class="w-full h-full object-cover opacity-70">
                <source src="https://videos.pexels.com/video-files/4782135/4782135-uhd_2560_1440_25fps.mp4" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>
        </div>

        <div class="relative z-20 container mx-auto px-6 h-full flex flex-col justify-center md:justify-end pb-32 text-white">
            <div class="max-w-4xl reveal-up">
                <h2 class="font-serif text-5xl md:text-7xl leading-tight mb-8 font-normal">
                    {!! $setting->home_hero_title ?? 'Wajah Baru di <br> <span class="italic font-light opacity-90">Tepian Telaga.</span>' !!}
                </h2>
                <div class="h-[1px] w-16 bg-white/50 mb-8"></div>
                <p class="text-sm md:text-lg font-light tracking-wide max-w-2xl text-white/90 leading-relaxed font-sans">
                    {!! $setting->home_hero_subtitle ?? 'Hadir sebagai oase elegan di tengah kesederhanaan Telaga Ngebel. Kami mendefinisikan ulang budaya kopi dengan memadukan lanskap alam yang memukau dan integritas proses <strong>Farm to Cup</strong>.' !!}
                </p>
            </div>
        </div>
    </header>

    <section class="py-28 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-20 items-start">
                <div class="w-full md:w-5/12 reveal-up">
                    <span class="text-[10px] font-bold tracking-widest text-gray-400 mb-6 block uppercase border-b border-gray-200 pb-4">Our Philosophy</span>
                    <h2 class="font-serif text-4xl md:text-5xl mb-8 leading-tight font-medium">
                        {!! $setting->home_philosophy_title ?? 'Menggubah Rasa, <br><span class="text-gray-500 italic">Menyempurnakan Cerita.</span>' !!}
                    </h2>
                    <div class="space-y-6 text-gray-700 font-light text-[15px] leading-relaxed text-justify font-sans">
                        {!! $setting->home_philosophy_content ?? '<p>Di tengah panorama Telaga Ngebel yang memikat hati, kami menangkap sebuah keheningan yang janggal. Sejauh mata memandang, lanskap kuliner hanya dihiasi oleh kedai tradisional, menyisakan ruang hampa bagi para pencari estetika rasa.</p>' !!}
                    </div>
                </div>
                <div class="w-full md:w-7/12 relative reveal-up delay-100">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-50">
                        @if($setting->home_philosophy_image)
                            <img src="{{ asset('storage/' . $setting->home_philosophy_image) }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-700 ease-in-out" alt="Coffee Process">
                        @else
                            <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-700 ease-in-out" alt="Coffee Process">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection