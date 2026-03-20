@extends('dashPages.default.main')

@section('title')
    All Message
@endsection

@section('dashContent')

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des Utilisateurs</h2>
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
                        <th class="border-0 text-muted text-uppercase"><small>Objet</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Message</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Status</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Actions</small></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse($messages as $message)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $message->first_name }} {{ $message->last_name }}</p>
                                        <span class="text-muted small">{{ $message->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted small">{{ $message->phone }}</span></td>
                            <td>
                                <span class="badge bg-secondary rounded-pill px-2 py-1 shadow-sm" style="font-size: 0.75rem;">
                                    {{ $message->subject }}
                                </span>
                            </td>
                            <td><span class="text-muted small" title="{{ $message->message }}">{{ Str::limit($message->message, 30) }}</span></td>
                            <td>
                                {{-- On utilise match pour déterminer la classe CSS du bouton --}}
                                @php
                                    $statusColor = match($message->status) {
                                        'Pas Encore Vu' => 'danger',
                                        'Répondu' => 'warning',
                                    };
                                @endphp

                                {{-- Formulaire pour mettre à jour le statut au clic --}}
                                <form action="{{ route('admin.updateStatusMessage', $message->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-{{ $statusColor }} fw-semibold text-white rounded-2 px-3 shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Changer le statut" style="font-size: 0.75rem;">
                                        {{ $message->status }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                {{-- Boutons Actions (Ciblage de la modale unique avec ID) --}}
                                <button class="btn btn-light btn-sm rounded-circle text-success" data-bs-toggle="modal" data-bs-target="#viewUserModal-{{ $message->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @can('delete', $message)
                                    <button class="btn btn-light btn-sm rounded-circle text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal-{{ $message->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>                                    
                                @endcan
                            </td>
                        </tr>

                        <div class="modal fade" id="viewUserModal-{{ $message->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0 justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body text-center pb-4">
                                        <h5 class="fw-bold mb-1">{{ $message->first_name }} {{ $message->last_name }}</h5>
                                        <p class="text-muted small mb-3">Reçu le {{ $message->created_at->format('d/m/Y') }}</p>
                                        
                                        <span class="btn btn-sm btn-{{ $statusColor }} fw-semibold text-white rounded-pill px-3 shadow-sm" style="font-size: 0.75rem;">
                                            {{ $message->status }}
                                        </span>
                                        
                                        <div class="row g-3 text-start bg-light rounded-4 p-3 mx-1 mt-3">
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-shield-lock me-1"></i> Téléphone</small>
                                                <span class="fw-semibold small">{{ $message->phone }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-envelope me-1"></i> Email</small>
                                                <span class="fw-semibold small">{{ $message->email }}</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block"><i class="bi bi-bookmark me-1"></i> Sujet</small>
                                                <span class="fw-semibold small">{{ $message->subject }}</span>
                                            </div>
                                            <div class="col-12">
                                                <small class="text-muted d-block"><i class="bi bi-chat-left-text me-1"></i> Message</small>
                                                <span class="fw-semibold small">
                                                    {{ $message->message }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                                        <button type="button" class="btn btn-light rounded-3 px-4 me-2" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteConfirmModal-{{ $message->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-body text-center p-4">
                                        <div class="text-danger mb-3">
                                            <i class="bi bi-exclamation-octagon-fill fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold">Êtes-vous sûr ?</h5>
                                        <p class="text-muted small">Cette action est irréversible. Le message de {{ $message->first_name }} sera effacé.</p>
                                        
                                        {{-- FORMULAIRE DE SUPPRESSION --}}
                                        <form action="{{ route('admin.destroyMessage', $message->id) }}" method="POST" class="d-grid gap-2 mt-4">
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
                                <i class="bi bi-inbox fs-2"></i>
                                <p class="mt-2">Aucun message pour le moment.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
@endsection