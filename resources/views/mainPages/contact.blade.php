@extends('mainPages.default.main')

@section('title')
    Page Contact
@endsection

@section('pageContent')

        <!-- Hero Section -->
    <section class="hero-section hero-page" style="background-image: linear-gradient(135deg, rgba(26,26,46,0.95), rgba(26,26,46,0.8)), url({{ asset('pageStyle/images/image1.png') }});">
        <div class="container">
            <div class="text-center">
                <p class="section-subtitle">Nous Contacter</p>
                <h1 class="text-white">Restons en <span>Contact</span></h1>
                <p class="text-white">Une question ? N'hésitez pas à nous contacter</p>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-5" role="alert">
            <strong>Succès !</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Contact Section -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="booking-form">
                        <h3 class="mb-4"><i class="bi bi-envelope me-2" style="color: var(--secondary);"></i>Envoyez-nous un Message</h3>


                        <form action="{{ route('admin.storeMessage') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">Nom *</label>
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" 
                                        value="{{ old('first_name') }}" placeholder="Votre nom" required>
                                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Prénom *</label>
                                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" 
                                        value="{{ old('last_name') }}" placeholder="Votre prénom" required>
                                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone *</label>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                        value="{{ old('phone') }}" placeholder="01 03 25 14 77" required>
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                        value="{{ old('email') }}" placeholder="votre@email.com" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="subject" class="form-label">Sujet *</label>
                                    <select name="subject" class="form-select @error('subject') is-invalid @enderror" required>
                                        <option value="">Sélectionnez un sujet</option>
                                        @foreach(['question générale', 'réservation', 'partenariat', 'réclamation', 'critique', 'autre'] as $topic)
                                            <option value="{{ $topic }}" @selected(old('subject') == $topic)>
                                                {{ ucfirst($topic) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" 
                                            rows="6" placeholder="Écrivez votre message ici..." required>{{ old('message') }}</textarea>
                                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn-primary-custom w-100">
                                        <i class="bi bi-send me-2"></i>Envoyer le Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-5">
                    <div class="contact-info-card">
                        <h4 class="mb-4">Informations de Contact</h4>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h5>Adresse</h5>
                                <p>123 Rue de la Mode<br>75001 Paris, France</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div>
                                <h5>Téléphone</h5>
                                <p>+33 1 23 45 67 89<br>+33 6 98 76 54 32</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p>contact@barberking.fr<br>reservation@barberking.fr</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div>
                                <h5>Horaires</h5>
                                <p>Lun - Jeu : {{ $hour1->time }}<br>Vendredi : {{ $hour2->time }}<br>Samedi : {{ $hour3->time }}<br>Dimanche : {{ $hour4->time }}</p>
                            </div>
                        </div>

                        <hr style="border-color: rgba(255,255,255,0.2); margin: 2rem 0;">

                        <h5 class="mb-3">Suivez-nous</h5>
                        <div class="social-links">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                            <a href="#"><i class="bi bi-tiktok"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="section section-light">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Localisation</p>
                <h2 class="section-title">Nous <span>Trouver</span></h2>
                <div class="section-divider"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937595!2d2.292292615509614!3d48.85837007928746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1635959562000!5m2!1sfr!2sfr" 
                            allowfullscreen="" 
                            loading="lazy"
                            title="Notre localisation">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">FAQ</p>
                <h2 class="section-title">Questions <span>Fréquentes</span></h2>
                <div class="section-divider"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ 1 -->
                        <div class="accordion-item border-0 mb-3" style="border-radius: 10px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-coreui-toggle="collapse" data-coreui-target="#faq1">
                                    <strong>Comment puis-je réserver un rendez-vous ?</strong>
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-coreui-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Vous pouvez réserver en ligne via notre page de réservation, par téléphone au +33 1 23 45 67 89, ou directement en vous rendant au salon. Nous vous recommandons de réserver à l'avance, surtout pour les week-ends.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item border-0 mb-3" style="border-radius: 10px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#faq2">
                                    <strong>Quelle est votre politique d'annulation ?</strong>
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-coreui-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Les annulations sont gratuites si elles sont effectuées au moins 24 heures avant le rendez-vous. En cas d'annulation tardive ou de non-présentation, des frais peuvent s'appliquer.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item border-0 mb-3" style="border-radius: 10px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#faq3">
                                    <strong>Acceptez-vous les clients sans rendez-vous ?</strong>
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-coreui-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Oui, nous acceptons les clients sans rendez-vous dans la limite des disponibilités. Cependant, pour garantir votre créneau et éviter l'attente, nous vous recommandons de réserver.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item border-0 mb-3" style="border-radius: 10px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#faq4">
                                    <strong>Quels modes de paiement acceptez-vous ?</strong>
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-coreui-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Nous acceptons les paiements en espèces, par carte bancaire (Visa, Mastercard), et par Apple Pay / Google Pay. Les chèques ne sont pas acceptés.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item border-0 mb-3" style="border-radius: 10px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#faq5">
                                    <strong>Proposez-vous des cartes cadeaux ?</strong>
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-coreui-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Oui ! Nos cartes cadeaux sont disponibles à partir de 25€. Elles constituent un cadeau idéal pour toute occasion. Vous pouvez les acheter en salon ou nous contacter pour plus d'informations.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="accordion-item border-0" style="border-radius: 10px; overflow: hidden;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#faq6">
                                    <strong>Avez-vous un programme de fidélité ?</strong>
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-coreui-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolument ! Pour chaque visite, vous cumulez des points. Au bout de 10 visites, vous bénéficiez d'une coupe gratuite. Demandez votre carte de fidélité lors de votre prochaine visite !
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection