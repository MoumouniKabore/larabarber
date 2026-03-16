@extends('mainPages.default.main')

@section('title')
    Page Index
@endsection

@section('pageContent')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="hero-content text-center">
                        <p class="section-subtitle">Bienvenue chez Barber King</p>
                        <h1>L'Art de la <span>Coiffure</span> Masculine</h1>
                        <p>Découvrez une expérience unique de coiffure masculine. Notre équipe de barbiers experts vous offre des coupes modernes et un service personnalisé.</p>
                        <div class="d-flex flex-wrap gap-3 d-flex justify-content-center">
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
        </div>
    </section>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-5" role="alert">
            <strong>Succès !</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="{{ asset('pageStyle/images/image2.png') }}" alt="Barber Shop">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <p class="section-subtitle">À Propos de Nous</p>
                        <h2 class="section-title">Plus de 15 Ans d'<span>Excellence</span></h2>
                        <p class="text-muted">Fondé en 2008, Barber King est devenu la référence de la coiffure masculine. Notre philosophie ? Allier tradition et modernité pour offrir à chaque client une expérience unique.</p>
                        <p class="text-muted">Notre équipe de barbiers passionnés maîtrise toutes les techniques, des coupes classiques aux styles les plus contemporains.</p>
                        <div class="about-stats">
                            <div class="stat-item text-center">
                                <h3>15+</h3>
                                <p>Années d'expérience</p>
                            </div>
                            <div class="stat-item text-center">
                                <h3>10K+</h3>
                                <p>Clients satisfaits</p>
                            </div>
                            <div class="stat-item text-center">
                                <h3>8</h3>
                                <p>Barbiers experts</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('about') }}" class="btn-primary-custom">En Savoir Plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section section-light" id="services">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Ce Que Nous Offrons</p>
                <h2 class="section-title">Nos <span>Services</span></h2>
                <div class="section-divider"></div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <h4>Coupe Homme</h4>
                        <p>Coupe classique ou moderne adaptée à votre style et morphologie.</p>
                        <div class="service-price">À partir de 25€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-brush"></i>
                        </div>
                        <h4>Taille de Barbe</h4>
                        <p>Entretien et sculptage de votre barbe avec des produits premium.</p>
                        <div class="service-price">À partir de 15€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-stars"></i>
                        </div>
                        <h4>Coupe + Barbe</h4>
                        <p>Le combo parfait pour un look impeccable et soigné.</p>
                        <div class="service-price">À partir de 35€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-droplet"></i>
                        </div>
                        <h4>Rasage Traditionnel</h4>
                        <p>Rasage au blaireau et serviette chaude pour une peau parfaite.</p>
                        <div class="service-price">À partir de 20€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h4>Coloration</h4>
                        <p>Couleur naturelle ou fantaisie pour un style unique.</p>
                        <div class="service-price">À partir de 30€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-emoji-smile"></i>
                        </div>
                        <h4>Soin Visage</h4>
                        <p>Traitement complet pour une peau hydratée et revitalisée.</p>
                        <div class="service-price">À partir de 25€</div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('services') }}" class="btn-primary-custom">Voir Tous les Services</a>
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
                <!-- Membre 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ asset('pageStyle/images/image3.png') }}" alt="Marcus Johnson">
                        </div>
                        <div class="team-info">
                            <h5>Marcus Johnson</h5>
                            <span>Master Barber</span>
                            <div class="team-social">
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Membre 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ asset('pageStyle/images/image4.png') }}" alt="David Martin">
                        </div>
                        <div class="team-info">
                            <h5>David Martin</h5>
                            <span>Senior Barber</span>
                            <div class="team-social">
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Membre 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-image">
                            <img src="{{ asset('pageStyle/images/image5.png') }}" alt="James Wilson">
                        </div>
                        <div class="team-info">
                            <h5>James Wilson</h5>
                            <span>Barber & Colorist</span>
                            <div class="team-social">
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section" id="pricing">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Nos Tarifs</p>
                <h2 class="section-title">Nos <span>Prix</span></h2>
                <div class="section-divider"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card">
                        <h4>Basic</h4>
                        <div class="pricing-price">25€</div>
                        <ul class="pricing-list">
                            <li>Coupe Classique</li>
                            <li>Shampoing</li>
                            <li>Coiffage</li>
                            <li>Conseils Personnalisés</li>
                        </ul>
                        <a href="{{ route('booking') }}" class="btn-primary-custom">Réserver</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card featured">
                        <div class="pricing-badge">Populaire</div>
                        <h4>Premium</h4>
                        <div class="pricing-price">40€</div>
                        <ul class="pricing-list">
                            <li>Coupe Stylisée</li>
                            <li>Taille de Barbe</li>
                            <li>Shampoing Premium</li>
                            <li>Massage Crânien</li>
                            <li>Coiffage & Finition</li>
                        </ul>
                        <a href="{{ route('booking') }}" class="btn-primary-custom">Réserver</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card">
                        <h4>VIP</h4>
                        <div class="pricing-price">60€</div>
                        <ul class="pricing-list">
                            <li>Tout du Premium</li>
                            <li>Rasage Traditionnel</li>
                            <li>Soin Visage</li>
                            <li>Produits Offerts</li>
                            <li>Boisson Incluse</li>
                        </ul>
                        <a href="{{ route('booking') }}" class="btn-primary-custom">Réserver</a>
                    </div>
                </div>
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
                        <span>Coupe Moderne</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image7.png') }}" alt="Coupe 2">
                    <div class="gallery-overlay">
                        <span>Taille de Barbe</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image8.png') }}" alt="Salon">
                    <div class="gallery-overlay">
                        <span>Notre Salon</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image9.png') }}" alt="Coupe 3">
                    <div class="gallery-overlay">
                        <span>Coupe Classique</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image10.png') }}" alt="Coupe 4">
                    <div class="gallery-overlay">
                        <span>Fade Cut</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('pageStyle/images/image11.png') }}" alt="Coupe 5">
                    <div class="gallery-overlay">
                        <span>Style Personnalisé</span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('galleries') }}" class="btn-primary-custom">Voir Plus</a>
            </div>
        </div>
    </section>

    <!-- Hours & Booking Section -->
    <section class="section section-dark" id="hours">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <!-- Horaires -->
                <div class="col-lg-5">
                    <div class="hours-wrapper h-100">
                        <p class="section-subtitle">Horaires</p>
                        <h2 class="section-title">Heures d'<span>Ouverture</span></h2>
                        <div class="hours-card mt-4">
                            <ul class="hours-list">
                                <li>
                                    <span class="day">Lundi</span>
                                    <span class="time">09:00 - 19:00</span>
                                </li>
                                <li>
                                    <span class="day">Mardi</span>
                                    <span class="time">09:00 - 19:00</span>
                                </li>
                                <li>
                                    <span class="day">Mercredi</span>
                                    <span class="time">09:00 - 19:00</span>
                                </li>
                                <li>
                                    <span class="day">Jeudi</span>
                                    <span class="time">09:00 - 20:00</span>
                                </li>
                                <li>
                                    <span class="day">Vendredi</span>
                                    <span class="time">09:00 - 20:00</span>
                                </li>
                                <li>
                                    <span class="day">Samedi</span>
                                    <span class="time">08:00 - 18:00</span>
                                </li>
                                <li>
                                    <span class="day">Dimanche</span>
                                    <span class="time closed">Fermé</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Réservation -->
                <div class="col-lg-7">
                    <div class="booking-wrapper h-100">
                        <p class="section-subtitle">Réservation</p>
                        <h2 class="section-title">Prenez <span>Rendez-vous</span></h2>
                        <div class="booking-form mt-4">
                            <form action="{{ route('admin.storeBooking') }}" method="POST">
                                @csrf
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">Nom</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control form-control-lg @error('first_name') is-invalid @enderror" placeholder="Votre nom" required>
                                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Prénom</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control form-control-lg @error('last_name') is-invalid @enderror" placeholder="Votre prénom" required>
                                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Téléphone</label>
                                        <input type="tel" id="phone" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Votre téléphone" required>
                                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="service" class="form-label">Service</label>
                                        <select id="service" name="service" class="form-select form-select-lg @error('service') is-invalid @enderror" required>
                                            <option value="">Choisir un service</option>
                                            @foreach(['Classique', 'Premium', 'VIP', 'Coupe Classique', 'Coupe Moderne', 'Taille de Barbe', 'Coupe + Barbe', 'Rasage Traditionnel', 'Coloration', 'Soin Visage', 'Coupe Enfant'] as $topic)
                                                <option value="{{ $topic }}" @selected(old('service') == $topic)>
                                                    {{ ucfirst($topic) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="day" class="form-label">Quand venez-vous ?</label>
                                        <select id="day" name="day" class="form-select form-select-lg @error('day') is-invalid @enderror" required>
                                            <option value="">Choisir un jour</option>
                                            @foreach(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $topic)
                                                <option value="{{ $topic }}" @selected(old('day') == $topic)>
                                                    {{ ucfirst($topic) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('day') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="time" class="form-label">Heure</label>
                                        <select id="time" name="time" class="form-select form-select-lg @error('time') is-invalid @enderror" required>
                                            <option value="">Choisir une heure</option>
                                            @foreach(['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'] as $topic)
                                                <option value="{{ $topic }}" @selected(old('time') == $topic)>
                                                    {{ $topic }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn-primary-custom w-100">
                                            <i class="bi bi-calendar-check me-2"></i>Confirmer la Réservation
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->

    <section class="section" id="testimonials">
        <div class="container">
            <div class="text-center">
                <p class="section-subtitle">Témoignages</p>
                <h2 class="section-title">Avis de Nos <span>Clients</span></h2>
                <div class="section-divider"></div>
            </div>
            <div class="testimonial-carousel slider-container">
                <div class="text-end">
                    <button class="btn-primary-custom" data-coreui-toggle="modal" data-coreui-target="#addTestimonialModal">
                        Quel est votre avis ?
                    </button>
                </div>
                <div class="slider-track">
                    <div class="slider-item testimonial-card">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">"Le meilleur salon de coiffure que j'ai trouvé. Service impeccable, ambiance super et résultat toujours au top. Je recommande à 100%!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('pageStyle/images/image3.png') }}" alt="Client">
                            <div>
                                <h6>Pierre Dubois</h6>
                                <span>Client régulier</span>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item testimonial-card">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">"Ambiance chaleureuse et professionnalisme au rendez-vous. Ma barbe n'a jamais été aussi bien entretenue. Merci à toute l'équipe!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('pageStyle/images/image4.png') }}" alt="Client">
                            <div>
                                <h6>Marc Laurent</h6>
                                <span>Client depuis 2 ans</span>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item testimonial-card">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">"Excellente expérience à chaque visite. Les barbiers sont de vrais artistes qui comprennent exactement ce que vous voulez."</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('pageStyle/images/image5.png') }}" alt="Client">
                            <div>
                                <h6>Antoine Moreau</h6>
                                <span>Client VIP</span>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item testimonial-card">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <p class="testimonial-text">"Super salon avec une équipe sympathique. J'adore l'attention aux détails et les conseils personnalisés pour l'entretien."</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('pageStyle/images/image12.png') }}" alt="Client">
                            <div>
                                <h6>Lucas Bernard</h6>
                                <span>Nouveau client</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="carousel-btn prev-btn"><i class="bi bi-chevron-left"></i></button>
                    <button class="carousel-btn next-btn"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="">
                    <div class="cta-content">
                        <h2>Prêt pour un <span style="color: var(--secondary);">Nouveau Look</span> ?</h2>
                        <p>Réservez dès maintenant et découvrez pourquoi nos clients nous font confiance depuis plus de 15 ans.</p>
                    </div>
                </div>
                <div class="text-lg-end mt-4 mt-lg-0">
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


    {{-- Modal Ajout Avis --}}
    <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Votre Témoignage</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.storeTestimonie') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Nom</label>
                                <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" 
                                    value="{{ old('first_name') }}" placeholder="Ex: Dubois" required>
                                @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Prénom</label>
                                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" 
                                    value="{{ old('last_name') }}" placeholder="Ex: Pierre" required>
                                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Votre message</label>
                                <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" 
                                    rows="3" placeholder="Partagez votre expérience..." required>{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label for="photo" class="form-label">Photo de profil</label>
                                <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" 
                                    accept=".jpg, .png, .jpeg">
                                @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn px-4" data-coreui-dismiss="modal">Annuler</button> --}}
                        <button type="submit" class="btn-primary-custom">Envoyé Votre Avis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection