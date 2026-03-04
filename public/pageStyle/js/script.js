// ========================================
// SALON DE COIFFURE - JAVASCRIPT
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Navbar Scroll Effect
    // 

    // Scroll to Top Button
    const scrollTopBtn = document.querySelector('.scroll-top');
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add('show');
            } else {
                scrollTopBtn.classList.remove('show');
            }
        });

        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Generic Carousel Function
    function initCarousel(containerSelector, itemWidth, autoplay = true, interval = 4000) {
        const container = document.querySelector(containerSelector);
        if (!container) return;

        const track = container.querySelector('.slider-track');
        const items = track.querySelectorAll('.slider-item');
        const prevBtn = container.querySelector('.prev-btn');
        const nextBtn = container.querySelector('.next-btn');
        
        let currentIndex = 0;
        let itemsToShow = getItemsToShow();

        function getItemsToShow() {
            if (window.innerWidth < 768) return 1;
            if (window.innerWidth < 992) return 2;
            return 3;
        }

        function updateCarousel() {
            const maxIndex = Math.max(0, items.length - itemsToShow);
            currentIndex = Math.min(currentIndex, maxIndex);
            const offset = currentIndex * (100 / itemsToShow);
            track.style.transform = `translateX(-${offset}%)`;
        }

        function nextSlide() {
            const maxIndex = Math.max(0, items.length - itemsToShow);
            currentIndex = currentIndex >= maxIndex ? 0 : currentIndex + 1;
            updateCarousel();
        }

        function prevSlide() {
            const maxIndex = Math.max(0, items.length - itemsToShow);
            currentIndex = currentIndex <= 0 ? maxIndex : currentIndex - 1;
            updateCarousel();
        }

        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);

        // Auto-play
        let autoplayInterval;
        if (autoplay) {
            autoplayInterval = setInterval(nextSlide, interval);
            
            container.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
            container.addEventListener('mouseleave', () => {
                autoplayInterval = setInterval(nextSlide, interval);
            });
        }

        // Responsive
        window.addEventListener('resize', function() {
            itemsToShow = getItemsToShow();
            updateCarousel();
        });

        // Set initial width
        items.forEach(item => {
            item.style.width = `${100 / itemsToShow}%`;
        });

        window.addEventListener('resize', function() {
            itemsToShow = getItemsToShow();
            items.forEach(item => {
                item.style.width = `${100 / itemsToShow}%`;
            });
        });
    }

    // Initialize Testimonials Carousel
    initCarousel('.testimonial-carousel', null, true, 5000);

    // Mobile Menu Close on Click
    // 

    // Form Validation
    // 

    // Contact Form
    // 

    // Gallery Lightbox (Simple)
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const img = this.querySelector('img');
            const lightbox = document.createElement('div');
            lightbox.className = 'lightbox';
            lightbox.innerHTML = `
                <div class="lightbox-content">
                    <span class="lightbox-close">&times;</span>
                    <img src="${img.src}" alt="${img.alt}">
                </div>
            `;
            lightbox.style.cssText = `
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.9);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                cursor: pointer;
            `;
            lightbox.querySelector('img').style.cssText = `
                max-width: 90%;
                max-height: 90%;
                object-fit: contain;
            `;
            lightbox.querySelector('.lightbox-close').style.cssText = `
                position: absolute;
                top: 20px;
                right: 30px;
                font-size: 3rem;
                color: white;
                cursor: pointer;
            `;
            
            document.body.appendChild(lightbox);
            document.body.style.overflow = 'hidden';
            
            lightbox.addEventListener('click', function() {
                this.remove();
                document.body.style.overflow = '';
            });
        });
    });

    // Animate on Scroll (Simple)
    // 

});