<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('dashStyle/css/style.css') }}">

        <style>
            :root {
                --primary-color: #4e73df;
                --bg-body: #f8f9fa;
                --sidebar-width: 260px;
            }

            body {
                font-family: 'Inter', sans-serif;
                background-color: var(--bg-body);
                color: #334155;
                overflow-x: hidden;
            }

            /* Sidebar Styling */
            .sidebar {
                width: var(--sidebar-width);
                height: 100vh;
                position: fixed;
                left: 0;
                top: 0;
                background: #ffffff;
                z-index: 1000;
                transition: all 0.3s;
                border-right: 1px solid rgba(0,0,0,0.05);
            }

            .nav-link {
                color: #64748b;
                font-weight: 500;
                padding: 0.8rem 1.5rem;
                border-radius: 8px;
                margin: 0.2rem 1rem;
                transition: 0.2s;
            }

            .nav-link:hover, .nav-link.active {
                background-color: rgba(78, 115, 223, 0.1);
                color: var(--primary-color);
            }

            .nav-link i {
                margin-right: 10px;
                font-size: 1.1rem;
            }

            /* Main Content area */
            .main-content {
                margin-left: var(--sidebar-width);
                min-height: 100vh;
                transition: all 0.3s;
            }

            /* Navbar */
            .navbar {
                background: rgba(255, 255, 255, 0.8) !important;
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(0,0,0,0.05);
            }

            .search-bar {
                background: #f1f5f9;
                border: none;
                border-radius: 10px;
                padding-left: 40px;
            }

            /* Cards */
            .card {
                border: none;
                border-radius: 15px;
                transition: transform 0.2s ease;
            }
            
            .card-stats {
                border-left: 4px solid var(--primary-color);
            }

            .table thead th {
                background-color: #f8f9fa;
                text-transform: uppercase;
                font-size: 0.75rem;
                letter-spacing: 0.5px;
                border: none;
            }

            /* Mobile Adjustments */
            @media (max-width: 992px) {
                .sidebar {
                    margin-left: calc(-1 * var(--sidebar-width));
                }
                .main-content {
                    margin-left: 0;
                }
                .sidebar.active {
                    margin-left: 0;
                }
            }

            /* Custom Badges */
            .badge-success { background: #dcfce7; color: #15803d; }
            .badge-pending { background: #fef9c3; color: #a16207; }
            .badge-cancel { background: #fee2e2; color: #b91c1c; }
        </style>
    </head>
    <body>

        <nav class="sidebar d-none d-lg-block">
            <div class="p-4 mb-4">
                <h4 class="fw-bold text-primary"><i class="bi bi-cpu-fill me-2"></i>NEXUS</h4>
            </div>
            <div class="nav flex-column">
                <a href="{{ route('index-dash') }}" class="nav-link @if(Route::currentRouteName() == 'index-dash') active  @endif"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                <a href="{{ route('all-barber') }}" class="nav-link @if(Route::currentRouteName() == 'all-barber') active  @endif"><i class="bi bi-people"></i> Coiffeurs</a>
                <a href="{{ route('all-hour') }}" class="nav-link @if(Route::currentRouteName() == 'all-hour') active  @endif"><i class="bi bi-bar-chart-line"></i> Heurs Ouverture</a>
                <a href="{{ route('all-booking') }}" class="nav-link @if(Route::currentRouteName() == 'all-booking') active  @endif"><i class="bi bi-bar-chart-line"></i> Réservation</a>
                <a href="{{ route('all-testimony') }}" class="nav-link @if(Route::currentRouteName() == 'all-testimony') active  @endif"><i class="bi bi-bar-chart-line"></i> Avis Clients</a>
                <a href="{{ route('all-testimony') }}" class="nav-link @if(Route::currentRouteName() == 'all-testimony') active  @endif"><i class="bi bi-bar-chart-line"></i> Avis Clients</a>
                <a href="{{ route('all-message') }}" class="nav-link @if(Route::currentRouteName() == 'all-message') active  @endif"><i class="bi bi-bar-chart-line"></i> Messages</a>
            </div>
        </nav>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
            <div class="offcanvas-header p-4">
                <h4 class="fw-bold text-primary mb-0"><i class="bi bi-cpu-fill me-2"></i>NEXUS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div class="nav flex-column">
                    <a href="{{ route('index-dash') }}" class="nav-link @if(Route::currentRouteName() == 'index-dash') active  @endif"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a>
                    <a href="{{ route('all-barber') }}" class="nav-link @if(Route::currentRouteName() == 'all-barber') active  @endif"><i class="bi bi-people"></i> Coiffeurs</a>
                    <a href="{{ route('all-hour') }}" class="nav-link @if(Route::currentRouteName() == 'all-hour') active  @endif"><i class="bi bi-bar-chart-line"></i> Heurs Ouverture</a>
                    <a href="{{ route('all-booking') }}" class="nav-link @if(Route::currentRouteName() == 'all-booking') active  @endif"><i class="bi bi-bar-chart-line"></i> Réservation</a>
                    <a href="{{ route('all-testimony') }}" class="nav-link @if(Route::currentRouteName() == 'all-testimony') active  @endif"><i class="bi bi-bar-chart-line"></i> Avis Clients</a>
                    <a href="{{ route('all-message') }}" class="nav-link @if(Route::currentRouteName() == 'all-message') active  @endif"><i class="bi bi-bar-chart-line"></i> Messages</a>
                </div>
            </div>
        </div>

        <main class="main-content">
            <nav class="navbar navbar-expand-lg navbar-light px-4 py-3 sticky-top">
                <div class="container-fluid">
                    <button class="btn btn-light d-lg-none me-3" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                        <i class="bi bi-list"></i>
                    </button>
                    
                    <form class="d-none d-sm-flex position-relative">
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input class="form-control search-bar" type="search" placeholder="Rechercher..." aria-label="Search">
                    </form>

                    <div class="ms-auto d-flex align-items-center">
                        <div class="d-flex align-items-center cursor-pointer">
                            <div class="text-end me-2 d-none d-sm-block">
                                <p class="mb-0 fw-semibold small">Alex Durant</p>
                                <p class="mb-0 text-muted small">Admin</p>
                            </div>
                            <img src="https://ui-avatars.com/api/?name=Alex+Durant&background=4e73df&color=fff" class="rounded-circle" width="40" height="40" alt="Avatar">
                        </div>
                    </div>
                </div>
            </nav>

            <div class="p-4">

                @yield('dashContent')

            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('dashStyle/js/script.js') }}"></script>
    </body>
</html>