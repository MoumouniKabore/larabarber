@extends('dashPages.default.main')

@section('title')
    Add Barber
@endsection

@section('dashContent')

    <h1>Add Barber</h1>
    
    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Ajouter un coiffeur</h2>
        </div>
        <a href="{{ route('all-barber') }}" class="btn btn-danger btn-sm rounded-3 px-3 shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Retour
        </a>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-lg-8">
            <div class="card p-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label fw-semibold">Prénom</label>
                            <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Ex: Jean" required>
                            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label fw-semibold">Nom complet</label>
                            <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Ex: Jean Dupont" required>
                            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">Téléphone</label>
                            <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="+33 6 ..." required>
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Adresse Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="jean@exemple.com" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label fw-semibold">Adresse</label>
                            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Ex: 123 Rue de la Paix" required>
                            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="fonction" class="form-label fw-semibold">Fonction</label>
                            <input type="text" id="fonction" name="fonction" class="form-control @error('fonction') is-invalid @enderror" placeholder="Ex: Coiffeur" required>
                            @error('fonction') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="photo" class="form-label fw-semibold">Ajouter une Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" accept=".jpg, .png, .jpeg" required>
                            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('all-barber') }}" type="button" class="btn btn-light px-4 rounded-3">Annuler</a>
                                <button type="submit" class="btn btn-primary px-4 rounded-3">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection