@extends('mainPages.default.main')

@section('title')
    Page Services
@endsection

@section('pageContent')

    <!-- Hero Section -->
    <section class="hero-section hero-page" style="background-image: linear-gradient(135deg, rgba(26,26,46,0.95), rgba(26,26,46,0.8)), url({{ asset('pageStyle/images/image18.png') }});">
        <div class="container">
            <div class="text-center">
                <p class="section-subtitle">Ce Que Nous Offrons</p>
                <h1 class="text-white">Nos <span>Services</span></h1>
                <p class="text-white">Des services de coiffure et de soin masculins de qualité premium</p>
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
                        <h4>Coupe Classique</h4>
                        <p>Coupe traditionnelle réalisée aux ciseaux avec finition soignée. Inclut le shampoing et le coiffage.</p>
                        <div class="service-price">25€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <h4>Coupe Moderne</h4>
                        <p>Coupe tendance avec dégradé (fade), undercut ou tout style contemporain de votre choix.</p>
                        <div class="service-price">30€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-brush"></i>
                        </div>
                        <h4>Taille de Barbe</h4>
                        <p>Sculptage et entretien de votre barbe avec des produits de qualité professionnelle.</p>
                        <div class="service-price">15€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-stars"></i>
                        </div>
                        <h4>Coupe + Barbe</h4>
                        <p>Le combo parfait pour un look complet. Coupe moderne et taille de barbe incluses.</p>
                        <div class="service-price">35€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-droplet"></i>
                        </div>
                        <h4>Rasage Traditionnel</h4>
                        <p>Rasage au blaireau avec serviette chaude et produits apaisants. Une expérience unique.</p>
                        <div class="service-price">20€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h4>Coloration</h4>
                        <p>Couleur naturelle, mèches ou coloration fantaisie selon vos envies et votre style.</p>
                        <div class="service-price">30€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-emoji-smile"></i>
                        </div>
                        <h4>Soin Visage</h4>
                        <p>Traitement complet du visage : nettoyage, gommage, masque et hydratation.</p>
                        <div class="service-price">25€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-emoji-smile"></i>
                        </div>
                        <h4>Forfait VIP</h4>
                        <p>Expérience complète : coupe, barbe, rasage, soin visage et boisson offerte.</p>
                        <div class="service-price">60€</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-emoji-smile"></i>
                        </div>
                        <h4>Coupe Enfant</h4>
                        <p>Coupe adaptée pour les enfants de moins de 12 ans dans une ambiance détendue.</p>
                        <div class="service-price">18€</div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('services') }}" class="btn-primary-custom">Voir Tous les Services</a>
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
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('galleries') }}" class="btn-primary-custom">Voir Plus</a>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="section section-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-4">
                        <p class="section-subtitle">Réservation</p>
                        <h2 class="section-title">Prenez <span>Rendez-vous</span></h2>
                        <div class="section-divider"></div>
                    </div>
                    <div class="booking-form bg-white p-5 rounded-4">
                        <form action="" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Votre prénom" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="form-control form-control-lg" placeholder="Votre nom" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Votre numéro" required>
                                </div>
                                <div class="col-md-6">
                                    <select name="service" class="form-select form-select-lg" required>
                                        <option value="">Choisir un service</option>
                                        <option value="Classique">Classique</option>
                                        <option value="Premium">Premium</option>
                                        <option value="VIP">VIP</option>
                                        <option value="Coupe Classique">Coupe Classique</option>
                                        <option value="Coupe Moderne">Coupe Moderne</option>
                                        <option value="Taille de Barbe">Taille de Barbe</option>
                                        <option value="Coupe + Barbe">Coupe + Barbe</option>
                                        <option value="Rasage Traditionnel">Rasage Traditionnel</option>
                                        <option value="Coloration">Coloration</option>
                                        <option value="Soin Visage">Soin Visage</option>
                                        <option value="Coupe Enfant">Coupe Enfant</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="day" class="form-select form-select-lg" required>
                                        <option value="">Quand venez-vous ?</option>
                                        <option value="Lundi">Lundi</option>
                                        <option value="Mardi">Mardi</option>
                                        <option value="Mercredi">Mercredi</option>
                                        <option value="Jeudi">Jeudi</option>
                                        <option value="Vendredi">Vendredi</option>
                                        <option value="Samedi">Samedi</option>
                                        <option value="Dimanche">Dimanche</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="time" class="form-select form-select-lg" required>
                                        <option value="">Choisir une heure</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                    </select>
                                </div>
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
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="d-flex justify-content-center">
                    <div class="cta-content text-center">
                        <h2>Des Questions sur Nos Services ?</h2>
                        <p>Contactez-nous ou visitez notre boutique pour découvrir nos produits</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <a href="{{ route('booking') }}" class="btn-primary-custom">
                            <i class="bi bi-calendar-check me-2"></i>Contactez-Nous
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