@extends('mainPages.default.main')

@section('title')
    Page About
@endsection

@section('pageContent')

    <!-- Hero Section -->
    <section class="hero-section hero-page" style="background-image: linear-gradient(135deg, rgba(26,26,46,0.95), rgba(26,26,46,0.8)), url({{ asset('pageStyle/images/image13.png') }});">
        <div class="container">
            <div class="text-center">
                <p class="section-subtitle">Notre Histoire</p>
                <h1 class="text-white">À <span>Propos</span> de Nous</h1>
                <p class="text-white">Découvrez qui nous sommes et notre passion pour l'art de la coiffure masculine</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="{{ asset('pageStyle/images/image14.png') }}" alt="Notre Salon">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <p class="section-subtitle">Notre Histoire</p>
                        <h2 class="section-title">Une Passion pour l'<span>Excellence</span></h2>
                        <p class="text-muted">Fondé en 2008 par Marcus Johnson, Barber King est né d'une passion profonde pour l'art de la coiffure masculine. Ce qui a commencé comme un petit salon est devenu aujourd'hui une référence incontournable.</p>
                        <p class="text-muted">Notre philosophie est simple : chaque client mérite une attention particulière et un service d'exception. Nous croyons que la coiffure est bien plus qu'un simple service, c'est une expérience.</p>
                        <p class="text-muted">Au fil des années, nous avons formé une équipe de barbiers passionnés, tous experts dans leur domaine, qui partagent notre vision de l'excellence.</p>
                        <div class="about-stats">
                            <div class="stat-item text-center">
                                <h3>15+</h3>
                                <p>Années</p>
                            </div>
                            <div class="stat-item text-center">
                                <h3>10K+</h3>
                                <p>Clients</p>
                            </div>
                            <div class="stat-item text-center">
                                <h3>8</h3>
                                <p>Experts</p>
                            </div>
                            <div class="stat-item text-center">
                                <h3>5★</h3>
                                <p>Note</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section section-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h4>Notre Mission</h4>
                        <p>Offrir à chaque homme une expérience de coiffure exceptionnelle, alliant tradition et modernité.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h4>Notre Vision</h4>
                        <p>Devenir la référence de la coiffure masculine, reconnue pour son excellence et son innovation.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <h4>Nos Valeurs</h4>
                        <p>Passion, professionnalisme, respect du client et recherche constante de la perfection.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section section-dark" id="team">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Notre Équipe</p>
                <h2 class="section-title">Nos <span>Barbiers</span> Experts</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="row g-4 justify-content-center">
                @forelse ($barbers as $barber)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-card">
                            <div class="team-image">
                                @if($barber->photo)
                                    <img src="{{ asset(Storage::url($barber->photo)) }}" class="me-3 shadow-sm" width="40" height="40" style="object-fit: cover;">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($barber->first_name . ' ' . $barber->last_name) }}&background=random" class="me-3 shadow-sm" width="40" height="40">
                                @endif
                            </div>
                            <div class="team-info">
                                <h5>{{ $barber->first_name }} {{ $barber->last_name }}</h5>
                                <span>{{ $barber->fonction }}</span>
                                <div class="team-social">
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>                    
                @empty
                    <p>ejhherge</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section section-light" id="gallery">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Notre Travail</p>
                <h2 class="section-title">Notre <span>Galerie</span></h2>
                <div class="section-divider"></div>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image6.png') }}" alt="Coupe 1">
                    <div class="gallery-overlay">
                        <span>Espace Principal</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image7.png') }}" alt="Coupe 2">
                    <div class="gallery-overlay">
                        <span>Zone de Coupe</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image8.png') }}" alt="Salon">
                    <div class="gallery-overlay">
                        <span>Espace Détente</span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('galleries') }}" class="btn-primary-custom">Voir Plus</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="d-flex justify-content-center">
                    <div class="cta-content text-center">
                        <h2>Prêt à Nous Rendre Visite ?</h2>
                        <p>Réservez votre créneau et vivez l'expérience Barber King</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <a href="{{ route('booking') }}" class="btn-primary-custom">
                            <i class="bi bi-calendar-check me-2"></i>Réserver
                        </a>
                        <a href="{{ route('services') }}" class="btn-outline-custom">
                            <i class="bi bi-arrow-right me-2"></i>Nos Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection