@extends('dashPages.default.main')

@section('title')
    All Testimonies
@endsection

@section('dashContent')

    {{-- Message de succès --}}
    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-6" role="alert">
            <strong><i class="bi bi-check-circle-fill me-2"></i></strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Liste des Témoignages</h2>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive p-3">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light border-bottom">
                    <tr>
                        <th class="border-0 text-muted text-uppercase"><small>Utilisateur</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Message</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Statut</small></th>
                        <th class="border-0 text-muted text-uppercase"><small>Actions</small></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse($testimonies as $testimonie)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- Avatar dynamique --}}
                                    @if($testimonie->avatar)
                                        {{-- L'image existe en base --}}
                                        <img src="{{ asset('storage/' . $testimonie->avatar) }}" 
                                            class="rounded-circle me-3 shadow-sm" 
                                            width="40" height="40" alt="{{ $testimonie->name }}">
                                        @else
                                            {{-- Image par défaut si pas d'avatar --}}
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonie->name) }}&background=random" 
                                                class="rounded-circle me-3 shadow-sm" 
                                                width="40" height="40" alt="{{ $testimonie->name }}">
                                        @endif
                                    <div>
                                        <p class="mb-0 fw-semibold">{{ $testimonie->first_name }} {{ $testimonie->last_name }}</p>
                                    </div>
                                </div>
                            </td>
                            
                            {{-- Message limité --}}
                            <td><span class="text-muted small" title="{{ $testimonie->message }}">{{ Str::limit($testimonie->message, 30) }}</span></td>
                            
                            <td>
                                {{-- On utilise match pour déterminer la classe CSS du bouton --}}
                                @php
                                    $statusColor = match($testimonie->status) {
                                        'Pas Encore Publié' => 'danger',
                                        'Publié' => 'warning',
                                    };
                                @endphp

                                {{-- Formulaire pour mettre à jour le statut au clic --}}
                                <form action="{{ route('updateStatus', $testimonie->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-{{ $statusColor }} fw-semibold text-white rounded-2 px-3 shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Changer le statut" style="font-size: 0.75rem;">
                                        {{ $testimonie->status }}
                                    </button>
                                </form>
                            </td>
                            
                            <td>
                                {{-- Boutons avec IDs uniques --}}
                                <button class="btn btn-light btn-sm rounded-circle text-success" data-bs-toggle="modal" data-bs-target="#viewTestimonyModal-{{ $testimonie->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-light btn-sm rounded-circle text-danger" data-bs-toggle="modal" data-bs-target="#deleteTestimonyModal-{{ $testimonie->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="viewTestimonyModal-{{ $testimonie->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0 justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body text-center pb-4">
                                        <div class="position-relative d-inline-block mb-3">
                                            @if($testimonie->avatar)
                                                {{-- L'image existe en base --}}
                                                <img src="{{ asset('storage/' . $testimonie->avatar) }}" 
                                                    class="rounded-circle me-3 shadow-sm" 
                                                    width="90" height="90" alt="{{ $testimonie->name }}">
                                            @else
                                                {{-- Image par défaut si pas d'avatar --}}
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonie->name) }}&background=random" 
                                                    class="rounded-circle me-3 shadow-sm" 
                                                    width="90" height="90" alt="{{ $testimonie->name }}">
                                            @endif
                                        </div>
                                        
                                        <h5 class="fw-bold mb-1">{{ $testimonie->first_name }} {{ $testimonie->last_name }}</h5>
                                        <p class="text-muted small mb-3">Reçu le {{ $testimonie->created_at->format('d F Y') }}</p>
                                        
                                        {{-- Répétition des boutons de statut pour le changement rapide --}}
                                        @if($testimonie->status == 'Publié')
                                            <span class="badge bg-warning text-white rounded-pill px-3 py-2">
                                                <i class="bi bi-globe me-1"></i> Publié
                                            </span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-3 py-2">
                                                <i class="bi bi-eye-slash me-1"></i> Pas Encore Publié
                                            </span>
                                        @endif
                                        
                                        <div class="row g-3 text-start bg-light rounded-4 p-3 mx-1 mt-3">
                                            <div class="col-12">
                                                <small class="text-muted d-block"><i class="bi bi-chat-left-text me-1"></i> Message</small>
                                                <p class="fw-semibold small p-2 rounded-3">
                                                    {{ $testimonie->message }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                                        <button type="button" class="btn btn-light rounded-3 px-4 me-2" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteTestimonyModal-{{ $testimonie->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-body text-center p-4">
                                        <div class="text-danger mb-3">
                                            <i class="bi bi-exclamation-octagon-fill fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold">Êtes-vous sûr ?</h5>
                                        <p class="text-muted small">Cette action supprimera le témoignage de {{ $testimonie->name }}.</p>
                                        
                                        <form action="{{ route('destroyTestimonie', $testimonie->id) }}" method="POST" class="d-grid gap-2 mt-4">
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
                            <td colspan="4" class="text-center py-4 text-muted">
                                <i class="bi bi-chat-quote fs-2"></i>
                                <p class="mt-2">Aucun témoignage pour le moment.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
@endsection