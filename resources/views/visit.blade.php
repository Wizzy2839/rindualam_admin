@extends('layouts.frontend')

@section('title', 'VISIT US - Rindu Alam Coffee')

@section('content')
    <header class="relative pt-40 pb-20 bg-white text-center">
        <div class="container mx-auto px-6 reveal-up">
            <p class="text-[10px] font-bold tracking-widest uppercase mb-4 text-gray-400">Find Us</p>
            <h1 class="font-serif text-5xl md:text-7xl font-normal tracking-tight mb-6">Our Locations</h1>
            <p class="max-w-md mx-auto text-gray-600 font-light text-sm leading-7">
                Dua suasana, satu rasa. Kunjungi kami di tepian telaga untuk ketenangan atau di tengah kota untuk kehangatan.
            </p>
        </div>
    </header>

    <section class="py-20 border-t border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-16 items-start">
                <div class="lg:w-1/3 reveal-up">
                    <span class="text-[10px] font-bold tracking-widest text-white bg-black px-3 py-1 uppercase mb-6 inline-block">The Central</span>
                    <h2 class="font-serif text-4xl mb-6">Ngebel Lake</h2>
                    <p class="text-gray-600 text-sm leading-7 mb-8 font-light">
                        Rumah pertama kami. Terletak persis di tepian Telaga Ngebel yang sejuk. Tempat terbaik untuk menikmati kopi sambil memandang kabut turun perlahan.
                    </p>
                    
                    <div class="space-y-4 text-sm mb-10">
                        <div class="flex gap-4">
                            <i class="ph ph-map-pin text-xl"></i>
                            <p class="font-light">{{ $setting->address_central }}</p>
                        </div>
                        <div class="flex gap-4">
                            <i class="ph ph-clock text-xl"></i>
                            <p class="font-light">Everyday: {{ $setting->open_hours }}</p>
                        </div>
                    </div>

                    <a href="https://maps.google.com/?q=-7.7981038,111.6382731" target="_blank" class="inline-flex items-center gap-2 border-b border-black pb-1 text-xs font-bold uppercase tracking-widest hover:text-gray-500 hover:border-gray-500 transition">
                        Get Directions <i class="ph ph-arrow-right"></i>
                    </a>
                </div>

                <div class="lg:w-2/3 w-full h-[400px] bg-gray-100 reveal-up delay-100 relative group overflow-hidden">
                    <iframe 
                        src="{{ $setting->map_url_central ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5414840810375!2d111.65487731477833!3d-7.838275994352219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79a0b0b8c6dfbb%3A0x6b876251b14a2c9!2sTelaga%20Ngebel!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid' }}" 
                        class="w-full h-full grayscale invert opacity-90 group-hover:opacity-100 transition-opacity duration-500" 
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-ra-gray border-t border-gray-200">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row-reverse gap-16 items-start">
                <div class="lg:w-1/3 reveal-up">
                    <span class="text-[10px] font-bold tracking-widest text-black border border-black px-3 py-1 uppercase mb-6 inline-block">The Branch</span>
                    <h2 class="font-serif text-4xl mb-6">City Hub</h2>
                    <p class="text-gray-600 text-sm leading-7 mb-8 font-light">
                        Oase di tengah hiruk pikuk kota Ponorogo. Desain modern bertemu dengan kehangatan kopi khas Rindu Alam. Cocok untuk bekerja atau bercengkrama.
                    </p>
                    
                    <div class="space-y-4 text-sm mb-10">
                        <div class="flex gap-4">
                            <i class="ph ph-map-pin text-xl"></i>
                            <p class="font-light">{{ $setting->address_branch }}</p>
                        </div>
                        <div class="flex gap-4">
                            <i class="ph ph-clock text-xl"></i>
                            <p class="font-light">Everyday: {{ $setting->open_hours }}</p>
                        </div>
                    </div>

                    <a href="https://maps.google.com/?q=-7.867568,111.466548" target="_blank" class="inline-flex items-center gap-2 border-b border-black pb-1 text-xs font-bold uppercase tracking-widest hover:text-gray-500 hover:border-gray-500 transition">
                        Get Directions <i class="ph ph-arrow-right"></i>
                    </a>
                </div>

                <div class="lg:w-2/3 w-full h-[400px] bg-white reveal-up delay-100 relative group overflow-hidden">
                    <iframe 
                        src="{{ $setting->map_url_branch ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.016390192809!2d111.48833131477884!3d-7.893356994313264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799ff2e8c25dbb%3A0x4a4d6bb9f1165cf!2sPonorogo%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid' }}" 
                        class="w-full h-full grayscale invert opacity-90 group-hover:opacity-100 transition-opacity duration-500" 
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <iframe src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="py-28 bg-black text-white text-center">
        <div class="container mx-auto px-6 max-w-2xl reveal-up">
            <h2 class="font-serif text-4xl md:text-5xl mb-6 font-normal">Have a Question?</h2>
            <p class="text-gray-400 font-light mb-10 text-sm leading-7">
                Kami siap menyambut Anda. Untuk reservasi grup besar, event, atau kerjasama, jangan ragu untuk menghubungi kami.
            </p>
            
            <div class="flex flex-col md:flex-row justify-center gap-6">
                <a href="https://wa.me/{{ $setting->whatsapp }}" class="bg-white text-black px-8 py-3 text-[10px] font-bold tracking-widest uppercase hover:bg-gray-200 transition-all duration-300">
                    Whatsapp Us
                </a>
            </div>
        </div>
    </section>
@endsection