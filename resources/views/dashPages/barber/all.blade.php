@extends('dashPages.default.main')

@section('title')
    All Barber
@endsection

@section('dashContent')

    <h1>All Barber</h1>

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des Coiffeurs</h2>
        </div>
        <a href="{{ route('add-barber') }}" class="btn btn-primary btn-sm rounded-3 px-3 shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Nouveau
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive p-3">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light border-bottom">
                    <tr>
                        <th class="border-0 text-uppercase"><small>Coiffeurs</small></th>
                        <th class="border-0 text-uppercase"><small>Téléphone</small></th>
                        <th class="border-0 text-uppercase"><small>Fonction</small></th>
                        <th class="border-0 text-uppercase"><small>Date d'inscription</small></th>
                        <th class="border-0 text-uppercase"><small>Statut</small></th>
                        <th class="border-0 text-uppercase"><small>Actions</small></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=Alice+Doe&background=random" class="user-avatar me-3" alt="">
                                <div>
                                    <p class="mb-0 fw-semibold">Alice Doe</p>
                                    <span class="text-muted small">alice@example.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-muted small">+33 1 23 45 67 89</span></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-secondary fw-semibold text-white rounded-pill px-3 shadow-sm" style="font-size: 0.75rem;">
                                Coiffeur
                            </button>
                        </td>
                        <td><span class="text-muted small">12 Fév 2024</span></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-warning fw-semibold text-white rounded-pill px-3 shadow-sm" style="font-size: 0.75rem;">
                                Actif
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-light btn-sm rounded-circle text-success" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bi bi-eye"></i></button>
                            <a href="{{ route('edit-barber') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
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
                    <div class="position-relative d-inline-block mb-3">
                        <img src="https://ui-avatars.com/api/?name=Alice+Doe&background=0d6efd&color=fff&size=128" 
                            class="rounded-circle shadow" width="90" height="90" alt="Avatar">
                        <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-2 border-white rounded-circle">
                            <span class="visually-hidden">En ligne</span>
                        </span>
                    </div>
                    
                    <h5 class="fw-bold mb-1">Alice Doe</h5>
                    <p class="text-muted small mb-3">Membre depuis le 12 Février 2024</p>
                    <button type="submit" class="btn btn-sm btn-warning fw-semibold text-white rounded-pill px-3 shadow-sm" style="font-size: 0.75rem;">
                        Actif
                    </button>
                    
                    <div class="row g-3 text-start bg-light rounded-4 p-3 mx-1">
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-envelope me-1"></i> Email</small>
                            <span class="fw-semibold small">alice@example.com</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-telephone me-1"></i> Téléphone</small>
                            <span class="fw-semibold small">+33 6 12 34 56 78</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-journal-check"></i> Status</small>
                            <span class="fw-semibold small">Présent</span> |
                            <span class="fw-semibold small">Absent</span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block"><i class="bi bi-scissors"></i> Fonction</small>
                            <span class="fw-semibold small">Coiffeur</span>
                        </div>
                        <div class="col-12">
                            <small class="text-muted d-block"><i class="bi bi-telephone me-1"></i> Adresse</small>
                            <span class="fw-semibold small">123 Rue de la Paix, 75000 Paris</span>
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