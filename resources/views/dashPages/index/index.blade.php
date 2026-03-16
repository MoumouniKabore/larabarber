@extends('dashPages.default.main')

@section('title')
    Dash Index
@endsection

@section('dashContent')

    <div class="mb-4 d-flex align-items-center justify-content-between">
        <div>
            <h2 class="fw-bold h3 mb-1">DASHBOARD</h2>
        </div>
    </div>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm text-center py-3 mt-4 fs-6" role="alert">
            <strong><i class="bi bi-check-circle-fill me-2"></i></strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
@endsection