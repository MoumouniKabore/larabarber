@extends('dashPages.default.main')

@section('title')
    All Booking
@endsection

@section('dashContent')

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des Réservations</h2>
        </div>
    </div>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-6" role="alert">
            <strong><i class="bi bi-check-circle-fill me-2"></i></strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive p-3">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light border-bottom">
                    <tr>
                        <th class="border-0 text-muted text-uppercase"><small>Utilisateur</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Téléphone</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Service</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Jours</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Heure</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Status</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Actions</small></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td><span class="fw-semibold">{{ $booking->first_name }} {{ $booking->last_name }}</span></td>
                            <td><span class="text-muted small">{{ $booking->phone }}</span></td>
                            <td>
                                <span class="badge bg-secondary rounded-pill px-3 py-2 fw-semibold shadow-sm" style="font-size: 0.75rem;">
                                    {{ $booking->service }}
                                </span>
                            </td>
                            <td><span class="text-muted small">{{ $booking->day }}</span></td>
                            <td><span class="text-muted small">{{ $booking->time }}</span></td>
                            <td>
                                @php
                                    $statusColor = match($booking->status) {
                                        "Pas Encore Vu" => 'danger',
                                        "Répondu" => 'warning',
                                    };
                                @endphp
                                <form action="{{ route('admin.updateStatusBooking', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-{{ $statusColor }} fw-semibold text-white rounded-pill px-3 shadow-sm" 
                                            style="font-size: 0.75rem;" data-bs-toggle="tooltip" title="Changer le statut">
                                        <i class="bi {{ $booking->status == 'Répondu' ? 'bi-eye' : 'bi-eye-slash' }} me-1"></i>
                                        {{ $booking->status }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-light btn-sm rounded-circle text-success" data-bs-toggle="modal" data-bs-target="#viewBookingModal-{{ $booking->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-light btn-sm rounded-circle text-danger" data-bs-toggle="modal" data-bs-target="#deleteBookingModal-{{ $booking->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Détails --}}
                        <div class="modal fade" id="viewBookingModal-{{ $booking->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0 justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center pb-4">
                                        <h5 class="fw-bold mb-1">{{ $booking->first_name }} {{ $booking->last_name }}</h5>
                                        <p class="text-muted small mb-3">Réservation reçue le {{ $booking->created_at->format('d/m/Y') }}</p>
                                        
                                        <span class="badge bg-{{ $statusColor }} rounded-pill px-3 py-2 mb-3">
                                            {{ $booking->status }}
                                        </span>

                                        <div class="row g-3 text-start bg-light rounded-4 p-3 mx-1">
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-telephone me-1"></i> Téléphone</small>
                                                <span class="fw-semibold small">{{ $booking->phone }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-scissors me-1"></i> Service</small>
                                                <span class="fw-semibold small">{{ $booking->service }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-calendar-event me-1"></i> Jour</small>
                                                <span class="fw-semibold small">{{ $booking->day }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-clock me-1"></i> Heure</small>
                                                <span class="fw-semibold small">{{ $booking->time }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                                        <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Suppression --}}
                        <div class="modal fade" id="deleteBookingModal-{{ $booking->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-body text-center p-4">
                                        <div class="text-danger mb-3">
                                            <i class="bi bi-exclamation-octagon-fill fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold">Supprimer ?</h5>
                                        <p class="text-muted small">Voulez-vous vraiment supprimer la réservation de {{ $booking->first_name }} ?</p>
                                        <form action="{{ route('admin.destroyBooking', $booking->id) }}" method="POST" class="d-grid gap-2 mt-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-3">Oui, supprimer</button>
                                            <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Annuler</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-2"></i>
                                <p class="mt-2">Aucune réservation trouvée.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection