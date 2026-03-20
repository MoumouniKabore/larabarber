@extends('dashPages.default.main')

@section('title')
    All Barber
@endsection

@section('dashContent')

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des Coiffeurs</h2>
        </div>
        @can('create', App\Models\Barber::class)
            <a href="{{ route('admin.barberResource.create') }}" class="btn btn-primary btn-sm rounded-3 px-3 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Nouveau
            </a>
        @endcan
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
                        <th class="border-0 text-uppercase"><small>Coiffeurs</small></th>
                        <th class="border-0 text-uppercase"><small>Téléphone</small></th>
                        <th class="border-0 text-uppercase"><small>Fonction</small></th>
                        <th class="border-0 text-uppercase"><small>Date d'arrivée</small></th>
                        <th class="border-0 text-uppercase"><small>Statut</small></th>
                        <th class="border-0 text-uppercase"><small>Actions</small></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barbers as $barber)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($barber->photo)
                                        <img src="{{ asset(Storage::url($barber->photo)) }}" class="rounded-circle me-3 shadow-sm" width="40" height="40" style="object-fit: cover;">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($barber->first_name . ' ' . $barber->last_name) }}&background=random" class="rounded-circle me-3 shadow-sm" width="40" height="40">
                                    @endif
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $barber->first_name }} {{ $barber->last_name }}</p>
                                        <span class="text-muted small">{{ $barber->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted small">{{ $barber->phone }}</span></td>
                            <td>
                                <span class="badge bg-secondary fw-semibold text-white rounded-pill px-3 py-2 shadow-sm" style="font-size: 0.75rem;">
                                    {{ $barber->fonction ?? 'Coiffeur' }}
                                </span>
                            </td>
                            <td><span class="text-muted small">{{ $barber->created_at->format('d M Y') }}</span></td>
                            <td>
                                @php
                                    $statusColor = match($barber->status) {
                                        'Actif' => 'warning',
                                        'Dispensée' => 'danger',
                                    };
                                @endphp
                                @can('update', $barber)
                                    <form action="{{ route('admin.updateStatusBarber', $barber->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-{{ $barber->status == 'Actif' ? 'warning' : 'danger' }} rounded-pill px-3 shadow-sm">
                                            {{ $barber->status }}
                                        </button>
                                    </form>
                                @else
                                    <span class="badge bg-{{ $barber->status == 'Actif' ? 'warning' : 'danger' }} rounded-pill px-3 py-2">
                                        {{ $barber->status }}
                                    </span>
                                @endcan
                            </td>
                            <td>
                                <button class="btn btn-light btn-sm rounded-circle text-success shadow-sm" data-bs-toggle="modal" data-bs-target="#viewBarberModal-{{ $barber->id }}"><i class="bi bi-eye"></i></button>
                                @can('update', $barber)
                                    <a href="{{ route('admin.barberResource.edit', $barber->id) }}" class="btn btn-light btn-sm rounded-circle text-warning shadow-sm"><i class="bi bi-pencil"></i></a>
                                @endcan
                                @can('delete', $barber)
                                    <button class="btn btn-light btn-sm rounded-circle text-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteBarberModal-{{ $barber->id }}"><i class="bi bi-trash"></i></button>
                                @endcan
                            </td>
                        </tr>

                        {{-- Modal Détails --}}
                        <div class="modal fade" id="viewBarberModal-{{ $barber->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0 justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center pb-4">
                                        <div class="position-relative d-inline-block mb-3">
                                            @if($barber->photo)
                                                <img src="{{ asset(Storage::url($barber->photo)) }}" class="rounded-circle shadow" width="90" height="90" style="object-fit: cover;">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($barber->first_name . ' ' . $barber->last_name) }}&background=0d6efd&color=fff&size=128" class="rounded-circle shadow" width="90" height="90">
                                            @endif
                                            <span class="position-absolute bottom-0 end-0 p-1 bg-{{ $barber->status == 'Actif' ? 'success' : 'danger' }} border border-2 border-white rounded-circle"></span>
                                        </div>
                                        
                                        <h5 class="fw-bold mb-1">{{ $barber->first_name }} {{ $barber->last_name }}</h5>
                                        <p class="text-muted small mb-3">Coiffeur depuis le {{ $barber->created_at->format('d F Y') }}</p>
                                        
                                        <div class="row g-3 text-start bg-light rounded-4 p-3 mx-1">
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-envelope me-1"></i> Email</small>
                                                <span class="fw-semibold small text-break">{{ $barber->email }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-telephone me-1"></i> Téléphone</small>
                                                <span class="fw-semibold small">{{ $barber->phone }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-scissors me-1"></i> Fonction</small>
                                                <span class="fw-semibold small">{{ $barber->fonction ?? 'Coiffeur' }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-geo-alt me-1"></i> Adresse</small>
                                                <span class="fw-semibold small">{{ $barber->address ?? 'Non renseignée' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                                        <button type="button" class="btn btn-light rounded-3 px-4 me-2" data-bs-dismiss="modal">Fermer</button>
                                        @can('update', $barber)
                                            <a href="{{ route('admin.barberResource.edit', $barber->id) }}" class="btn btn-primary rounded-3 px-4 shadow-sm">
                                                <i class="bi bi-pencil-square me-2"></i>Modifier
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Suppression --}}
                        <div class="modal fade" id="deleteBarberModal-{{ $barber->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-body text-center p-4">
                                        <div class="text-danger mb-3">
                                            <i class="bi bi-exclamation-octagon-fill fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold">Supprimer ?</h5>
                                        <p class="text-muted small">Voulez-vous vraiment supprimer le compte de {{ $barber->first_name }} ?</p>
                                        <form action="{{ route('admin.barberResource.destroy', $barber->id) }}" method="POST" class="d-grid gap-2 mt-4">
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
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-chat-quote fs-2"></i>
                                <p class="mt-2">Aucun coiffeur enregistré.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection