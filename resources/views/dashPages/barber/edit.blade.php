@extends('dashPages.default.main')

@section('title')
    Edit Barber
@endsection

@section('dashContent')

    <h1>Edit Barber</h1>

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Modifier un Coiffeurs</h2>
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
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="last_name" class="form-label fw-semibold">Nom complet</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Ex: Jean Dupont">
                        </div>
                        <div class="col-md-6">
                            <label for="first_name" class="form-label fw-semibold">Prénom</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Ex: Jean">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">Téléphone</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+33 6 ...">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Adresse Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="jean@exemple.com">
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label fw-semibold">Adresse</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Ex: 123 Rue de la Paix">
                        </div>
                        <div class="col-md-6">
                            <label for="fonction" class="form-label fw-semibold">Fonction</label>
                            <input type="text" id="fonction" name="fonction" class="form-control" placeholder="Ex: Coiffeur">
                        </div>
                        <div class="col-md-12">
                            <label for="photo" class="form-label fw-semibold">Ajouter une Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept=".jpg, .png, .jpeg">
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('all-barber') }}" type="button" class="btn btn-light px-4 rounded-3">Annuler</a>
                                <button type="submit" class="btn btn-primary px-4 rounded-3">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection