@extends('dashPages.default.main')

@section('title', 'Tableau de Bord')

@section('dashContent')

    <div class="mb-4">
        <h2 class="fw-bold h4 mb-1">Tableau de Bord</h2>
        <p class="text-muted small">Bienvenue, {{ auth()->user()->first_name }}. Voici un aperçu de votre activité.</p>
    </div>

    <div class="row g-3 mb-4">
        {{-- Card Clients --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-3">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0 small">Clients</h6>
                        <span class="fw-bold h5">{{ $userCount }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Coiffeurs --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-circle me-3">
                        <i class="bi bi-scissors fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0 small">Coiffeurs</h6>
                        <span class="fw-bold h5">{{ $barberCount }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Réservations --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle me-3">
                        <i class="bi bi-calendar-check fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0 small">Réservations</h6>
                        <span class="fw-bold h5">{{ $bookingCount }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Avis --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-info bg-opacity-10 text-info p-3 rounded-circle me-3">
                        <i class="bi bi-star fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0 small">Témoignages</h6>
                        <span class="fw-bold h5">{{ $totalTestimonies }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Réservations Récentes</h5>
                    <a href="{{ route('admin.allBooking') }}" class="btn btn-light btn-sm rounded-pill text-primary fw-semibold">Voir tout</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light small">
                            <tr>
                                <th>Client</th>
                                <th>Coiffeur</th>
                                <th>Heure</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendingBookings as $booking)
                                <tr>
                                    <td class="small fw-semibold">{{ $booking->user->first_name }}</td>
                                    <td class="small">{{ $booking->barber->first_name }}</td>
                                    <td class="small text-muted">{{ $booking->hour->time ?? '10:00' }}</td>
                                    <td><span class="badge bg-soft-warning text-warning rounded-pill px-2">En attente</span></td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted small py-3">Aucune réservation.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">Nouveaux Messages</h5>
                </div>
                <div class="card-body p-3">
                    @forelse($recentMessages as $message)
                        <div class="d-flex align-items-start mb-3 border-bottom pb-2">
                            <div class="bg-light p-2 rounded-3 me-3 text-secondary">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <div class="overflow-hidden">
                                <p class="mb-0 fw-semibold small">{{ $message->name }}</p>
                                <p class="text-muted small text-truncate mb-0">{{ $message->content }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted small py-4">Boîte de réception vide.</p>
                    @endforelse
                    <a href="{{ route('admin.allMessage') }}" class="btn btn-outline-primary w-100 btn-sm rounded-3 mt-2">Accéder à la messagerie</a>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    .bg-soft-warning { background-color: #fff3cd; }
    .card { transition: transform 0.2s ease; }
    .card:hover { transform: translateY(-3px); }
</style>