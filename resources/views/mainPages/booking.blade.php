@extends('mainPages.default.main')

@section('title')
    Page Booking
@endsection

@section('pageContent')

        <!-- Hero Section -->
    <section class="hero-section hero-page" style="background-image: linear-gradient(135deg, rgba(26,26,46,0.95), rgba(26,26,46,0.8)), url({{ asset('pageStyle/images/image16.png') }});">
        <div class="container">
            <div class="text-center">
                <p class="section-subtitle">Prenez RDV</p>
                <h1 class="text-white"><span>Réservation</span> en Ligne</h1>
                <p class="text-white">Réservez votre créneau en quelques clics</p>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-5" role="alert">
            <strong>Succès !</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Booking Section -->
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-subtitle">Reserver votre place</p>
                <h2 class="section-title">Votre <span>Reservation</span></h2>
                
                <div class="section-divider"></div>
            </div>
            <div class="row g-5">
                <!-- Booking Form -->
                <div class="col-lg-7">
                    <div class="booking-form">
                        <h3 class="mb-4">Formulaire de Réservation</h3>
                        <form action="{{ route('admin.storeBooking') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <!-- Personal Info -->
                                <div class="col-12">
                                    <h5 class="text-muted"><i class="bi bi-person me-2"></i>Informations Personnelles</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">Nom *</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Votre nom" required>
                                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Prénom *</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Votre prénom" required>
                                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Téléphone *</label>
                                    <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="+33 6 00 00 00 00" required>
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Service Selection -->
                                <div class="col-12 mt-4">
                                    <h5 class="text-muted"><i class="bi bi-scissors me-2"></i>Choix du Service</h5>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="service" class="form-label">Service *</label>
                                    <select id="service" name="service" class="form-select @error('service') is-invalid @enderror" required>
                                        <option value="">Choisir un service</option>
                                        @foreach(['Classique', 'Premium', 'VIP', 'Coupe Classique', 'Coupe Moderne', 'Taille de Barbe', 'Coupe + Barbe', 'Rasage Traditionnel', 'Coloration', 'Soin Visage', 'Coupe Enfant'] as $topic)
                                            <option value="{{ $topic }}" @selected(old('service') == $topic)>
                                                {{ ucfirst($topic) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('service') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Date & Time -->
                                <div class="col-12">
                                    <h5 class="text-muted"><i class="bi bi-calendar me-2"></i>Date et Heure</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="day" class="form-label">Quand venez-vous ? *</label>
                                    <select id="day" name="day" class="form-select @error('day') is-invalid @enderror" required>
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
                                    <label for="time" class="form-label">Heure *</label>
                                    <select id="time" name="time" class="form-select @error('time') is-invalid @enderror" required>
                                        <option value="">Choisir une heure</option>
                                        @foreach(['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'] as $topic)
                                            <option value="{{ $topic }}" @selected(old('time') == $topic)>
                                                {{ $topic }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Submit -->
                                <div class="col-12">
                                    <button type="submit" class="btn-primary-custom w-100">
                                        <i class="bi bi-check-circle me-2"></i>Confirmer la Réservation
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-5">
                    <!-- Hours -->
                    <div class="hours-card mb-4">
                        <h5 class="mb-3"><i class="bi bi-clock me-2" style="color: var(--secondary);"></i>Horaires</h5>
                        <ul class="hours-list">
                            @forelse ($hours as $hour)
                                <li><span class="day">{{ $hour->day }}</span><span>{{ $hour->time }}</span></li>
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="hours-card mb-4">
                        <h5 class="mb-3"><i class="bi bi-telephone me-2" style="color: var(--secondary);"></i>Contact</h5>
                        <p class="mb-2"><i class="bi bi-geo-alt me-2"></i>123 Rue de la Mode, Paris</p>
                        <p class="mb-2"><i class="bi bi-telephone me-2"></i>+33 1 23 45 67 89</p>
                        <p class="mb-0"><i class="bi bi-envelope me-2"></i>contact@barberking.fr</p>
                    </div>

                    <!-- Note -->
                    <div class="hours-card" style="background: var(--primary); color: var(--white);">
                        <h5 class="mb-3"><i class="bi bi-info-circle me-2" style="color: var(--secondary);"></i>Important</h5>
                        <p class="small mb-2">• Arrivez 5 minutes avant votre RDV</p>
                        <p class="small mb-2">• Annulation gratuite 24h avant</p>
                        <p class="small mb-0">• Paiement sur place (CB/Espèces)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection