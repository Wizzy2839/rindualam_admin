document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. CAROUSEL LOGIC (Hanya jalan jika ada elemen carousel) ---
    const carouselTrack = document.getElementById('carousel-track');
    
    if (carouselTrack) {
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('#indicators button');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            slides.forEach((slide) => {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
            });
            
            // Cek jika indikator ada (untuk halaman yang pakai dots)
            if(indicators.length > 0) {
                indicators.forEach((dot) => {
                    dot.classList.remove('w-8', 'bg-white');
                    dot.classList.add('w-2', 'bg-white/40');
                });
                indicators[index].classList.remove('w-2', 'bg-white/40');
                indicators[index].classList.add('w-8', 'bg-white');
            }

            slides[index].classList.remove('opacity-0', 'z-0');
            slides[index].classList.add('opacity-100', 'z-10');
            currentSlide = index;
        }

        function nextSlide() {
            let newIndex = (currentSlide + 1) % slides.length;
            showSlide(newIndex);
        }

        function prevSlide() {
            let newIndex = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(newIndex);
        }

        if(nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetTimer(); });
        if(prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetTimer(); });

        if(indicators.length > 0) {
            indicators.forEach((dot, idx) => {
                dot.addEventListener('click', () => {
                    showSlide(idx);
                    resetTimer();
                });
            });
        }

        function startTimer() { slideInterval = setInterval(nextSlide, 5000); }
        function resetTimer() { clearInterval(slideInterval); startTimer(); }
        
        startTimer();
    }


    // --- 2. SCROLL REVEAL ANIMATION (Wajib Jalan di Semua Halaman) ---
    const reveals = document.querySelectorAll('.reveal-up');

    const revealOnScroll = () => {
        const windowHeight = window.innerHeight;
        const elementVisible = 50; // Jarak trigger

        reveals.forEach((reveal) => {
            const elementTop = reveal.getBoundingClientRect().top;
            if (elementTop < windowHeight - elementVisible) {
                reveal.classList.add('active-reveal');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    // Panggil sekali saat load agar konten yang sudah terlihat langsung muncul
    setTimeout(revealOnScroll, 100); 


    // --- 3. MOBILE MENU ---
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileBtn && mobileMenu) {
        const icon = mobileBtn.querySelector('i');
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            if (mobileMenu.classList.contains('hidden')) {
                icon.classList.remove('ph-x');
                icon.classList.add('ph-list');
            } else {
                icon.classList.remove('ph-list');
                icon.classList.add('ph-x');
            }
        });
    }
});