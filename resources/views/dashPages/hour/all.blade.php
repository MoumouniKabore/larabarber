@extends('dashPages.default.main')

@section('title')
    All Hour
@endsection

@section('dashContent')

    <h1>All Hour</h1>

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des horaires</h2>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="card shadow-sm border-0 w-50">
            <div class="table-responsive p-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light border-bottom">
                        <tr>
                            <th class="border-0 text-muted text-uppercase"><small>Jours</small></th>
                            <th class="border-0 text-muted text-uppercase"><small>Heure</small></th>
                            <th class="border-0 text-muted text-uppercase"><small>Actions</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="text-muted">Lundi</span></td>
                            <td><span class="fw-semibold">09h00 - 18h00</span></td>
                            <td>
                                <a href="{{ route('edit-hour') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Mardi</span></td>
                            <td><span class="fw-semibold">09h00 - 18h00</span></td>
                            <td>
                                <a href="{{ route('edit-hour') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Mercredi</span></td>
                            <td><span class="fw-semibold">09h00 - 18h00</span></td>
                            <td>
                                <a href="{{ route('edit-hour') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Jeudi</span></td>
                            <td><span class="fw-semibold">09h00 - 18h00</span></td>
                            <td>
                                <a href="{{ route('edit-hour') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Vendredi</span></td>
                            <td><span class="fw-semibold">09h00 - 18h00</span></td>
                            <td>
                                <a href="{{ route('edit-hour') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Samedi</span></td>
                            <td><span class="fw-semibold">Démi-Journée</span></td>
                            <td>
                                <a href="{{ route('edit-hour') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Dimanche</span></td>
                            <td><span class="fw-semibold">Fermé</span></td>
                            <td>
                                <a href="{{ route('edit-hour') }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Modal --}}

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