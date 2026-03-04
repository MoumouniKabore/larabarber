@extends('dashPages.default.main')

@section('title')
    All Booking
@endsection

@section('dashContent')

    <h1>All Booking</h1>

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des Réservation</h2>
        </div>
    </div>

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
                    <tr>
                        <td>
                            <span class="fw-semibold">Alice Doe</span>
                        </td>
                        <td><span class="text-muted small">+33 1 23 45 67 89</span></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-secondary fw-semibold text-white rounded-pill px-3 fw-semibold shadow-sm" style="font-size: 0.75rem;">
                                Rasage
                            </button>
                        </td>
                        <td><span class="text-muted small">Mardi</span></td>
                        <td><span class="text-muted small">14h30</span></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-warning fw-semibold text-white rounded-pill px-3 shadow-sm" style="font-size: 0.75rem;">
                                <i class="bi bi-eye me-1"></i> J'ai Vu
                            </button>
                            <button type="submit" class="btn btn-sm btn-danger fw-semibold rounded-pill px-3" style="font-size: 0.75rem;">
                                <i class="bi bi-eye-slash me-1"></i> Pas Encore Vu
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-light btn-sm rounded-circle text-success" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-light btn-sm rounded-circle text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="viewUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 pb-0 justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body text-center pb-4">
                    
                    <h5 class="fw-bold mb-1">Alice Doe</h5>
                    <p class="text-muted small mb-3">Membre depuis le 12 Février 2024</p>
                    <button type="submit" class="btn btn-sm btn-warning fw-semibold text-white rounded-pill px-3 shadow-sm" style="font-size: 0.75rem;">
                        <i class="bi bi-eye me-1"></i> J'ai Vu
                    </button>
                    <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3" style="font-size: 0.75rem;">
                        <i class="bi bi-eye-slash me-1"></i> Pas Encore Vu
                    </button>
                    
                    <div class="row g-3 text-start bg-light rounded-4 p-3 mx-1">
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-telephone me-1"></i> Téléphone</small>
                            <span class="fw-semibold small">+224 25 56 32 65</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-shield-lock me-1"></i> Service</small>
                            <span class="fw-semibold small">Rasage</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-envelope me-1"></i> Jour</small>
                            <span class="fw-semibold small">Jeudi</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-clock-history me-1"></i> Heure</small>
                            <span class="fw-semibold small">08h00</span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                    <button type="button" class="btn btn-light rounded-3 px-4 me-2" data-bs-dismiss="modal">Fermer</button>
                    <a href="header-dash-edit.html" class="btn btn-primary rounded-3 px-4 shadow-sm">
                        <i class="bi bi-pencil-square me-2"></i>Modifier le profil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-body text-center p-4">
                    <div class="text-danger mb-3">
                        <i class="bi bi-exclamation-octagon-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold">Êtes-vous sûr ?</h5>
                    <div class="d-grid gap-2 mt-4">
                        <button type="button" class="btn btn-danger rounded-3" data-bs-dismiss="modal">Oui, supprimer</button>
                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection