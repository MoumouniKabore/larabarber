<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- CoreUI CSS -->
        <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.0/dist/css/coreui.min.css" rel="stylesheet">
        
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="{{ asset('pageStyle/css/style.css') }}" rel="stylesheet">
    </head>
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <i class="bi bi-scissors me-2"></i>LARA BARBER
                </a>
                <button class="navbar-toggler" type="button" data-coreui-toggle="collapse" data-coreui-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link @if(Route::currentRouteName() == 'index') active @endif">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link @if(Route::currentRouteName() == 'about') active @endif">À Propos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('services') }}" class="nav-link @if(Route::currentRouteName() == 'services') active @endif">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pricing') }}" class="nav-link @if(Route::currentRouteName() == 'pricing') active @endif">Prix</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('galleries') }}" class="nav-link @if(Route::currentRouteName() == 'galleries') active @endif">Galerie</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('booking') }}" class="nav-link @if(Route::currentRouteName() == 'booking') active @endif">Réserver</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link @if(Route::currentRouteName() == 'contact') active @endif">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('pageContent')

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-brand">
                            <i class="bi bi-scissors me-2"></i>LARA BARBER
                        </div>
                        <p class="footer-text">Votre destination pour une coupe parfaite et une expérience de barbier authentique.</p>
                        <div class="social-links">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <h5 class="footer-title">Liens Rapides</h5>
                        <ul class="footer-links">
                            <li><a href="{{ route('index') }}">Accueil</a></li>
                            <li><a href="{{ route('about') }}">À Propos</a></li>
                            <li><a href="{{ route('services') }}">Services</a></li>
                            <li><a href="{{ route('pricing') }}">Prix</a></li>
                            <li><a href="{{ route('galleries') }}">Galerie</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="footer-title">Services</h5>
                        <ul class="footer-links">
                            <li><a href="#">Coupe Homme</a></li>
                            <li><a href="#">Taille de Barbe</a></li>
                            <li><a href="#">Rasage Traditionnel</a></li>
                            <li><a href="#">Coloration</a></li>
                            <li><a href="#">Soin Visage</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="footer-title">Contact</h5>
                        <ul class="footer-links">
                            <li><i class="bi bi-geo-alt me-2"></i>123 Rue de la Mode, Paris</li>
                            <li><i class="bi bi-telephone me-2"></i>+33 1 23 45 67 89</li>
                            <li><i class="bi bi-envelope me-2"></i>contact@barberking.fr</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; 2024 Lara barber. Tous droits réservés.</p>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top -->
        <div class="scroll-top">
            <i class="bi bi-arrow-up"></i>
        </div>

        <!-- CoreUI JS -->
        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.0/dist/js/coreui.bundle.min.js"></script>
        
        <!-- Custom JS -->
        <script src="{{ asset('pageStyle/js/script.js') }}"></script>

        {{-- Le Script pour faire disparaître le message --}}
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