@extends('dashPages.default.main')

@section('title')
    Tous les utilisateurs
@endsection

@section('dashContent')

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h3 mb-1">Liste des Utilisateurs</h2>
        </div>
        <a href="{{ route('admin.userResource.create') }}" class="btn btn-primary btn-sm rounded-3 px-3 shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Nouveau
        </a>
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
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 border-bottom text-uppercase"><small>Utilisateur</small></th>
                        <th class="border-0 border-bottom text-uppercase"><small>Téléphone</small></th>
                        <th class="border-0 border-bottom text-uppercase"><small>Rôle</small></th>
                        <th class="border-0 border-bottom text-uppercase"><small>Status</small></th>
                        <th class="border-0 border-bottom text-uppercase"><small>Inscription</small></th>
                        <th class="border-0 border-bottom text-uppercase text-end"><small>Actions</small></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($user->photo)
                                        <img src="{{ asset(Storage::url($user->photo)) }}" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;" alt="">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name . ' ' . $user->last_name) }}&background=random" class="rounded-circle me-3" style="width: 40px; height: 40px;" alt="">
                                    @endif
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $user->first_name }} {{ $user->last_name }}</p>
                                        <span class="text-muted small">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted small">{{ $user->phone }}</span></td>
                            <td>
                                @if($user->is_admin)
                                    <span class="badge bg-soft-primary text-primary border border-primary-subtle rounded-pill px-2">Admin</span>
                                @else
                                    <span class="badge bg-soft-secondary text-secondary border border-secondary-subtle rounded-pill px-2">User</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->is_admin == false)
                                    <form action="{{ route('admin.updateStatusUser', $user->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        @php
                                            $statusClass = match($user->status) {
                                                'Actif' => 'btn-warning',
                                                'En Attente' => 'btn-danger',
                                            };
                                        @endphp
                                        <button type="submit" class="btn btn-sm {{ $statusClass }} fw-semibold text-white rounded-pill px-3 shadow-sm" style="font-size: 0.7rem;">
                                            {{ $user->status }}
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td><span class="text-muted small">{{ $user->created_at->format('d M Y') }}</span></td>
                            <td class="text-end">
                                <button class="btn btn-light btn-sm rounded-circle text-success" data-bs-toggle="modal" data-bs-target="#viewUserModal{{ $user->id }}"><i class="bi bi-eye"></i></button>
                                <a href="{{ route('admin.userResource.edit', $user->id) }}" class="btn btn-light btn-sm rounded-circle text-warning"><i class="bi bi-pencil"></i></a>
                                <button class="btn btn-light btn-sm rounded-circle text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal{{ $user->id }}"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                        {{-- Modal de Vue --}}
                        <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0 justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center pb-4">
                                        <div class="position-relative d-inline-block mb-3">
                                            <img src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->first_name).'&background=0d6efd&color=fff&size=128' }}" 
                                                class="rounded-circle shadow" width="90" height="90" style="object-fit: cover;">
                                        </div>
                                        <h5 class="fw-bold mb-1">{{ $user->first_name }} {{ $user->last_name }}</h5>
                                        <p class="text-muted small mb-3">Membre depuis le {{ $user->created_at->format('d F Y') }}</p>
                                        
                                        <div class="row g-3 text-start bg-light rounded-4 p-3 mx-1">
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-envelope me-1"></i> Email</small>
                                                <span class="fw-semibold small text-truncate d-block">{{ $user->email }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-telephone me-1"></i> Téléphone</small>
                                                <span class="fw-semibold small">{{ $user->phone }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-shield-lock me-1"></i> Rôle</small>
                                                <span class="fw-semibold small">{{ $user->is_admin ? 'Administrateur' : 'Utilisateur' }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-journal-check"></i> Statut</small>
                                                <span class="fw-semibold small">{{ $user->status }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                                        <a href="{{ route('admin.userResource.edit', $user->id) }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                            <i class="bi bi-pencil-square me-2"></i>Modifier le profil
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal de Confirmation Suppression --}}
                        <div class="modal fade" id="deleteConfirmModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-body text-center p-4">
                                        <div class="text-danger mb-3">
                                            <i class="bi bi-exclamation-octagon-fill fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold">Supprimer {{ $user->first_name }} ?</h5>
                                        <p class="small text-muted">Cette action est irréversible.</p>
                                        <div class="d-grid gap-2 mt-4">
                                            <form action="{{ route('admin.userResource.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-3 w-100">Oui, supprimer</button>
                                            </form>
                                            <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-chat-quote fs-2"></i>
                                <p class="mt-2">Aucun Utilisateur enregistré.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
@endsection