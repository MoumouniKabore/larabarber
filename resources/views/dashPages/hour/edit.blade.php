{{-- @extends('dashPages.default.main')

@section('title')
    Edit Hour
@endsection

@section('dashContent')

    <h1>Edit Hour</h1>

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h4 mb-1">Modifier une Heure</h2>
        </div>
        <a href="{{ route('all-hour') }}" class="btn btn-danger btn-sm rounded-3 px-3 shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Retour
        </a>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-lg-8">
            <div class="card p-4">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Jours</label>
                            <input type="text" name="day" class="form-control" value="Lundi" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Heure</label>
                            <select name="time" class="form-select rounded-3 p-2 border-success text-success fw-bold @error('time') is-invalid @enderror">
                                <option value="BD">BD</option>
                                <option value="08h00 - 18h00">08h00 - 18h00</option>
                                <option value="08h00 - 19h00">08h00 - 19h00</option>
                                <option value="08h00 - 20h00">08h00 - 20h00</option>
                                <option value="09h00 - 18h00">09h00 - 18h00</option>
                                <option value="09h00 - 19h00">09h00 - 19h00</option>
                                <option value="12h35 - 21h35">09h00 - 20h00</option>
                                <option value="Démi-journée">Démi-journée</option>
                                <option value="Fermé">Fermé</option>
                            </select>
                            @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('all-hour') }}" type="button" class="btn btn-light px-4 rounded-3">Annuler</a>
                                <button type="submit" class="btn btn-primary px-4 rounded-3">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection --}}