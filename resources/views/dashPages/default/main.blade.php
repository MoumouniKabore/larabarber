<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('dashStyle/css/style.css') }}">

        <style>
            :root {
                --sidebar-width: 260px;
            }
            body {
                font-family: 'Inter', sans-serif; background-color: #f1f5f9;
            }
            
            @media (min-width: 992px) {
                .sidebar { width: var(--sidebar-width); height: 100vh; position: fixed; top: 0; left: 0; }
                .main-content { margin-left: var(--sidebar-width); }
            }

            .nav-link {
                color: #64748b;
                transition: 0.3s;
                border-radius: 10px;
                margin: 2px 15px;
            }
            .nav-link:hover, .nav-link.active {
                background: #e2e8f0;
                color: #0d6efd;
            }
            .nav-link.logout {
                margin-top: auto;
            }
            
            .search-input {
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 10px;
            }
            .card {
                border-radius: 16px;
                border: none;
                box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            }

            /* Style pour la liste */
            .user-avatar {
                width: 35px;
                height: 35px;
                object-fit: cover;
                border-radius: 50%;
            }
            .status-badge {
                font-size: 0.75rem;
                padding: 0.35em 0.65em;
                border-radius: 50rem;
            }
        </style>
    </head>
    <body>

        <nav class="sidebar d-none d-lg-flex flex-column bg-white border-end py-3">
            <div class="px-4 mb-4">
                <span class="h4 fw-bold text-primary"><i class="bi bi-cpu-fill me-2"></i>NEXUS</span>
            </div>
            <div class="nav flex-column h-100">
                <a href="{{ route('admin.dashboardIndex') }}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboardIndex') active  @endif"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                @can('viewAny', App\Models\User::class)
                    <a href="{{ route('admin.userResource.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.userResource.index') active  @endif"><i class="bi bi-person-check"></i> Utilisateurs</a>                    
                @endcan
                <a href="{{ route('admin.barberResource.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.admin.barberResource.index') active  @endif"><i class="bi bi-person-badge"></i> Coiffeurs</a>
                <a href="{{ route('admin.allHour') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allHour') active  @endif"><i class="bi bi-clock-history"></i> Heures Ouverture</a>
                <a href="{{ route('admin.allBooking') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allBooking') active  @endif"><i class="bi bi-calendar-check"></i> Réservation</a>
                <a href="{{ route('admin.allTestimonie') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allTestimonie') active  @endif"><i class="bi bi-star-fill"></i> Avis Clients</a>
                <a href="{{ route('admin.allMessage') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allMessage') active  @endif"><i class="bi bi-envelope-paper"></i> Messages</a>
                
                <div class="mt-auto px-3">
                    <button class="btn btn-danger w-100 border-0 rounded-3" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                    </button>
                </div>
            </div>
        </nav>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" style="width: 280px;">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title fw-bold text-primary"><i class="bi bi-cpu-fill me-2"></i>NEXUS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body p-0 py-3">
                <div class="nav flex-column h-100">
                    <a href="{{ route('admin.dashboardIndex') }}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboardIndex') active  @endif"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                    @can('viewAny', App\Models\User::class)
                        <a href="{{ route('admin.userResource.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.userResource.index') active  @endif"><i class="bi bi-person-check"></i> Utilisateurs</a>
                    @endcan
                    <a href="{{ route('admin.barberResource.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.barberResource.index') active  @endif"><i class="bi bi-person-badge"></i> Coiffeurs</a>
                    <a href="{{ route('admin.allHour') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allHour') active  @endif"><i class="bi bi-clock-history"></i> Heures Ouverture</a>
                    <a href="{{ route('admin.allBooking') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allBooking') active  @endif"><i class="bi bi-calendar-check"></i> Réservation</a>
                    <a href="{{ route('admin.allTestimonie') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allTestimonie') active  @endif"><i class="bi bi-star-fill"></i> Avis Clients</a>
                    <a href="{{ route('admin.allMessage') }}" class="nav-link @if(Route::currentRouteName() == 'admin.allMessage') active  @endif"><i class="bi bi-envelope-paper"></i> Messages</a>
                    <div class="mt-auto px-3">
                        <button class="btn btn-danger w-100 rounded-3">Déconnexion</button>
                    </div>
                </div>
            </div>
        </div>

        <main class="main-content">
            <nav class="navbar navbar-expand bg-white sticky-top border-bottom px-3 py-2">
                <div class="container-fluid">
                    <button class="btn btn-light d-lg-none me-2" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                        <i class="bi bi-list"></i>
                    </button>

                    <form class="d-none d-md-flex flex-grow-1 max-w-400">
                        <div class="input-group" style="max-width: 300px;">
                            <span class="input-group-text bg-light border-0"><i class="bi bi-search text-muted"></i></span>
                            <input class="form-control bg-light border-0" type="search" placeholder="Rechercher...">
                        </div>
                    </form>

                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <div class="d-flex align-items-center" role="button" data-bs-toggle="dropdown">
                                <div class="text-end me-2 d-none d-sm-block">
                                    <p class="mb-0 fw-semibold small">{{ Auth::user()->last_name }}</p>
                                    <p class="mb-0 text-muted small" style="font-size: 0.7rem;">{{ Auth::user()->first_name }}</p>
                                </div>
                                <img src="https://ui-avatars.com/api/?name=MK&background=0d6efd&color=fff" class="rounded-circle shadow-sm" width="38" height="38">
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewUserModal"><i class="bi bi-person me-2"></i>Profil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="{{ route('admin.logout') }}">Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="p-3 p-lg-4">

                @yield('dashContent')

            </div>
        </main>

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-body text-center p-4">
                        <div class="text-primary mb-3">
                            <i class="bi bi-info-circle-fill fs-1"></i>
                        </div>
                        <h5 class="fw-bold">Déconnexion</h5>
                        <p class="text-muted small">Souhaitez-vous vraiment quitter votre session ?</p>
                        <div class="d-grid gap-2 mt-4">
                            <a href="{{ route('admin.logout') }}" class="btn btn-primary rounded-3">Se déconnecter</a>
                            <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Rester connecté</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('dashStyle/js/script.js') }}"></script>
        <script>
            // Timer pour l'alerte
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.classList.remove('show');
                    setTimeout(() => alert.remove(), 600);
                }
            }, 4000); // Disparition après 4 secondes
        </script>
    </body>
</html>