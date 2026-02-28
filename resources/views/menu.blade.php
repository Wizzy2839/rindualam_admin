@extends('layouts.frontend')

@section('title', 'MENU - Rindu Alam Coffee')

@section('content')
    <header class="relative pt-40 pb-20 bg-white text-center">
        <div class="container mx-auto px-6 reveal-up">
            <p class="text-[10px] font-bold tracking-widest uppercase mb-4 text-gray-400">Curated Selection</p>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-normal tracking-tight mb-6">Our Menu</h1>
            <p class="max-w-md mx-auto text-gray-600 font-light text-sm leading-7">
                Dari kebun sendiri ke cangkir Anda. Nikmati rasa asli Ponorogo.
            </p>
        </div>
    </header>

    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container mx-auto px-6 max-w-5xl">
            
            <div class="columns-1 md:columns-2 gap-16 md:gap-24">
                
                @forelse($categories as $category)
                <div class="mb-16 reveal-up break-inside-avoid">
                    <h2 class="font-serif text-3xl mb-8 border-b-2 border-black pb-2 inline-block">
                        {{ $category->name }}
                    </h2>
                    
                    <div class="space-y-6">
                        @forelse($category->items as $item)
                        <div class="flex justify-between items-baseline group cursor-pointer">
                            <div>
                                <h4 class="font-bold text-sm tracking-wide mb-1 group-hover:translate-x-2 transition-transform duration-300">
                                    {{ $item->name }}
                                </h4>
                                @if($item->description)
                                <p class="text-[10px] text-gray-400 uppercase tracking-wider">
                                    {{ $item->description }}
                                </p>
                                @endif
                            </div>
                            <span class="text-sm font-serif">
                                {{ number_format($item->price, 0, ',', '.') }}
                            </span>
                        </div>
                        @empty
                        <p class="text-xs text-gray-400 italic">Menu lagi kosong nih, nunggu barista seduh dulu.</p>
                        @endforelse
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-gray-500 font-light">Belum ada daftar menu yang diinput oleh Admin.</p>
                </div>
                @endforelse

            </div>
            
        </div>
    </section>
@endsection