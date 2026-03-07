@extends('dashPages.default.main')

@section('title')
    All Hour
@endsection

@section('dashContent')

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des horaires</h2>
        </div>
    </div>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-6" role="alert">
            <strong><i class="bi bi-check-circle-fill me-2"></i></strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="card shadow-sm border-0 w-50"> {{-- Augmenté un peu la largeur pour le confort --}}
            <div class="table-responsive p-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light border-bottom">
                        <tr>
                            <th class="border-0 text-muted text-uppercase"><small>Jours</small></th>
                            <th class="border-0 text-muted text-uppercase"><small>Heure</small></th>
                            <th class="border-0 text-muted text-uppercase text-end"><small>Actions</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hours as $hour)
                        <tr>
                            <td><span class="text-muted">{{ $hour->day }}</span></td>
                            <td>
                                <span class="badge {{ $hour->time == 'Fermé' ? 'bg-light text-danger' : 'bg-light text-primary' }} fw-bold px-3 py-2">
                                    {{ $hour->time }}
                                </span>
                            </td>
                            <td class="text-end">
                                {{-- Le bouton déclenche la modale spécifique à l'ID --}}
                                <button class="btn btn-light btn-sm rounded-circle text-warning shadow-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editHourModal-{{ $hour->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="editHourModal-{{ $hour->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0 justify-content-between">
                                        <h5 class="fw-bold mt-2 ms-2">Modifier l'horaire</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body p-4">
                                        <form action="{{ route('updateHour', $hour->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label small fw-bold text-muted">Jour</label>
                                                    <input type="text" class="form-control bg-light border-0 fw-bold" value="{{ $hour->day }}" readonly>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <label class="form-label small fw-bold text-muted">Plage Horaire</label>
                                                    <select name="time" class="form-select rounded-3 p-2 border-primary text-primary fw-bold">
                                                        <option value="08h00 - 18h00" {{ $hour->time == '08h00 - 18h00' ? 'selected' : '' }}>08h00 - 18h00</option>
                                                        <option value="08h00 - 19h00" {{ $hour->time == '08h00 - 19h00' ? 'selected' : '' }}>08h00 - 19h00</option>
                                                        <option value="08h00 - 20h00" {{ $hour->time == '08h00 - 20h00' ? 'selected' : '' }}>08h00 - 20h00</option>
                                                        <option value="09h00 - 18h00" {{ $hour->time == '09h00 - 18h00' ? 'selected' : '' }}>09h00 - 18h00</option>
                                                        <option value="09h00 - 19h00" {{ $hour->time == '09h00 - 19h00' ? 'selected' : '' }}>09h00 - 19h00</option>
                                                        <option value="09h00 - 20h00" {{ $hour->time == '09h00 - 20h00' ? 'selected' : '' }}>09h00 - 20h00</option>
                                                        <option value="Démi-journée" {{ $hour->time == 'Démi-journée' ? 'selected' : '' }}>Démi-journée</option>
                                                        <option value="Fermé" {{ $hour->time == 'Fermé' ? 'selected' : '' }}>Fermé</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 mt-4">
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-primary rounded-3 shadow-sm">
                                                            Enregistrer les modifications
                                                        </button>
                                                        <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection