// Interaktif dan Animasi Native Rindu Alam Coffee

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Intersection Observer untuk Animasi Scroll (Reveal-up dll)
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15 // Animasi dimulai saat 15% elemen masuk layar
    };

    const scrollObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Tambahkan class aktif untuk memulai transisi animasi
                entry.target.classList.add('active');
                
                // Opsional: Jika ingin elemen tidak pudar lagi ketika di scroll ke atas, lakukan unobserve
                // observer.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    // Deteksi semua elemen yang memiliki kelas animasi
    const hiddenElements = document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right');
    hiddenElements.forEach((el) => {
        scrollObserver.observe(el);
    });


    // 2. Mobile Menu Interactivity Enhancement
    // Jika tombol mobile menu ditekan, beri efek blur pada body (smooth backdrop)
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const closeTextBtn = document.getElementById('close-menu-text-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        function overlayEffects(isOpen) {
            if (isOpen) {
                // Opsional: blur out konten dibelakang menu
                document.querySelector('main').style.transition = "filter 0.5s ease";
                document.querySelector('main').style.filter = "blur(4px)";
            } else {
                document.querySelector('main').style.filter = "none";
            }
        }

        // Attach listener pada metode toggleMenu di frontend.blade.php
        // karena toggleMenu berbentuk global, kita override sedikit atau dengarkan klik.
        mobileMenuBtn.addEventListener('click', function() {
            setTimeout(() => {
                const isMenuOpen = !mobileMenu.classList.contains('translate-x-full');
                overlayEffects(isMenuOpen);
            }, 50);
        });

        if (closeTextBtn) {
            closeTextBtn.addEventListener('click', function() {
                overlayEffects(false);
            });
        }
    }
});
