@extends('dashPages.default.main')

@section('title')
    Add utilisateurs
@endsection

@section('dashContent')

    <h1>Add utilisateurs</h1>
    
    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Ajouter un Utilisateur</h2>
        </div>
        <a href="{{ route('all-user') }}" class="btn btn-danger btn-sm rounded-3 px-3 shadow-sm">
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
                            <label for="last_name" class="form-label fw-semibold">Nom</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Ex: Jean" required>
                        </div>
                        <div class="col-md-6">
                            <label for="first_name" class="form-label fw-semibold">Prénom</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Ex: Dupont" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">Téléphone</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+33 6 ..." required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="jean@exemple.com" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmer le mot de passe" required>
                        </div>
                        <div class="col-md-12">
                            <label for="photo" class="form-label fw-semibold">Photo de profil</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('all-user') }}" type="button" class="btn btn-light px-4 rounded-3">Annuler</a>
                                <button type="submit" class="btn btn-primary px-4 rounded-3">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection