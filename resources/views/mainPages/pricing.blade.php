@extends('mainPages.default.main')

@section('title')
    Page Pricing
@endsection

@section('pageContent')

    <!-- Hero Section -->
    <section class="hero-section hero-page" style="background-image: linear-gradient(135deg, rgba(26,26,46,0.95), rgba(26,26,46,0.8)), url({{ asset('pageStyle/images/image2.png') }});">
        <div class="container">
            <div class="text-center">
                <p class="section-subtitle">Nos Tarifs</p>
                <h1 class="text-white">Nos <span>Prix</span></h1>
                <p class="text-white">Des tarifs transparents pour des services de qualité</p>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section" id="pricing">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Forfaits</p>
                <h2 class="section-title">Nos <span>Formules</span></h2>
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
    
    <section class="section" id="pricing">
        <!-- Detailed Price List -->
        <div class="text-center mb-5">
            <p class="section-subtitle">Tarifs Détaillés</p>
            <h2 class="section-title">Liste des <span>Prix</span></h2>
            <div class="section-divider"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="hours-card">
                    <h5 class="mb-4"><i class="bi bi-scissors me-2" style="color: var(--secondary);"></i>Coupes</h5>
                    <ul class="hours-list">
                        <li><span class="day">Coupe Classique</span><span><strong>25€</strong></span></li>
                        <li><span class="day">Coupe Moderne / Fade</span><span><strong>30€</strong></span></li>
                        <li><span class="day">Coupe Enfant (-12 ans)</span><span><strong>18€</strong></span></li>
                        <li><span class="day">Coupe + Shampoing + Coiffage</span><span><strong>30€</strong></span></li>
                    </ul>

                    <h5 class="mb-4 mt-5"><i class="bi bi-brush me-2" style="color: var(--secondary);"></i>Barbe & Rasage</h5>
                    <ul class="hours-list">
                        <li><span class="day">Taille de Barbe</span><span><strong>15€</strong></span></li>
                        <li><span class="day">Rasage Traditionnel</span><span><strong>20€</strong></span></li>
                        <li><span class="day">Barbe Longue (entretien complet)</span><span><strong>20€</strong></span></li>
                        <li><span class="day">Contour Barbe</span><span><strong>10€</strong></span></li>
                    </ul>

                    <h5 class="mb-4 mt-5"><i class="bi bi-stars me-2" style="color: var(--secondary);"></i>Combos</h5>
                    <ul class="hours-list">
                        <li><span class="day">Coupe + Barbe</span><span><strong>35€</strong></span></li>
                        <li><span class="day">Coupe + Rasage Traditionnel</span><span><strong>40€</strong></span></li>
                        <li><span class="day">Forfait Complet (Coupe + Barbe + Soin)</span><span><strong>55€</strong></span></li>
                    </ul>

                    <h5 class="mb-4 mt-5"><i class="bi bi-palette me-2" style="color: var(--secondary);"></i>Autres Services</h5>
                    <ul class="hours-list">
                        <li><span class="day">Coloration</span><span><strong>30€</strong></span></li>
                        <li><span class="day">Mèches / Balayage</span><span><strong>40€</strong></span></li>
                        <li><span class="day">Soin Visage</span><span><strong>25€</strong></span></li>
                        <li><span class="day">Épilation Sourcils</span><span><strong>8€</strong></span></li>
                    </ul>
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
                        <h2>Prêt à Réserver ?</h2>
                        <p>Choisissez votre service et prenez rendez-vous en quelques clics</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <a href="{{ route('booking') }}" class="btn-primary-custom">
                            <i class="bi bi-calendar-check me-2"></i>Réserver Maintenant
                        </a>
                        <a href="{{ route('contact') }}" class="btn-outline-custom">
                            <i class="bi bi-bag me-2"></i>Contactez-Nous
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection