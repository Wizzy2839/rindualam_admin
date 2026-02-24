@extends('layouts.frontend')
@section('title', 'GALLERY - Rindu Alam Coffee')

@section('content')
    <header class="relative pt-40 pb-20 bg-white text-center">
        <div class="container mx-auto px-6 reveal-up">
            <p class="text-[10px] font-bold tracking-widest uppercase mb-4 text-gray-400">Visual Journey</p>
            <h1 class="font-serif text-5xl md:text-7xl font-normal tracking-tight mb-6">The Gallery</h1>
            <p class="max-w-md mx-auto text-gray-600 font-light text-sm leading-7">
                Kumpulan momen, sudut, dan cerita yang terekam di Rindu Alam.
            </p>
        </div>
    </header>

    <section class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-6">
            
            <div class="columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">
                @forelse($galleries as $idx => $photo)
                <div class="break-inside-avoid group reveal-up delay-{{ ($idx % 3) * 100 }}">
                    <img src="{{ asset('storage/' . $photo->image) }}" 
                         class="w-full h-auto rounded-2xl grayscale hover:grayscale-0 transition duration-[1.5s] hover:scale-[1.02]" 
                         alt="{{ $photo->caption ?? 'Rindu Alam Gallery' }}">
                </div>
                @empty
                <div class="col-span-full py-20 text-center text-gray-500 w-full block">
                    Wah, belum ada foto nih. Adminnya kemana dah?
                </div>
                @endforelse
            </div>
            
        </div>
    </section>
@endsection