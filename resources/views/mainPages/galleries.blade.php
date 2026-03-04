@extends('mainPages.default.main')

@section('title')
    Page Galleries
@endsection

@section('pageContent')

        <!-- Hero Section -->
    <section class="hero-section hero-page" style="background-image: linear-gradient(135deg, rgba(26,26,46,0.95), rgba(26,26,46,0.8)), url({{ asset('pageStyle/images/image6.png') }});">
        <div class="container">
            <div class="text-center">
                <p class="section-subtitle">Notre Portfolio</p>
                <h1 class="text-white">Notre <span>Galerie</span></h1>
                <p class="text-white">Découvrez nos réalisations et notre savoir-faire</p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Notre Travail</p>
                <h2 class="section-title">Notre <span>Galerie</span></h2>
                <div class="section-divider"></div>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid">
                <!-- Coupes -->
                <div class="gallery-item" data-category="coupe">
                    <img src="{{ asset('pageStyle/images/image1.png') }}" alt="Coupe 1">
                    <div class="gallery-overlay"><span>Fade Moderne</span></div>
                </div>
                <div class="gallery-item" data-category="coupe">
                    <img src="{{ asset('pageStyle/images/image2.png') }}" alt="Coupe 2">
                    <div class="gallery-overlay"><span>Coupe Classique</span></div>
                </div>
                <div class="gallery-item" data-category="coupe">
                    <img src="{{ asset('pageStyle/images/image6.png') }}" alt="Coupe 3">
                    <div class="gallery-overlay"><span>Undercut</span></div>
                </div>
                <div class="gallery-item" data-category="coupe">
                    <img src="{{ asset('pageStyle/images/image7.png') }}" alt="Coupe 4">
                    <div class="gallery-overlay"><span>Style Pompadour</span></div>
                </div>
                <div class="gallery-item" data-category="coupe">
                    <img src="{{ asset('pageStyle/images/image8.png') }}" alt="Coupe 5">
                    <div class="gallery-overlay"><span>Buzz Cut</span></div>
                </div>

                <!-- Barbes -->
                <div class="gallery-item" data-category="barbe">
                    <img src="{{ asset('pageStyle/images/image9.png') }}" alt="Barbe 1">
                    <div class="gallery-overlay"><span>Barbe Sculptée</span></div>
                </div>
                <div class="gallery-item" data-category="barbe">
                    <img src="{{ asset('pageStyle/images/image10.png') }}" alt="Barbe 2">
                    <div class="gallery-overlay"><span>Barbe Courte</span></div>
                </div>
                <div class="gallery-item" data-category="barbe">
                    <img src="{{ asset('pageStyle/images/image11.png') }}" alt="Barbe 3">
                    <div class="gallery-overlay"><span>Barbe Full</span></div>
                </div>

                <!-- Salon -->
                <div class="gallery-item" data-category="salon">
                    <img src="{{ asset('pageStyle/images/image12.png') }}" alt="Salon 1">
                    <div class="gallery-overlay"><span>Espace Principal</span></div>
                </div>
                <div class="gallery-item" data-category="salon">
                    <img src="{{ asset('pageStyle/images/image13.png') }}" alt="Salon 2">
                    <div class="gallery-overlay"><span>Zone de Travail</span></div>
                </div>
                <div class="gallery-item" data-category="salon">
                    <img src="{{ asset('pageStyle/images/image14.png') }}" alt="Salon 3">
                    <div class="gallery-overlay"><span>Détails</span></div>
                </div>
                <div class="gallery-item" data-category="salon">
                    <img src="{{ asset('pageStyle/images/image15.png') }}" alt="Salon 4">
                    <div class="gallery-overlay"><span>Nos Outils</span></div>
                </div>
            </div>
        </div>
    </section>

@endsection