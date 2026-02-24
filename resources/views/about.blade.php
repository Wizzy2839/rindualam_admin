@extends('layouts.frontend')

@section('title', 'OUR STORY - Rindu Alam Coffee')

@section('content')
    <header class="relative h-[60vh] min-h-[400px] bg-black overflow-hidden flex items-center justify-center">
        <div class="absolute inset-0 w-full h-full opacity-70">
            <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover grayscale brightness-75" alt="Coffee Farm">
        </div>
        <div class="relative z-10 text-center text-white reveal-up">
            <p class="text-[10px] font-bold tracking-widest uppercase mb-4">Since 2021</p>
            <h1 class="font-serif text-5xl md:text-7xl font-normal tracking-tight">The Origin</h1>
        </div>
    </header>

    <section class="py-28 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-20 items-center">
                <div class="w-full md:w-1/2 reveal-up">
                    <span class="text-[10px] font-bold tracking-widest text-gray-400 mb-6 block uppercase border-b border-gray-200 pb-4">The Beginning</span>
                    <h2 class="font-serif text-4xl md:text-5xl mb-8 leading-tight font-medium">
                        Sebuah <span class="italic text-gray-500">Inisiasi.</span>
                    </h2>
                    <div class="space-y-6 text-gray-700 font-light text-[15px] leading-7 text-justify">
                        <p>
                            Cerita ini bermula di tepian Telaga Ngebel. Sebuah destinasi indah yang sayangnya, bagi penikmat kopi sejati, terasa ada yang kurang. Sejauh mata memandang, hanya ada deretan warkop tradisional dengan kopi <em>sachet</em> atau tubruk sederhana.
                        </p>
                        <p>
                            Kami bertanya: <em>"Kenapa tidak ada kopi yang layak di tempat seindah ini?"</em>
                        </p>
                        <p>
                            Itulah titik awal Rindu Alam. Kami tidak ingin sekadar membuka kedai. Kami ingin membawa kultur. Membawa standar rasa baru. Menjadi <strong>Coffeeshop Modern Pertama</strong> yang berdiri di tanah ini, menantang status quo demi secangkir kopi yang pantas Anda nikmati.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 relative reveal-up delay-100">
                    <div class="aspect-[4/5] overflow-hidden bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-1000" alt="Ngebel Lake Atmosphere">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-28 bg-black text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20 max-w-3xl mx-auto reveal-up">
                <h2 class="font-serif text-4xl md:text-5xl mb-6 font-normal">Total Dedication</h2>
                <p class="text-gray-400 font-light leading-relaxed">
                    Kami percaya bahwa rasa terbaik tidak bisa dibeli dari pihak ketiga. Rasa terbaik harus diciptakan, dirawat, dan dijaga sendiri. Inilah arti sesungguhnya dari <em>Farm to Cup</em>.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <div class="group reveal-up delay-100">
                    <div class="w-20 h-20 mx-auto border border-white/20 rounded-full flex items-center justify-center mb-8 group-hover:border-white group-hover:bg-white group-hover:text-black transition-all duration-500">
                        <i class="ph ph-potted-plant text-3xl font-light"></i>
                    </div>
                    <h3 class="font-serif text-2xl mb-4 italic">01. Planting</h3>
                    <p class="text-sm text-gray-400 font-light leading-7 px-4">
                        Di dataran tinggi Ponorogo, kami menanam sendiri bibit kopi pilihan. Merawatnya dengan iklim mikro yang sempurna.
                    </p>
                </div>

                <div class="group reveal-up delay-200">
                    <div class="w-20 h-20 mx-auto border border-white/20 rounded-full flex items-center justify-center mb-8 group-hover:border-white group-hover:bg-white group-hover:text-black transition-all duration-500">
                        <i class="ph ph-thermometer text-3xl font-light"></i>
                    </div>
                    <h3 class="font-serif text-2xl mb-4 italic">02. Roasting</h3>
                    <p class="text-sm text-gray-400 font-light leading-7 px-4">
                        Tidak ada pihak ketiga. Mesin <em>roasting</em> kami bekerja setiap hari untuk mengeluarkan karakter terbaik dari setiap biji hijau.
                    </p>
                </div>

                <div class="group reveal-up delay-300">
                    <div class="w-20 h-20 mx-auto border border-white/20 rounded-full flex items-center justify-center mb-8 group-hover:border-white group-hover:bg-white group-hover:text-black transition-all duration-500">
                        <i class="ph ph-coffee-bean text-3xl font-light"></i>
                    </div>
                    <h3 class="font-serif text-2xl mb-4 italic">03. Serving</h3>
                    <p class="text-sm text-gray-400 font-light leading-7 px-4">
                        Barista kami menyeduh dengan presisi. Hasil akhirnya adalah cangkir yang jujur, bersih, dan penuh cerita.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-28 bg-[#0a0a0a] text-white border-t border-white/10">
        <div class="container mx-auto px-6">
            <h2 class="font-serif text-4xl font-normal text-center mb-20 tracking-tight">The Makers</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 max-w-6xl mx-auto">
                @forelse($teams as $team)
                <div class="group reveal-up text-center">
                    <div class="w-48 h-48 mx-auto rounded-full overflow-hidden bg-[#151515] mb-6 border-2 border-white/10 group-hover:border-white/50 transition duration-500">
                        @if($team->image)
                            <img src="{{ asset('storage/' . $team->image) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-[1.5s]">
                        @else
                            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93" class="w-full h-full object-cover grayscale opacity-50">
                        @endif
                    </div>
                    <h3 class="font-serif text-2xl mb-2">{{ $team->name }}</h3>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-gray-500">{{ $team->role }}</p>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500">
                    <p>Data tim belum diisi oleh Admin.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection